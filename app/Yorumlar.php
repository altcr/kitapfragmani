<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yorumlar extends Model
{
  protected $table="yorumlar";
  protected $fillable=["icerik_id","ad","email","yorum","durum"];
  protected $primaryKey="yorumlar_id";

  public function icerik()
  {
    return $this->belongsTo("App\Icerik", "icerik_id", "icerik_id");
  }
}
