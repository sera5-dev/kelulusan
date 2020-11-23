<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ModelController extends Controller
{
  public static function getPerformance()
  {
    $performances = json_decode(Http::get(env('API_URL') . '/performances')->body());
    $prfms = [];

    foreach ($performances as $k => $p) {
      foreach ($p as $key => $value) {
        if ($k == "support") {
          if ($key == "accuracy")
            $prfms[$k][$key] = round($value * 100, 2);
          else
            $prfms[$k][$key] = round($value, 2);
        } else
          $prfms[$k][$key] = round($value * 100, 2);
      }
    }

    return $prfms;
  }

  public static function getImportance()
  {
    $importances =  json_decode(Http::get(env('API_URL') . '/importances')->body());

    $imps = [];

    foreach ($importances as $key => $importance)
      $imps[$key] = round($importance * 100, 2);

    return $imps;
  }

  public static function getComparison()
  {
    $comparison = json_decode(Http::get(env('API_URL') . '/comparison')->body());
    return $comparison;
  }

  public static function getImage()
  {
    $image = json_decode(Http::get(env('API_URL') . '/graphic')->body());
    return $image;
  }

  public function index()
  {
    $importances = $this->getImportance();
    $performances = $this->getPerformance();
    $comparison = $this->getComparison();
    $image = $this->getImage();
    return view('model', compact('performances', 'importances', 'comparison', 'image'));
  }
}
