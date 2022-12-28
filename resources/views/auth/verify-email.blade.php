<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a class="font-bold my-4 text-3xl" href="{{ route('home') }}">
                <i class="fa-solid fa-building-columns"></i> Számítógépes múzeum
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Köszönjük, hogy regisztráltál! Mielőtt bejelentkeznél, igazold vissza a regisztrációd az e-mail címedre küldött visszaigazoló e-mail segítségével. Ha nem kaptad meg az e-mailt, küldönk egy újat.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Egy új visszaigazoló e-mail lett küldve a megadott e-mail címedre!') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Visszaigazoló E-mail Újraküldése') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Kijelentkezés') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
