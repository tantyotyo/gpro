<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendoor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_iduser')->constrained('users');
            $table->foreignId('fk_idakses')->constrained('akses');
            $table->foreignId('fk_idkota')->constrained('kota');
            $table->string('namaagen', 25);
            $table->string('alamatagen', 100);
            $table->char('telpagen', 15);
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
        Schema::dropIfExists('agendoor');
    }
}
