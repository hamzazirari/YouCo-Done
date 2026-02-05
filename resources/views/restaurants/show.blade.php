<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $restaurant->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    
                    <div class="mb-6">
                        <h1 class="text-4xl font-bold text-orange-600 dark:text-orange-400 mb-4">{{ $restaurant->name }}</h1>
                    </div>

                    <div class="space-y-4 text-lg">
                        <div class="flex items-center">
                            <span class="text-2xl mr-3">📍</span>
                            <div>
                                <p class="font-semibold text-gray-700 dark:text-gray-300">Ville</p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $restaurant->ville }}</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <span class="text-2xl mr-3">🍽️</span>
                            <div>
                                <p class="font-semibold text-gray-700 dark:text-gray-300">Type de Cuisine</p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $restaurant->cuisine }}</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <span class="text-2xl mr-3">👥</span>
                            <div>
                                <p class="font-semibold text-gray-700 dark:text-gray-300">Capacité</p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $restaurant->capacity }} personnes</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <span class="text-2xl mr-3">👨‍💼</span>
                            <div>
                                <p class="font-semibold text-gray-700 dark:text-gray-300">Restaurateur</p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $restaurant->user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('restaurants.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500">
                            Retour
                        </a>
                        @if($restaurant->user_id == auth()->id())
                        <a href="{{ route('restaurants.edit', $restaurant) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                            Modifier
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>