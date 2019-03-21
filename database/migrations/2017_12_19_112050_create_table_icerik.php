<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIcerik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("icerik", function($table){
          $table->increments("icerik_id");
          $table->integer("kat_id");
          $table->string("slug", 100);
          $table->string("kitap_adi", 50);
          $table->string("yazar", 50);
          $table->string("yayin_evi", 100);
          $table->integer("sayfa_sayisi");
          $table->string("fiyat_araligi", 50);
          $table->string("video_url", 250);
          $table->text("aciklama");
          $table->text("keywords", 50);
          $table->integer("durum")->default(0);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("icerik");
    }
}
