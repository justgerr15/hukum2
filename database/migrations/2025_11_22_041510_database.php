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
            Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('head');
            $table->text('title');
            $table->text('description');
            $table->string('button1');
            $table->string('link1');
            $table->string('button2');
            $table->string('link2');
            $table->string('img')->default('assets/img/slider/foto.jpg'); // ← default value
            $table->timestamps();
        });

                    Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa')->default('6385');
            $table->string('dosen')->default('256');
            $table->string('alumni')->default('9152');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
