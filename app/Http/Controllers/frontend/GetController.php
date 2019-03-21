<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategoriler;
use App\Icerik;
use App\Yorumlar;
use Auth;

class GetController extends Controller
{
    public function get_index()
    {
      $icerik=Icerik::where("durum", 1)->orderby("icerik_id","desc")->paginate(10);
      $kategoriler=Kategoriler::where("durum",1)->get();
      return view("frontend.index")->with("kategoriler",$kategoriler)->with("icerik",$icerik);
    }

    public function get_giris()
    {
      if(Auth::check()){
        return redirect("/Panel");
      }
      return view("auth.login");
    }

    public function get_cikis()
    {
      Auth::logout();
      return Redirect("/giris");
    }

    public function get_detail($slug)
    {
      $control=Icerik::where('slug', $slug)->first();
      if(count($control)>0){
        $yorumlar=Yorumlar::where("durum", 1)->where("icerik_id", $control->icerik_id)->orderby("yorumlar_id","desc")->get();
        return view("frontend.detail")->with("detay", $control)->with("yorumlar",$yorumlar);
      }
      else{
        return redirect("/");
      }
    }

    public function get_category($slug)
    {
      $control=Kategoriler::where('slug', $slug)->first();
      if(count($control)>0){
        $icerik=Icerik::where("kat_id", $control->kategoriler_id)->paginate(10);
        return view("frontend.category")->with("icerik", $icerik)->with("baslik", $control->baslik);
      }
      else{
        return redirect("/");
      }
    }

    public function get_contact()
    {
      return view("frontend.contact");
    }

    public function get_about()
    {
      return view("frontend.about");
    }

    public function get_search(Request $request)
    {
      if(isset($request->txt_src) or isset($request->page)){
        $aranan=$request->txt_src;
        $src=Icerik::where("durum",1)->where("kitap_adi","like",'%'.$request->txt_src.'%')
                                        ->where("aciklama","like",'%'.$request->txt_src.'%')
                                        ->where("yayin_evi","like",'%'.$request->txt_src.'%')
                                        ->where("yazar","like",'%'.$request->txt_src.'%')->paginate(10);
        return view("frontend.search", compact("src","aranan"));
      }
      else{
        return redirect("/");
      }
    }
}
