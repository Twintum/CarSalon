@props(['brands', 'bodyTypes', 'colors', 'models'])

<div x-data="carFilter()" class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h2 class="text-xl font-semibold mb-4">Фильтр автомобилей</h2>
    <form @submit.prevent="applyFilters">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Марка -->
            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Марка</label>
                <select id="brand" x-model="filters.brand" @change="updateModels"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Выберите марку</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Модель -->
            <div>
                <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Модель</label>
                <select id="model" x-model="filters.model"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Выберите модель</option>
                    <template x-for="model in availableModels" :key="model.id">
                        <option :value="model.id" x-text="model.name"></option>
                    </template>
                </select>
            </div>

            <!-- Мощность -->
            <div>
                <label for="power" class="block text-sm font-medium text-gray-700 mb-1">Мощность (л.с.)</label>
                <div class="flex space-x-2">
                    <input type="number" id="powerMin" x-model="filters.powerMin" placeholder="От"
                        class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <input type="number" id="powerMax" x-model="filters.powerMax" placeholder="До"
                        class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>

            <!-- Пробег -->
            <div>
                <label for="mileage" class="block text-sm font-medium text-gray-700 mb-1">Пробег (км)</label>
                <div class="flex space-x-2">
                    <input type="number" id="mileageMin" x-model="filters.mileageMin" placeholder="От"
                        class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <input type="number" id="mileageMax" x-model="filters.mileageMax" placeholder="До"
                        class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>

            <!-- Наличие -->
            <div>
                <label for="availability" class="block text-sm font-medium text-gray-700 mb-1">Наличие</label>
                <select id="availability" x-model="filters.availability"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Все</option>
                    <option value="in_stock">В наличии</option>
                    <option value="on_order">Под заказ</option>
                </select>
            </div>

            <!-- Руль -->
            <div>
                <label for="steering" class="block text-sm font-medium text-gray-700 mb-1">Руль</label>
                <select id="steering" x-model="filters.steering"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Без разницы</option>
                    <option value="left">Левый</option>
                    <option value="right">Правый</option>
                </select>
            </div>

            <!-- Цвет -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Цвет</label>
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($colors as $color)
                        <div class="flex items-center">
                            <input type="checkbox" id="color_{{ $color['id'] }}" value="{{ $color['id'] }}"
                                x-model="filters.colors"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <label for="color_{{ $color['id'] }}" class="ml-2 flex items-center">
                                <span class="w-4 h-4 inline-block mr-1 rounded-full"
                                    style="background-color: {{ $color['hex'] }};"></span>
                                <span class="text-sm">{{ $color['name'] }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Тип кузова -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Тип кузова</label>
            <div class="grid grid-cols-10 gap-2">
                @foreach ($bodyTypes as $type => $svg)
                    <label
                        class="flex flex-col items-center p-2 border rounded-md cursor-pointer hover:bg-gray-50 transition-colors duration-200"
                        :class="{ 'border-blue-500 bg-blue-50': filters.bodyType === '{{ $type }}' }">
                        <input type="radio" name="bodyType" value="{{ $type }}" x-model="filters.bodyType"
                            class="sr-only">
                        <div class="w-12 h-12 mb-1">
                            {!! $svg !!}
                        </div>
                        <span class="text-xs text-center">{{ $type }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full bg-primary-600 text-white py-2 px-4 rounded-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50 transition duration-300">
                Применить фильтры
            </button>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        function carFilter() {
            return {
                filters: {
                    brand: '',
                    model: '',
                    bodyType: '',
                    powerMin: '',
                    powerMax: '',
                    mileageMin: '',
                    mileageMax: '',
                    availability: '',
                    steering: '',
                    colors: []
                },
                availableModels: [],
                allModels: @json($models),
                updateModels() {
                    if (this.filters.brand) {
                        this.availableModels = this.allModels.filter(model => model.brand_id == this.filters.brand);
                    } else {
                        this.availableModels = [];
                    }
                    this.filters.model = '';
                },
                applyFilters() {}
            }
        }
    </script>
@endpush
