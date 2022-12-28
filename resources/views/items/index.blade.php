<x-guest-layout>
    <x-slot name="title">
        Főoldal
    </x-slot>
    <div class="container mx-auto p-3 lg:px-36">
        <h2 class="font-semibold text-3xl my-2">Minden tárgy</h2>
        <div class="grid grid-cols-4 gap-6">
            <div class="col-span-4 lg:col-span-3">
                <div class="grid col-span-3">
                    @if (Session::has('label-changed'))
                        <div
                            class="col-span-3 lg:col-span-1 flex my-2.5 place-content-center bg-green-200 text-center rounded-lg py-1">
                            A(z) {{ Session::get('label-changed') }} sikeres!
                        </div>
                    @elseif(Session::has('item-changed'))
                        <div
                            class="col-span-3 lg:col-span-1 flex my-2.5 place-content-center bg-green-200 text-center rounded-lg py-1">
                            A(z) {{ Session::get('item-changed') }} sikeres!
                        </div>
                    @endif
                    @foreach ($items as $i)
                        <div class="col-span-3 lg:col-span-1 flex my-2.5">
                            <div class="rounded-md">
                                @if ($i->image === null)
                                    <img class="h-96 w-[1200px] rounded-l-lg object-cover"
                                        src="https://listverse.com/wp-content/uploads/2020/08/3-bust-of-nefertiti.jpg">
                                @else
                                    <img class="h-96 w-[1200px] rounded-l-lg object-cover"
                                        src="{{ Storage::url('images/' . $i->image) }}">
                                @endif
                            </div>
                            <div
                                class="relative pt-20 px-2.5 py-2 bg-gray-100 border border-gray-400 rounded-r-lg w-full">
                                <h1 class="text-xl mb-0.5 font-semibold">
                                    {{ Str::ucfirst($i->name) }}
                                </h1>
                                <div class="flex-grow border-t border-gray-400"></div>
                                <p class="text-gray-600 mt-1">
                                    {{ Str::limit($i->description, 200) }}
                                </p>
                                <a href="{{ route('items.show', $i) }}"
                                    class="absolute items-center px-4 text-xl py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 w-[98%] left-1 bottom-1 text-right">Részletek
                                    <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $items->links() }}
            </div>
            <div class="relative col-span-4 my-2.5 lg:col-span-1">
                @auth
                    <div class="absolute -mt-14 justify-center inline-block w-full">
                        @can('create', App\Label::class)
                            <a href="{{ route('labels.create') }}"
                                class="inline-block items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150"><i
                                    class="fas fa-plus-circle"></i> Új címke</a>
                        @endcan
                        @can('create', App\Item::class)
                            <a href="{{ route('items.create') }}"
                                class="items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150 float-right"><i
                                    class="fas fa-plus-circle"></i> Új tárgy</a>
                        @endcan
                    </div>
                @endauth
                <div class="absolute grid grid-cols-1 gap-3 w-full">
                    <div class="border min-h-[384px] px-2.5 py-2 bg-gray-100 border-gray-400 rounded-lg">
                        <h3 class="mb-0.5 text-xl font-semibold">
                            Címkék
                        </h3>
                        <div class="flex-grow border-t border-gray-400"></div>
                        <div
                            class="flex flex-row flex-wrap gap-1 mt-3 place-content-center justify-start min-h-[320px]">
                            @foreach ($labels as $l)
                                <a href="{{ route('labels.show', $l) }}"
                                    class="py-0.5 px-1.5 font-semibold text-sm rounded-lg"
                                    style="background-color: {{ $l->color }}">{{ $l->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="border px-2.5 py-2 bg-gray-100 border-gray-400 rounded-lg my-2.5">
                        <h3 class="mb-0.5 text-xl font-semibold">
                            Statisztika
                        </h3>
                        <ul class="fa-ul px-[15%]">
                            <li><span class="fa-li"><i class="fas fa-user"></i></span>Felhasználók:
                                {{ $user_count }}</li>
                            <li><span class="fa-li"><i class="fa-solid fa-crown"></i></span>Tárgyak:
                                {{ $item_count }}</li>
                            <li><span class="fa-li"><i class="fa-solid fa-tag"></i></span>Címkék: {{ $label_count }}
                            </li>
                            <li><span class="fa-li"><i class="fas fa-comments"></i></span>Hozzászólások:
                                {{ $comment_count }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
