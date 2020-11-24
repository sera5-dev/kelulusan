<?php

namespace App\Http\Controllers;

use App\Models\Prediction;

class DataController extends Controller
{
  public function getTotalPrediction($data = 0)
  {
    if (!$data)
      return Prediction::all()->count();
    else
      return Prediction::where($data)->count();
  }

  public static function getPercentage($data, $total_prediction)
  {
    return round($data / $total_prediction * 100, 2);
  }

  public static function getCount($data)
  {
    return Prediction::where($data)->count();
  }

  public function index()
  {
    $total_prediction = Prediction::count();

    $predicted_datas  = Prediction::where('validated', 0)->get();
    $validated_datas  = Prediction::where('validated', 1)->get();
    $predicted        = Prediction::all()->count();
    $validated        = $validated_datas->count();
    $tepat            = Prediction::where('status_kelulusan', 'TEPAT')->get()->count();
    $terlambat        = Prediction::where('status_kelulusan', 'TERLAMBAT')->get()->count();

    $tepat_laki       = $this->getCount(['jenis_kelamin' => 'LAKI - LAKI', 'status_kelulusan' => 'TEPAT']);
    $tepat_pr         = $this->getCount(['jenis_kelamin' => 'PEREMPUAN', 'status_kelulusan' => 'TEPAT']);
    $tepat_kerja      = $this->getCount(['status_mahasiswa' => 'BEKERJA', 'status_kelulusan' => 'TEPAT']);
    $tepat_mahasiswa  = $this->getCount(['status_mahasiswa' => 'MAHASISWA', 'status_kelulusan' => 'TEPAT']);
    $tepat_mahasiswa  = $this->getCount(['status_mahasiswa' => 'MAHASISWA', 'status_kelulusan' => 'TEPAT']);
    $tepat_kerja      = $this->getCount(['status_mahasiswa' => 'BEKERJA', 'status_kelulusan' => 'TEPAT']);
    $tepat_nikah      = $this->getCount(['status_nikah' => 'MENIKAH', 'status_kelulusan' => 'TEPAT']);
    $tepat_lajang     = $this->getCount(['status_nikah' => 'BELUM MENIKAH', 'status_kelulusan' => 'TEPAT']);

    $data = [
      'predicted' => $predicted_datas,
      'validated' => $validated_datas,
    ];

    $total = [
      "predicted" => $predicted,
      "validated" => $validated,
      "tepat" => $tepat,
      "terlambat" => $terlambat,
    ];

    $persentase = [
      "tepat"       => $this->getPercentage($tepat, $this->getTotalPrediction()),
      "terlambat"   => $this->getPercentage($terlambat, $this->getTotalPrediction()),
      "kerja"       => $this->getPercentage($tepat_kerja, $this->getTotalPrediction(['status_mahasiswa' => 'BEKERJA'])),
      "mahasiswa"   => $this->getPercentage($tepat_mahasiswa, $this->getTotalPrediction(['status_mahasiswa' => 'MAHASISWA'])),
      "laki"        => $this->getPercentage($tepat_laki, $this->getTotalPrediction(['jenis_kelamin' => 'LAKI - LAKI'])),
      "pr"          => $this->getPercentage($tepat_pr, $this->getTotalPrediction(['jenis_kelamin' => 'PEREMPUAN'])),
      "nikah"       => $this->getPercentage($tepat_nikah, $this->getTotalPrediction(['status_nikah' => 'MENIKAH'])),
      "lajang"      => $this->getPercentage($tepat_lajang, $this->getTotalPrediction(['status_nikah' => 'BELUM MENIKAH'])),
      "1"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips1'), 2),
      "2"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips2'), 2),
      "3"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips3'), 2),
      "4"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips4'), 2),
      "5"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips5'), 2),
      "6"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips6'), 2),
      "7"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips7'), 2),
      "8"           => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ips8'), 2),
      "ipk"         => round(Prediction::where('status_kelulusan', 'TEPAT')->avg('ipk'), 2),
    ];

    return view('data', compact('data', 'total', 'persentase'));
  }
}
