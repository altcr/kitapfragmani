<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSiteBilgileri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("sitebilgileri", function($table){
          $table->increments("bilgiler_id");
          $table->string('title',100);
          $table->string('description',300);
          $table->string('keywords',100);
          $table->string('sosyalmedya',250);
          $table->string('logo',200);
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
        Schema::dropIfExists('sitebilgileri');
    }
}
