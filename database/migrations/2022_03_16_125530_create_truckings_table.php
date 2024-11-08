<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_iduser')->constrained('users');
            $table->foreignId('fk_idakses')->constrained('akses');
            $table->foreignId('fk_idkota')->constrained('kota');
            $table->string('namatrucking', 50);
            $table->string('alamattrucking', 100);
            $table->char('telptrucking', 25);
            $table->char('toptrucking', 2);
            $table->char('jmlarmada20', 2);
            $table->char('jmlarmada40', 2);
            $table->year('tahunaktif');
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
        Schema::dropIfExists('trucking');
    }
}
