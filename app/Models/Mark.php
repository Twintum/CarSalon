<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mark extends Model
{
    use SoftDeletes; //Мягкое удаление

    /**
     * Массовое заполнение
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'photo'
    ];

    // Связь с таблицей cars
    public function cars()
    {
        return $this->hasMany(Car::class, 'brand_id');
    }
}
