<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
  protected $table="kategoriler";
  protected $fillable=["baslik","slug","durum"];
  protected $primaryKey="kategoriler_id";
}
