<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icerik extends Model
{
    protected $table="icerik";
    protected $fillable=["kat_id","slug","kitap_adi","yazar","yayin_evi","sayfa_sayisi","fiyat_araligi","video_url","aciklama","keywords","durum"];
    protected $primaryKey="icerik_id";

    public function kategori()
    {
      return $this->hasOne("App\Kategoriler", "kategoriler_id","kat_id");
    }
}
