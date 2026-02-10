<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-white">Tableau de Bord Admin</h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Restaurants -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-200 text-sm font-medium">Total Restaurants</p>
                            <p class="text-white text-4xl font-bold mt-2">{{ $totalRestaurants }}</p>
                        </div>
                        <div class="bg-blue-500/30 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-200 text-sm font-medium">Total Utilisateurs</p>
                            <p class="text-white text-4xl font-bold mt-2">{{ $totalUsers }}</p>
                        </div>
                        <div class="bg-green-500/30 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Restaurants -->
                <div class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-orange-200 text-sm font-medium">Restaurants Actifs</p>
                            <p class="text-white text-4xl font-bold mt-2">{{ $activeRestaurants }}</p>
                        </div>
                        <div class="bg-orange-500/30 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Maintenance -->
                <div class="bg-gradient-to-br from-red-600 to-red-700 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-200 text-sm font-medium">En Maintenance</p>
                            <p class="text-white text-4xl font-bold mt-2">{{ $maintenanceRestaurants }}</p>
                        </div>
                        <div class="bg-red-500/30 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 shadow-2xl border border-slate-700">
                <h3 class="text-xl font-bold text-white mb-4">Actions Rapides</h3>
                <div class="flex gap-4">
                    <a href="{{ route('admin.restaurants') }}" class="px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-xl hover:shadow-2xl hover:shadow-orange-500/50 transition-all duration-300 font-semibold">
                        Gérer les Restaurants
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>