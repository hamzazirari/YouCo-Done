<x-app-layout>
    <div class="min-h-screen bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header avec titre --}}
            <div class="bg-gradient-to-r from-orange-600 to-amber-500 rounded-2xl p-8 mb-10 shadow-2xl">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-white tracking-tight mb-2">
                        🔍 Rechercher un Restaurant
                    </h2>
                    <p class="text-orange-100 opacity-90 font-medium">
                        Trouvez le restaurant parfait selon vos critères
                    </p>
                </div>
            </div>

            {{-- Formulaire de recherche --}}
            <form method="GET" action="{{ route('restaurants.search') }}" 
                  class="bg-gray-800 border border-gray-700 rounded-3xl p-8 mb-10 shadow-xl">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    
                    {{-- Champ Ville --}}
                    <div>
                        <label class="block text-orange-400 font-bold mb-3 text-sm uppercase tracking-wider">
                            📍 Ville
                        </label>
                        <input 
                            type="text" 
                            name="ville" 
                            value="{{ request('ville') }}"
                            placeholder="Ex: Casablanca, Marrakech..."
                            class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition-all"
                        >
                    </div>
                    
                    {{-- Champ Cuisine --}}
                    <div>
                        <label class="block text-orange-400 font-bold mb-3 text-sm uppercase tracking-wider">
                            🍽️ Type de cuisine
                        </label>
                        <input 
                            type="text" 
                            name="cuisine" 
                            value="{{ request('cuisine') }}"
                            placeholder="Ex: Marocaine, Italienne..."
                            class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition-all"
                        >
                    </div>
                    
                </div>
                
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    {{-- Bouton rechercher --}}
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-orange-600 to-amber-500 text-white font-bold rounded-xl hover:from-orange-700 hover:to-amber-600 transition-all shadow-lg transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Rechercher
                    </button>
                    
                    {{-- Sélecteur nombre par page --}}
                    <div class="flex items-center gap-3">
                        <label class="text-gray-400 font-medium text-sm">Résultats par page:</label>
                        <select name="per_page" 
                                class="bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition-all">
                            <option value="4" {{ request('per_page') == 4 ? 'selected' : '' }}>4</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        </select>
                    </div>
                </div>
            </form>

           
           {{-- Résultats de recherche --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($restaurants as $restaurant)
        <div class="bg-gray-800 border border-gray-700 rounded-3xl overflow-hidden shadow-xl hover:border-orange-500 transition-all duration-300">
            <div class="p-8">
                <h3 class="text-2xl font-bold text-white mb-6">{{ $restaurant->name }}</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center text-gray-400">
                        <span class="text-orange-500 mr-3">📍</span>
                        <span class="text-sm font-medium">{{ $restaurant->ville }}</span>
                    </div>
                    <div class="flex items-center text-gray-400">
                        <span class="text-orange-500 mr-3">🍽️</span>
                        <span class="text-sm font-medium">{{ $restaurant->cuisine }}</span>
                    </div>
                    <div class="flex items-center text-gray-400">
                        <span class="text-orange-500 mr-3">👥</span>
                        <span class="text-sm font-medium">{{ $restaurant->capacity }} Places</span>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700">
                <a href="{{ route('restaurants.show', $restaurant) }}" 
                   class="block py-4 text-center text-sm font-bold text-orange-500 hover:bg-orange-500 hover:text-white transition-all">
                    Voir les détails
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full bg-gray-800 rounded-3xl p-20 text-center border-2 border-dashed border-gray-700">
            <p class="text-gray-500 text-lg">😕 Aucun restaurant trouvé</p>
            <p class="text-gray-400 text-sm mt-2">Essayez avec d'autres critères de recherche</p>
        </div>
    @endforelse
</div>

{{-- Pagination --}}
<div class="mt-8">
    {{ $restaurants->appends(request()->except('page'))->links() }}
</div>

        </div>
    </div>
</x-app-layout>