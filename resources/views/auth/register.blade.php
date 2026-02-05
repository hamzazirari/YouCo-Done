<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-['Playfair_Display'] font-bold text-orange-600">Bienvenue à Table</h2>
        <p class="text-white text-sm mt-2 uppercase tracking-widest">Créer votre profil</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nom complet')" class="text-xs font-bold uppercase text-white" />
            <x-text-input id="name" class="block mt-1 w-full border-gray-200 focus:border-orange-500 focus:ring-orange-500 rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Jean Dupont" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-xs font-bold uppercase text-white" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-200 focus:border-orange-500 focus:ring-orange-500 rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="text-xs font-bold uppercase text-white" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-200 focus:border-orange-500 focus:ring-orange-500 rounded-lg"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-xs font-bold uppercase text-white" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-200 focus:border-orange-500 focus:ring-orange-500 rounded-lg"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="role" :value="__('Vous êtes ?')" class="text-xs font-bold uppercase text-white" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-200 focus:border-orange-500 focus:ring-orange-500 rounded-lg shadow-sm bg-white text-gray-700">
                <option value="client">🍴 Client (Commander des plats)</option>
                <option value="restaurateur">👨‍🍳 Restaurateur (Gérer un établissement)</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="pt-4 flex flex-col gap-4 items-center">
            <x-primary-button class="w-full justify-center bg-orange-600 hover:bg-orange-700 py-3 rounded-lg text-sm font-bold tracking-widest transition duration-150 shadow-lg shadow-orange-200">
                {{ __('Finaliser l\'inscription') }}
            </x-primary-button>

            <a class="underline text-sm text-white hover:text-orange-600 transition-colors" href="{{ route('login') }}">
                {{ __('Déjà inscrit ? Connectez-vous') }}
            </a>
        </div>
    </form>
</x-guest-layout>