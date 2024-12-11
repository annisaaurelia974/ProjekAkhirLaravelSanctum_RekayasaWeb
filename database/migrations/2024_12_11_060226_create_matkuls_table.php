<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('matkuls', function (Blueprint $table) {
        $table->id();
        $table->string('kode_matkul')->unique();  // Menambahkan kolom kode_matkul
        $table->string('nama_matkul');
        $table->integer('sks');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('matkuls');
}
};
