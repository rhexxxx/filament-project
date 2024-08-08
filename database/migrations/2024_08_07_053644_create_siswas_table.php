<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->foreignId("kelas_id")->constrained('kelas')->onDelete('cascade');
            $table->foreignId("jurusan_id")->constrained('jurusans')->onDelete('cascade');
            $table->string('nis')->unique();
            $table->string('email');
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
