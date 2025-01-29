<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $table = 'body_types';

    // Связь с таблицей cars
    public function cars()
    {
        return $this->hasMany(Car::class, 'body_type_id');
    }
}
