<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand_id',
        'model',
        'price',
        'year',
        'engine_volume',
        'fuel_type',
        'drive_type',
        'gearbox',
        'steering_wheel',
        'color',
        'body_type_id',
        'horsepower',
        'photos',
    ];

    // Связь с таблицей marks
    public function brand()
    {
        return $this->belongsTo(Mark::class, 'brand_id');
    }

    // Связь с таблицей colors
    public function color()
    {
        return $this->belongsTo(Color::class, 'color');
    }

    // Связь с таблицей body_types
    public function bodyType()
    {
        return $this->belongsTo(BodyType::class, 'body_type_id');
    }

    // Указываем, что photos -> массив
    protected $casts = [
        'photos' => 'array',
    ];
}
