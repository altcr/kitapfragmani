<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosyal extends Model
{
  protected $table="sosyal";
  protected $fillable=["baslik","link","icon"];
  protected $primaryKey="sosyal_id";
}
