<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPelayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpelayaran', function (Blueprint $table) {
            $table->foreignId('fk_idpelayaran')->constrained('pelayaran');
            $table->foreignId('fk_idrute')->constrained('rute');
            $table->foreignId('fk_idjenis')->constrained('jenis');
            $table->integer('harga');
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
        Schema::dropIfExists('detailpelayaran');
    }
}
