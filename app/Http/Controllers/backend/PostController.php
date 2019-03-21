<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Kategoriler;
use App\Icerik;
use App\Yorumlar;
use App\Iletisim;
use App\Sosyal;
use App\SiteBilgileri;

use Image;
use Validator;

class PostController extends Controller
{
  public function array_result($baslik, $mesaj, $durum)
  {
    $array_result=[
      "baslik" => $baslik,
      "mesaj" => $mesaj,
      "durum" => $durum,
    ];
    return $array_result;
  }

  public function post_content_add(Request $request)
  {
    if(is_numeric($request->sayfa_sayisi)){
      if($request->durum=="on") $durum=1;
      else $durum=0;
      $slug=str_slug($request->kitap_adi)."-".str_slug(Date("d.m.Y.h.i.s"));
      $request->merge([
        "slug" => $slug,
        "durum" => $durum,
      ]);

      $insert=Icerik::create($request->all());
      if($insert){
        return redirect("Panel/content")->with("array_result", $this->array_result("BAŞARILI","İçerik başarıyla eklendi.","success"));
      }
      else {
        return redirect("Panel/content")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
      }
    }
    else{
      return redirect()->back()->with("array_result", $this->array_result("HATA","Sayfa sayısı harf/harfler içeremez!","error"));
    }
  }

  public function post_content_update(Request $request, $id)
  {
    if(is_numeric($request->sayfa_sayisi) and is_numeric($id)){
      $control=Icerik::find($id);
      if(count($control)>0){
        if($request->durum=="on") $durum=1;
        else $durum=0;
        $slug=str_slug($request->kitap_adi)."-".str_slug(Date("d.m.Y.h.i.s"));
        $request->merge([
          "slug" => $slug,
          "durum" => $durum,
        ]);

        $update=Icerik::find($id)->update($request->all());
        if($update){
          return redirect("Panel/content")->with("array_result", $this->array_result("BAŞARILI","İçerik başarıyla güncellendi.","success"));
        }
        else {
          return redirect("Panel/content")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
    else{
      return redirect()->back()->with("array_result", $this->array_result("HATA","Sayfa sayısı harf/harfler içeremez!","error"));
    }
  }

  public function post_content_delete($id)
  {
    if(is_numeric($id)){
      $control=Icerik::find($id);
      if(count($control)>0){
        $delete=Icerik::find($id)->delete();
        if($delete){
          Yorumlar::where('icerik_id', $id)->delete();
          return 1;
        }
        else {
          return 0;
        }
      }
      else{
        return 0;
      }
    }
    else{
      return 0;
    }
  }

  public function post_category_add(Request $request)
  {
    if($request->durum=="on") $durum=1;
    else $durum=0;
    $slug=str_slug($request->baslik);
    $request->merge([
      "slug" => $slug,
      "durum" => $durum,
    ]);

    $insert=Kategoriler::create($request->all());
    if($insert){
      return redirect("Panel/category")->with("array_result", $this->array_result("BAŞARILI","Kategori başarıyla eklendi.","success"));
    }
    else {
      return redirect("Panel/category")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
    }
  }

  public function post_category_update(Request $request, $id)
  {
    if(is_numeric($id)){
      $control=Kategoriler::find($id);
      if(count($control)>0){
        if($request->durum=="on") $durum=1;
        else $durum=0;
        $slug=str_slug($request->baslik);
        $request->merge([
          "slug" => $slug,
          "durum" => $durum,
        ]);

        $update=Kategoriler::find($id)->update($request->all());
        if($update){
          return redirect("Panel/category")->with("array_result", $this->array_result("BAŞARILI","Kategori başarıyla güncellendi.","success"));
        }
        else {
          return redirect("Panel/category")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
    else{
      return redirect("/Panel");
    }
  }

  public function post_category_delete($id)
  {
    if(is_numeric($id)){
      $control=Kategoriler::find($id);
      if(count($control)>0){
        $delete=Kategoriler::find($id)->delete();
        if($delete){
          $icerik_idler=Icerik::where('kat_id', $id)->get();
          Icerik::where('kat_id', $id)->delete();
          foreach ($icerik_idler as $val) {
            Yorumlar::where("icerik_id", $val->icerik_id)->delete();
          }
          return 1;
        }
        else {
          return 0;
        }
      }
      else{
        return 0;
      }
    }
    else{
      return 0;
    }
  }

  public function get_comment_delete($id)
  {
    if(is_numeric($id)){
      $control=Yorumlar::find($id);
      if(count($control)>0){
        $delete=Yorumlar::find($id)->delete();
        if($delete){
          return redirect("Panel/comments")->with("array_result", $this->array_result("BAŞARILI","Yorum başarıyla silindi.","success"));
        }
        else {
          return redirect("Panel/comments")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
    else{
      return redirect("/Panel");
    }
  }

  public function get_comment_check($id)
  {
    if(is_numeric($id)){
      $control=Yorumlar::find($id);
      if(count($control)>0){
        $check=Yorumlar::find($id)->update([
          "durum" => 1
        ]);
        if($check){
          return redirect("Panel/comments")->with("array_result", $this->array_result("BAŞARILI","Yorum başarıyla onaylandı.","success"));
        }
        else {
          return redirect("Panel/comments")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
    else{
      return redirect("/Panel");
    }
  }

  public function post_contact_delete($id)
  {
    if(is_numeric($id)){
      $control=Iletisim::find($id);
      if(count($control)>0){
        $delete=Iletisim::find($id)->delete();
        if($delete){
          return redirect("Panel/contact")->with("array_result", $this->array_result("BAŞARILI","Mesaj başarıyla silindi.","success"));
        }
        else {
          return redirect("Panel/contact")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
    else{
      return redirect("/Panel");
    }
  }

  public function post_contact_detail($id)
  {
    if(is_numeric($id)){
      $control=Iletisim::find($id);
      if(count($control)>0){
        $update=Iletisim::find($id)->update([
          "durum" => 1
        ]);
        if($update){
          $information=Iletisim::find($id);
          return view("backend.contact-detail", compact("information"));
        }
        else {
          return redirect("Panel/contact")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
    else{
      return redirect("/Panel");
    }
  }

  public function post_social_add(Request $request)
  {
    $insert=Sosyal::create($request->all());
    if($insert){
      return redirect("Panel/social")->with("array_result", $this->array_result("BAŞARILI","Sosyal medya başarıyla eklendi.","success"));
    }
    else {
      return redirect("Panel/social")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
    }
  }

  public function post_social_delete($id)
  {
    if(is_numeric($id)){
      $control=Sosyal::find($id);
      if(count($control)>0){
        $delete=Sosyal::find($id)->delete();
        if($delete){
          return 1;
        }
        else {
          return 0;
        }
      }
      else{
        return 0;
      }
    }
    else{
      return 0;
    }
  }

  public function post_social_update(Request $request, $id)
  {
    if(is_numeric($id)){
      $control=Sosyal::find($id);
      if(count($control)>0){
        $update=Sosyal::find($id)->update($request->all());
        if($update){
          return redirect("Panel/social")->with("array_result", $this->array_result("BAŞARILI","Sosyal medya başarıyla güncellendi.","success"));
        }
        else {
          return redirect("Panel/social")->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
    else{
      return redirect("/Panel");
    }
  }

  public function post_settings(Request $request)
  {
    if(is_numeric(1)){
      $control=SiteBilgileri::find(1);
      if(count($control)>0){
        $update=SiteBilgileri::find(1)->update([
          "title" => $request->title,
          "description" => $request->description,
          "keywords" => $request->keywords,
          "adres" => $request->adres,
          "tel" => $request->tel,
          "email" => $request->email,
          "hakkimizda" => $request->hakkimizda
        ]);
        echo "girdi1";
        if($update){
          $img_ad="";
          if($request->hasFile("logo")){
            $img = Input::file("logo"); // Seçilen fotoyu alıyoruz.
            $uzanti = $img->getClientOriginalExtension(); // Seçilen fotonun uzantısını alıyoruz.
            $img_ad = sha1(md5(rand(0,1000))).".".$uzanti; // Yeni bir ad veriyoruz.
            Storage::disk("uploads")->makeDirectory("img"); // Disk ile public içerisinde ki uploads klasörünü seçip, makeDirectory ile img klasörü oluşturuyoruz.
            Image::make($img->getRealPath())->resize(200,100)->save("uploads/img/".$img_ad);
          }
          else{
            $img_ad=$request->eski_logo;
          }

          $img_result=SiteBilgileri::find(1)->update([
            "logo" => $img_ad
          ]);

          if($img_result){
            if($request->hasFile("logo")){
              unlink("uploads/img/".$request->eski_logo);
            }
          }
          return redirect()->back()->with("array_result", $this->array_result("BAŞARILI","Site bilgileri başarıyla güncellendi.","success"));
        }
        else {
          return redirect()->back()->with("array_result", $this->array_result("HATA","Bir hata oluştu!","error"));
        }
      }
      else{
        return redirect("/Panel");
      }
    }
  }
}
