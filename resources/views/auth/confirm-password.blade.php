<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a class="font-bold my-4 text-3xl" href="{{ route('home') }}">
                <i class="fa-solid fa-building-columns"></i> Számítógépes múzeum
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Kérlek add meg újból a jelszavad a folytatáshoz!') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Jelszó')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('Megerősítés') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
