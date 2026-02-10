<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-white">Gestion des Restaurants</h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if(session('success'))
            <div class="mb-6 p-4 bg-green-500 text-white rounded-xl">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-slate-700/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-white font-semibold">Restaurant</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Propriétaire</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Ville</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Status</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($restaurants as $restaurant)
                        <tr class="border-t border-slate-700 hover:bg-slate-700/30 transition">
                            <td class="px-6 py-4 text-white font-medium">{{ $restaurant->name }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $restaurant->user->name }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $restaurant->ville }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $restaurant->status == 'active' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                    {{ $restaurant->status == 'active' ? 'Actif' : 'Maintenance' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{ route('admin.toggleStatus', $restaurant->id) }}">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg text-sm font-semibold transition">
                                        Changer Status
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>