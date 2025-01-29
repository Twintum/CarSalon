@extends('layouts.main')

@section('content')
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-8">Каталог автомобилей</h1>

            <x-brand-selector :brands="$brands" />

            <x-car-filter :brands="$brands" :bodyTypes="$bodyTypes" :colors="$colors" :models="$models" />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cars as $car)
                    <x-car-card :car="$car" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
