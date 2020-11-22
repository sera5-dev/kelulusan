<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction as Obj;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
  public function __construct()
  {
    $this->attr = ['nama', 'umur', 'jenis_kelamin', 'status_mahasiswa', 'status_nikah', 'ips1', 'ips2', 'ips3', 'ips4', 'ips5', 'ips6', 'ips7', 'ips8'];
    $this->ips = ['ips1', 'ips2', 'ips3', 'ips4', 'ips5', 'ips6', 'ips7', 'ips8'];
  }

  public function index()
  {
    $predicted_datas  = Obj::where('validated', 0)->get();
    $validated_datas  = Obj::where('validated', 1)->get();
    $predicted        = Obj::all()->count();
    $validated        = $validated_datas->count();
    $tepat            = Obj::where('status_kelulusan', 'TEPAT')->get()->count();
    $terlambat        = Obj::where('status_kelulusan', 'TERLAMBAT')->get()->count();

    return view('prediction', compact('predicted_datas', 'validated_datas', 'predicted', 'validated', 'tepat', 'terlambat'));
  }

  public function valid(Request $request)
  {
    $obj = Obj::where('id', $request->id)->first();

    foreach ($this->attr as $attr) {
      $data[$attr] = $obj->$attr;
    }

    $data['ipk'] = $obj->ipk;
    $data['status_kelulusan'] = $obj->status_kelulusan;

    Http::post(env('API_URL'), $data)->body();

    $obj->validated = 1;
    $obj->save();

    return redirect()->route('prediction');
  }

  public function store(Request $request)
  {
    $obj = new Obj;
    foreach ($this->attr as $attr) {
      $obj->$attr = $request->$attr;
      $data[$attr] = $request->$attr;

      if ($attr = 'nama')
        $obj->nama = strtoupper($request->$attr);
      if ($attr = 'jenis_kelamin') {
        if ($request->$attr == "LAKI - LAKI") $data[$attr] = 1;
        else $data[$attr] = 0;
      }
      if ($attr = 'status_mahasiswa') {
        if ($request->$attr == "MAHASISWA") $data[$attr] = 1;
        else $data[$attr] = 0;
      }
      if ($attr = 'status_nikah') {
        if ($request->$attr == "MENIKAH") $data[$attr] = 1;
        else $data[$attr] = 0;
      }
    }

    $total = 0;
    foreach ($this->ips as $key => $ip)
      $total += $request->$ip;

    $obj->ipk = $total / ($key + 1);
    $data['ipk'] = $obj->ipk;
    $data['status_kelulusan'] = 1;

    $res = json_decode(Http::post(env('API_URL'), $data));

    if ($res->result == "0") {
      $obj->status_kelulusan = "TEPAT";
    } else {
      $obj->status_kelulusan = "TERLAMBAT";
    }

    $obj->validated = 0;
    $obj->save();

    return redirect()->route('prediction');
  }
}
