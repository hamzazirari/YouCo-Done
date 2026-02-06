<x-app-layout>
    <div class="min-h-screen bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 border border-gray-700 rounded-3xl p-8 md:p-12 mb-12 shadow-2xl">
                <div class="max-w-3xl">
                    <h2 class="text-4xl font-extrabold text-white tracking-tight mb-4">
                        Trouvez la <span class="text-orange-500">meilleure table</span>
                    </h2>
                    <p class="text-gray-400 text-lg mb-8 font-medium">
                        Découvrez des saveurs uniques dans votre ville.
                    </p>

                    <form action="{{ route('restaurants.browse') }}" method="GET" class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-6 w-6 text-orange-500 group-focus-within:text-orange-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <input type="text" 
                               name="ville" 
                               value="{{ request('ville') }}"
                               placeholder="Entrez ville (ex: Paris, Casablanca...)" 
                               class="block w-full pl-12 pr-32 py-5 bg-gray-800 border-2 border-gray-700 rounded-2xl text-white placeholder-gray-500 focus:ring-0 focus:border-orange-500 transition-all text-lg shadow-inner">
                        
                        <button type="submit" 
                                class="absolute right-3 top-2.5 bottom-2.5 px-6 bg-orange-600 hover:bg-orange-500 text-white font-bold rounded-xl transition-all shadow-lg flex items-center">
                            Rechercher
                        </button>
                    </form>
                    
                </div>
                
            </div>
            <a href="{{ route('favorites.index') }}" 
   class="px-8 py-5 bg-red-600 hover:bg-red-500 text-white font-bold rounded-2xl transition-all shadow-lg flex items-center gap-2 whitespace-nowrap">
    ❤️ Mes Favoris
</a>
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-bold text-white flex items-center">
                    <span class="w-8 h-1 bg-orange-500 rounded-full mr-3"></span>
                    @if(request('city'))
                        Restaurants disponibles à "{{ request('city') }}"
                    @else
                        Etablissements à la une
                    @endif
                </h3>
                <span class="text-gray-500 text-sm font-medium uppercase tracking-widest">{{ $restaurants->count() }} adresses</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($restaurants as $restaurant)
                    <div class="group bg-gray-800 border border-gray-700 rounded-3xl overflow-hidden shadow-xl hover:shadow-orange-900/20 transition-all duration-300">
                        
                        <div class="h-48 bg-gray-700 relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-6">
                                <span class="bg-orange-600 text-white text-[10px] font-black px-3 py-1 rounded-md uppercase tracking-widest">
                                    {{ $restaurant->cuisine }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-orange-400 transition-colors">{{ $restaurant->name }}</h3>
                            
                            <div class="flex items-center text-gray-400 mb-6 italic">
                                <svg class="w-4 h-4 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                                </svg>
                                {{ $restaurant->ville }}
                            </div>

                           <div class="flex items-center justify-between pt-6 border-t border-gray-700">
    <div class="text-sm">
        <p class="text-gray-500 uppercase text-[10px] font-bold tracking-widest">Capacité</p>
        <p class="text-white font-bold">{{ $restaurant->capacity }} places</p>
    </div>
    
    <div class="flex gap-2">
        {{-- Bouton Favori --}}
        <form action="{{ route('favorites.toggle', $restaurant->id) }}" method="POST">
            @csrf
            <button type="submit" 
                    class="px-4 py-2.5 bg-gray-700 hover:bg-red-600 text-white text-sm font-bold rounded-xl transition-all">
                ❤️
            </button>
        </form>
        
        {{-- Bouton Voir Menu --}}
        <a href="{{ route('restaurants.show', $restaurant) }}" 
           class="inline-flex items-center px-5 py-2.5 bg-gray-700 hover:bg-orange-600 text-white text-sm font-bold rounded-xl transition-all group-hover:scale-105">
            Voir le Menu
        </a>
    </div>
</div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="text-6xl mb-4">🔍</div>
                        <h3 class="text-2xl font-bold text-white mb-2">Aucun résultat trouvé</h3>
                        <p class="text-gray-500">Essayez de taper une autre ville ou vérifiez l'orthographe.</p>
                        <a href="{{ route('restaurants.index') }}" class="mt-6 inline-block text-orange-500 font-bold hover:underline">Voir tous les restaurants</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>