<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIletisim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('iletisim', function (Blueprint $table) {
          $table->increments('iletisim_id');
          $table->string("ad",50);
          $table->string("email",50);
          $table->string("konu",50);
          $table->text("mesaj");
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
        Schema::drop('iletisim');
    }
}
