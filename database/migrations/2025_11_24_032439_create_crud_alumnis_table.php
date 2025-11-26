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
                Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('jobs');
            $table->text('description');
            $table->string('image')->nullable(); // kolom untuk menyimpan path gambar, bisa null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crud_alumnis');
    }
};
