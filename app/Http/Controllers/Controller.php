<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;
use App\SiteBilgileri;
use App\Sosyal;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
      $siteAyarlar=SiteBilgileri::find(1);
      $sosyal=Sosyal::all();
      View::share("siteAyarlar", $siteAyarlar);
      View::share("sosyal", $sosyal);
    }
}
