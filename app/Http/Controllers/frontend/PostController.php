<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Icerik;
use App\Yorumlar;
use App\Iletisim;

class PostController extends Controller
{
    public function post_comment(Request $request, $id)
    {
      if(is_numeric($id)){
        $control=Icerik::find($id);
        if(count($control)>0){
          unset($request["url"]);
          $request->merge([
            "icerik_id" => $id,
            "durum" => 0
          ]);
          $insert=Yorumlar::create($request->all());
          if($insert) return 1;
          else return 0;
        }
        else return 0;
      }
      else return 0;
    }

    public function post_contact(Request $request)
    {
      $insert=Iletisim::create($request->all());
      if($insert) return 1;
      else return 0;
    }
}
