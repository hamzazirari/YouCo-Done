<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier le Restaurant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('restaurants.update', $restaurant) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom du Restaurant</label>
                            <input type="text" name="name" value="{{ $restaurant->name }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Ville -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ville</label>
                            <input type="text" name="ville" value="{{ $restaurant->ville }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Capacity -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Capacité</label>
                            <input type="number" name="capacity" value="{{ $restaurant->capacity }}" required min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Cuisine -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type de Cuisine</label>
                            <select name="cuisine" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="Marocaine" {{ $restaurant->cuisine == 'Marocaine' ? 'selected' : '' }}>Marocaine</option>
                                <option value="Française" {{ $restaurant->cuisine == 'Française' ? 'selected' : '' }}>Française</option>
                                <option value="Italienne" {{ $restaurant->cuisine == 'Italienne' ? 'selected' : '' }}>Italienne</option>
                                <option value="Japonaise" {{ $restaurant->cuisine == 'Japonaise' ? 'selected' : '' }}>Japonaise</option>
                                <option value="Chinoise" {{ $restaurant->cuisine == 'Chinoise' ? 'selected' : '' }}>Chinoise</option>
                                <option value="Mexicaine" {{ $restaurant->cuisine == 'Mexicaine' ? 'selected' : '' }}>Mexicaine</option>
                                <option value="Fast Food" {{ $restaurant->cuisine == 'Fast Food' ? 'selected' : '' }}>Fast Food</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('restaurants.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500">
                                Annuler
                            </a>
                            <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700">
                                Mettre à jour
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>