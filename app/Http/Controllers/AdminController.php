<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Mark;

class AdminController extends Controller
{
    // Рендеринг списка авто в админке
    public function cars() {
        $perPage = 10;
        $cars = Car::withTrashed()->paginate($perPage);
        return view('admin/cars', [
            'cars' => $cars
        ]);
    }

    // Рендеринг списка марок в админке
    public function marks() {
        $perPage = 10;
        $marks = Mark::withTrashed()->paginate($perPage);

        return view('admin/marks', [
            'marks' => $marks
        ]);
    }

}
