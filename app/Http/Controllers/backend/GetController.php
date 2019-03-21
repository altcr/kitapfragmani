<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kategoriler;
use App\Icerik;
use App\Yorumlar;
use App\Iletisim;
use App\SiteBilgileri;
use App\Sosyal;

class GetController extends Controller
{
    public function get_index()
    {
      $icerik=Icerik::all();
      $kategori=Kategoriler::all();
      $yorum=Yorumlar::all();
      $iletisim=Iletisim::all();
      return view("backend.index", compact("icerik","kategori","yorum","iletisim"));
    }
    public function get_content()
    {
      $icerik=Icerik::all();
      return view("backend.content")->with("icerik", $icerik);
    }
      public function get_content_add()
      {
        $kategoriler=Kategoriler::where("durum", 1)->get();
        return view("backend.content-add")->with("kategoriler", $kategoriler);
      }
      public function get_content_update($id)
      {
        if(is_numeric($id)){
          $control=Icerik::find($id);
          if(count($control)>0){
            $kategoriler=Kategoriler::where("durum", 1)->get();
            return view("backend.content-update")->with("icerik", $control)->with("kategoriler", $kategoriler);
          }
          else{
            return redirect("/Panel");
          }
        }
        else{
          return redirect("/Panel");
        }
      }
    public function get_comments()
    {
      $yorumlar=Yorumlar::orderby("yorumlar_id", "desc")->get();
      return view("backend.comments")->with("yorumlar", $yorumlar);
    }
    public function get_category()
    {
      $kategoriler=Kategoriler::all();
      return view("backend.category")->with("kategoriler", $kategoriler);
    }
      public function get_category_add()
      {
        return view("backend.category-add");
      }
      public function get_category_update($id)
      {
        if(is_numeric($id)){
          $control=Kategoriler::find($id);
          if(count($control)>0){
            return view("backend.category-update")->with("kategori", $control);
          }
          else{
            return redirect("/Panel");
          }
        }
        else{
          return redirect("/Panel");
        }
      }
    public function get_contact()
    {
      $iletisim=Iletisim::orderby("iletisim_id", "desc")->get();
      return view("backend.contact", compact("iletisim"));
    }

    public function get_password()
    {
      return view("backend.password-reset");
    }

    public function get_settings()
    {
      return view("backend.settings");
    }

    public function get_social()
    {
      $sosyal=Sosyal::all();
      return view("backend.social", compact("sosyal"));
    }
      public function get_social_add()
      {
        return view("backend.social-add");
      }
      public function get_social_update($id)
      {
        if(is_numeric($id)){
          $control=Sosyal::find($id);
          if(count($control)>0){
            return view("backend.social-update")->with("sosyal", $control);
          }
          else{
            return redirect("/Panel");
          }
        }
        else{
          return redirect("/Panel");
        }
      }
}
