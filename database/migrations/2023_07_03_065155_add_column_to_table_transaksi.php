<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->double('total_potongan');
            $table->double('gaji_pokok_baru');
            $table->double('uang_kehadiran_baru');
            $table->double('uang_lembur_baru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
           $table->dropColumn('total_potongan');
           $table->dropColumn('gaji_pokok_baru');
           $table->dropColumn('uang_kehadiran_baru');
           $table->dropColumn('uang_lembur_baru');
        });
    }
};
