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
        Schema::create('body_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        DB::table('body_types')->insert([
            ['name' => 'Седан', 'photo' => 'img/body_types/1.svg'],
            ['name' => 'Хэтчбек 5 дв.', 'photo' => 'img/body_types/2.svg'],
            ['name' => 'Хэтчбек 3 дв.', 'photo' => 'img/body_types/3.svg'],
            ['name' => 'Лифтбек', 'photo' => 'img/body_types/4.svg'],
            ['name' => 'Джип 5 дв.', 'photo' => 'img/body_types/5.svg'],
            ['name' => 'Джип 3 дв.', 'photo' => 'img/body_types/6.svg'],
            ['name' => 'Универсал', 'photo' => 'img/body_types/7.svg'],
            ['name' => 'Минивэн', 'photo' => 'img/body_types/8.svg'],
            ['name' => 'Пикап', 'photo' => 'img/body_types/9.svg'],
            ['name' => 'Купе', 'photo' => 'img/body_types/10.svg'],
            ['name' => 'Открытый', 'photo' => 'img/body_types/11.svg'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('body_types');
    }
};
