<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_iduser')->constrained('users');
            $table->foreignId('fk_idpegawai')->constrained('pegawai');
            $table->foreignId('fk_idakses')->constrained('akses');
            $table->foreignId('fk_idkota')->constrained('kota');
            $table->string('namacustomer', 25);
            $table->string('alamatcustomer', 100);
            $table->char('telpcustomer', 15);
            $table->char('telp2customer', 15);
            $table->char('faxcustomer', 15);
            $table->char('telppiccustomer', 15);
            $table->char('topcustomer', 2);
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
        Schema::dropIfExists('customer');
    }
}
