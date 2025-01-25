<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Cedula -->
        <div>
            <x-input-label for="user_cedula" :value="__('Cedula')" />
            <x-text-input 
                id="user_cedula" 
                class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" 
                type="text" 
                name="user_cedula" 
                :value="old('user_cedula')" 
            />
            <x-input-error :messages="$errors->get('user_cedula')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                id="password" 
                class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                type="password"
                name="password"
                required autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 bg-green-500 hover:bg-green-600 focus:ring focus:ring-green-300">
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

