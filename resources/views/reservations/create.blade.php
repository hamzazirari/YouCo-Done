<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-white">Réserver une table</h2>
    </x-slot>

      @if(session('error'))
            <div class="mb-6 p-4 bg-red-500 text-white rounded-xl">
                {{ session('error') }}
            </div>
            @endif

            @if(session('warning'))
            <div class="mb-6 p-4 bg-yellow-500 text-white rounded-xl">
                ⚠️ {{ session('warning') }}
            </div>
            @endif

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-2xl border border-slate-700 p-8">
                
                <!-- Info Restaurant -->
                <div class="mb-8 pb-6 border-b border-slate-700">
                    <h3 class="text-2xl font-bold text-orange-400 mb-2">{{ $restaurant->name }}</h3>
                    <p class="text-gray-300">{{ $restaurant->ville }} • {{ $restaurant->cuisine }}</p>
                    <p class="text-gray-400 text-sm mt-2">Capacité : {{ $restaurant->capacity }} couverts</p>
                </div>

                <!-- Formulaire -->
                <form method="POST" action="{{ route('reservations.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                    <!-- Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Date de réservation</label>
                        <input type="date" 
                               name="date" 
                               required 
                               min="{{ date('Y-m-d') }}"
                               class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-xl text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        @error('date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nombre de personnes -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nombre de personnes</label>
                        <input type="number" 
                               name="tables" 
                               required 
                               min="1" 
                               max="{{ $restaurant->capacity }}"
                               class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-xl text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        @error('tables')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-4">
                        <a href="{{ route('restaurants.browse') }}" 
                           class="flex-1 px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-xl text-center font-semibold transition">
                            Annuler
                        </a>
                        <button type="submit" 
                                class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white rounded-xl font-semibold transition shadow-lg">
                            Confirmer la réservation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>