<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color', 50)->unique();
            $table->string('hex_code', 7)->unique();
            $table->timestamps();
        });

        DB::table('colors')->insert([
            ['color' => 'Белый', 'hex_code' => '#fffff'],
            ['color' => 'Черный', 'hex_code' => '#000000'],
            ['color' => 'Коричневый', 'hex_code' => '#9c5b11'],
            ['color' => 'Фиолетовый', 'hex_code' => '#8703f9'],
            ['color' => 'Зелёный', 'hex_code' => '#00ab3b'],
            ['color' => 'Серый', 'hex_code' => '#8c8c8c'],
            ['color' => 'Синий', 'hex_code' => '#0049e5'],
            ['color' => 'Жёлтый', 'hex_code' => '#fff249'],
            ['color' => 'Красный', 'hex_code' => '#f9211b'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
