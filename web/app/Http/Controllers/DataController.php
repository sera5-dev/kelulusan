<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
  public static function percentage($data)
  {
    $total_prediction = Prediction::count();
    return round($data / $total_prediction * 100, 2);
  }

  public static function getCount($data)
  {
    return Prediction::where($data)->count();
  }

  public function index()
  {
    //$importances = json_decode(Http::get(env('API_URL') . '/importances')->body());
    //$comparasion = json_decode(Http::get(env('API_URL') . '/comparasion')->body());

    //$imps = [];

    //foreach ($importances as $key => $important)
    //  $imps[$key] = round($important * 100, 2);

    $performances = json_decode(Http::get(env('API_URL') . '/performances')->body());
    $prs = [];
    $prfms = [];

    foreach ($performances as $k => $p) {
      foreach ($p as $key => $value) {
        $prfms["type"] = $k;
        $prfms[$key] = round($value * 100, 2);
      }
      array_push($prs, $prfms);
    }

    $tepat      = $this->getCount(['status_kelulusan' => 'TEPAT']);
    $terlambat  = $this->getCount(['status_kelulusan' => 'TERLAMBAT']);

    $tepat_laki       = $this->getCount(['jenis_kelamin' => 'LAKI - LAKI', 'status_kelulusan' => 'TEPAT']);
    $tepat_pr         = $this->getCount(['jenis_kelamin' => 'PEREMPUAN', 'status_kelulusan' => 'TEPAT']);
    $tepat_mahasiswa  = $this->getCount(['status_mahasiswa' => 'MAHASISWA', 'status_kelulusan' => 'TEPAT']);
    $tepat_kerja      = $this->getCount(['status_mahasiswa' => 'BEKERJA', 'status_kelulusan' => 'TEPAT']);
    $tepat_nikah      = $this->getCount(['status_nikah' => 'MENIKAH', 'status_kelulusan' => 'TEPAT']);
    $tepat_lajang     = $this->getCount(['status_nikah' => 'BELUM MENIKAH', 'status_kelulusan' => 'TEPAT']);

    $p_tepat      = $this->percentage($tepat);
    $p_terlambat  = $this->percentage($terlambat);
    $p_laki = $this->percentage($tepat_laki);
    $p_pr = $this->percentage($tepat_pr);
    $p_nikah = $this->percentage($tepat_nikah);
    $p_lajang = $this->percentage($tepat_lajang);

    $predicted_datas  = Prediction::where('validated', 0)->get();
    $validated_datas  = Prediction::where('validated', 1)->get();
    $predicted        = Prediction::all()->count();
    $validated        = $validated_datas->count();
    $tepat            = Prediction::where('status_kelulusan', 'TEPAT')->get()->count();
    $terlambat        = Prediction::where('status_kelulusan', 'TERLAMBAT')->get()->count();

    return view('data', compact('predicted_datas', 'validated_datas', 'predicted', 'validated', 'tepat', 'terlambat'));
  }
}