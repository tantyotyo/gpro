<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_idkota')->constrained('kota');
            $table->string('namapelayaran', 50);
            $table->string('alamatpelayaran', 100);
            $table->char('telppelayaran', 25);
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
        Schema::dropIfExists('pelayaran');
    }
}
