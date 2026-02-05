<x-app-layout>
    <div class="min-h-screen bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
    <div>
        <h2 class="text-3xl font-extrabold text-white tracking-tight">
            Chef Dashboard
        </h2>
        <p class="text-orange-100 opacity-90 font-medium">
            Gérez vos {{ $restaurants->count() }} établissements gastronomiques
        </p>
    </div>
    
    {{-- Boutons --}}
    <div class="flex gap-4">
        {{-- Bouton Rechercher --}}
        <a href="{{ route('restaurants.search') }}" 
           class="inline-flex items-center px-6 py-3 bg-gray-800 text-orange-400 hover:bg-gray-700 font-bold rounded-xl transition-all shadow-lg border border-gray-700">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Rechercher
        </a>
        
        {{-- Bouton Nouveau Restaurant --}}
        <a href="{{ route('restaurants.create') }}" 
           class="inline-flex items-center px-6 py-3 bg-white text-orange-600 hover:bg-gray-100 font-bold rounded-xl transition-all shadow-lg transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nouveau Restaurant
        </a>
    </div>
</div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($restaurants as $restaurant)
                    <div class="bg-gray-800 border border-gray-700 rounded-3xl overflow-hidden shadow-xl hover:border-orange-500 transition-all duration-300">
                        <div class="p-8">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-gray-700 text-orange-400 text-xs font-bold px-3 py-1 rounded-full border border-gray-600">
                                    Restaurant #{{ $restaurant->id }}
                                </span>
                            </div>

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

                        <div class="flex border-t border-gray-700">
                            <a href="{{ route('restaurants.show', $restaurant) }}" 
                               class="flex-1 py-4 text-center text-sm font-bold text-gray-300 hover:bg-gray-700 hover:text-white transition-colors border-r border-gray-700">
                                Gérer
                            </a>
                            <a href="{{ route('restaurants.edit', $restaurant) }}" 
                               class="flex-1 py-4 text-center text-sm font-bold text-orange-500 hover:bg-orange-500 hover:text-white transition-all">
                                Modifier
                            </a>
                        </div>
                        
                        <form method="POST" action="{{ route('restaurants.destroy', $restaurant) }}" onsubmit="return confirm('Supprimer cet établissement ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full py-3 bg-red-900/10 text-red-500 text-xs font-bold hover:bg-red-900/20 transition-all">
                                SUPPRIMER L'ÉTABLISSEMENT
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="col-span-full bg-gray-800 rounded-3xl p-20 text-center border-2 border-dashed border-gray-700">
                        <p class="text-gray-500 text-lg">Vous n'avez pas encore de restaurant.</p>
                        <a href="{{ route('restaurants.create') }}" class="text-orange-500 hover:underline mt-4 inline-block">Commencez ici</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>