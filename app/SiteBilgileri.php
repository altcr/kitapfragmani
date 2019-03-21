<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteBilgileri extends Model
{
  protected $table="sitebilgileri";
  protected $fillable=["title","description","keywords","sosyalmedya","logo"];
  protected $primaryKey="bilgiler_id";
}
