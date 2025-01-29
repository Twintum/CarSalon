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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('marks')->onDelete('cascade');
            $table->string('model', 100); // Модель машины
            $table->decimal('price', 15, 2); // Цена машины
            $table->year('year'); // Год выпуска
            $table->decimal('engine_volume', 3, 1); // Объем двигателя
            $table->enum('fuel_type', ['бензин', 'гибрид', 'дизель', 'электро']); // Тип топлива
            $table->enum('drive_type', ['передний', 'задний', 'полный']); // Привод
            $table->enum('gearbox', ['автомат', 'вариатор', 'механика', 'робот']); // КПП
            $table->enum('steering_wheel', ['левый', 'правый']); // Руль
            $table->foreignId('color')->constrained('colors')->onDelete('cascade'); // Тип кузова (связь)
            $table->foreignId('body_type_id')->constrained('body_types')->onDelete('cascade'); // Тип кузова (связь)
            $table->integer('horsepower'); // Мощность по ПТС
            $table->json('photos')->nullable(); // Фото машины
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
