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
    Schema::create('dosens', function (Blueprint $table) {
        $table->id();
        $table->string('nip')->unique(); // Menambahkan kolom nip
        $table->string('nama');
        $table->string('jabatan');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('dosens');
}

};
