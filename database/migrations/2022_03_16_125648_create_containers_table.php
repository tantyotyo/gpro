<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_idjenis')->constrained('jenis');
            $table->foreignId('fk_idjadwal')->constrained('jadwal');
            $table->integer('qty');
            $table->char('nosegelpelayaran', 15);
            $table->char('nosegelglobal', 15);
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
        Schema::dropIfExists('container');
    }
}
