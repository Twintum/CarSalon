<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    // Связь с таблицей cars
    public function cars()
    {
        return $this->hasMany(Car::class, 'color');
    }
}
