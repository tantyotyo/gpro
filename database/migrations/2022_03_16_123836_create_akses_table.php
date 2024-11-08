<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akses', function (Blueprint $table) {
            $table->id();
            $table->string('namaakses', 25)->unique();
            $table->timestamps();
        });
        // Schema::table('users', function (Blueprint $table) {
        //     $table->char('fk_idakses', 10)->after('iduser');
        //     $table->foreign('fk_idakses')->references('idakses')->on('akses');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akses');
    }
}
