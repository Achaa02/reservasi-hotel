<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal_check_in')->nullable();
            $table->date('tanggal_check_out')->nullable();   
            $table->string('ketersediaan')->nullable();
            $table->string('jumlah_tamu');
            $table->string('harga');
            $table->string('note')->nullable();
            $table->foreignId('kamars_id')->constrained('kamars')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservasis');
    }
};
