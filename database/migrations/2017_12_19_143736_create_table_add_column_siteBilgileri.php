<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddColumnSiteBilgileri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table("sitebilgileri", function($table){
        $table->string('adres', 300);
        $table->string('tel', 40);
        $table->string('email', 50);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('sitebilgileri', function($table) {
        $table->dropColumn('adres');
        $table->dropColumn('tel');
        $table->dropColumn('email');
      });
    }
}
