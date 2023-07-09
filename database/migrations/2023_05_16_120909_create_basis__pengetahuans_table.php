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
        Schema::create('tb_basis_pengetahuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hama');
            $table->unsignedBigInteger('id_gejala');
            $table->timestamps();
            $table->foreign('id_hama')->references('id')->on('tb_hama');
            $table->foreign('id_gejala')->references('id')->on('tb_gejala');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basis__pengetahuans');
    }
};
