@props(['brands'])

<div class="bg-white rounded-lg overflow-hidden shadow-md p-4 mb-6">
    <h2 class="text-lg font-semibold mb-3">Выберите марку</h2>
    <div x-data="{ showAll: false }">
        <!-- Список брендов -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
            @foreach ($brands as $brand)
                <a href="{{ route('cars.index', ['mark' => $brand->id]) }}"
                    class="flex flex-col items-center justify-center p-2 rounded hover:bg-gray-100 transition duration-300"
                    x-show="showAll || {{ $loop->index }} < 6" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100">
                    <img src="{{ asset('storage/' . $brand->photo) }}" alt="{{ $brand->name }}"
                        class="w-12 h-12 mb-1 object-contain">
                    <span class="text-xs font-medium text-gray-800 text-center">{{ $brand->name }}</span>
                </a>
            @endforeach
        </div>

        <!-- Кнопка для показа всех -->
        @if ($brands->count() > 6)
            <div class="mt-4 text-center">
                <button @click="showAll = !showAll"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-primary-600 bg-white border border-primary-600 rounded-lg hover:bg-blue-50 focus:ring-primary-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                    <span x-show="!showAll">
                        Показать все
                    </span>
                    <span x-show="showAll">
                        Свернуть список
                    </span>
                </button>
            </div>
        @endif
    </div>
</div>
