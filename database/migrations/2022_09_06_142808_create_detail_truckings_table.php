<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTruckingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtrucking', function (Blueprint $table) {
            $table->foreignId('fk_idtrucking')->constrained('trucking');
            $table->foreignId('fk_idsektor')->constrained('sektor');
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
        Schema::dropIfExists('detailtrucking');
    }
}
