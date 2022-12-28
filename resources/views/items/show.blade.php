<x-guest-layout>
    <x-slot name="title">
        {{ $item->name }}
    </x-slot>
    <div class="container mx-auto p-3 lg:px-36">
        <h2 class="font-semibold text-3xl my-2">{{ Str::ucfirst($item->name) }} tárgy részletei</h2>
        <div class="grid grid-cols-4 gap-6">
            <div class="col-span-4 lg:col-span-3">

                @if (Session::has('item-changed'))
                    <div
                        class="col-span-3 lg:col-span-1 flex my-2.5 place-content-center bg-green-200 text-center rounded-lg py-1">
                        A(z) {{ Session::get('item-changed') }} sikeres!
                    </div>
                @endif
                <div class="px-2.5 py-2 w-full grid justify-items-center">
                    @if ($item->image === null)
                        <img class="rounded-lg"
                            src="https://listverse.com/wp-content/uploads/2020/08/3-bust-of-nefertiti.jpg">
                    @else
                        <img class="rounded-lg" src="{{ Storage::url('images/' . $item->image) }}">
                    @endif
                </div>
                <div class="px-2.5 py-2 border bg-gray-100 rounded-lg border-gray-400">
                    <h2 class="font-semibold text-3xl my-2">Leírás</h2>
                    <div class="flex-grow border-t border-gray-400"></div>
                    <p class="text-gray-600 mt-1 break-words">
                        {{ $item->description }}
                    </p>
                </div>
                <h2 id="comments" class="font-semibold text-3xl mt-20">Hozzászólások</h2>
                @if (Session::has('comment-changed'))
                    <div
                        class="col-span-3 lg:col-span-1 flex my-2.5 place-content-center bg-green-200 text-center rounded-lg py-1">
                        A {{ Session::get('comment-changed') }} sikeres!
                    </div>
                @elseif(Session::has('comment-error'))
                    <div
                        class="col-span-3 lg:col-span-1 flex my-2.5 place-content-center bg-red-200 text-center rounded-lg py-1">
                        {{ Session::get('comment-error') }}
                    </div>
                @endif
                @if (count($comments) != 0)
                    @foreach ($comments as $c)
                        <div class="col-span-3 lg:col-span-1 my-6">
                            <div id="{{ $c->id }}"
                                class="relative px-2.5 py-2 border bg-gray-100 rounded-lg border-gray-400"
                                @if (Auth::user() && (Auth::user()->can('update', $c) || Auth::user()->can('delete', $c))) onmouseenter="console.log('asd'); document.getElementById('{{ $c->id }}').querySelectorAll('a').forEach(el => el.classList.toggle('hidden'));" onmouseleave="document.getElementById('{{ $c->id }}').querySelectorAll('a').forEach(el => el.classList.toggle('hidden'));" @endif>
                                <h3 class="text-xl mb-0.5 font-semibold inline-block">
                                    {{ $c->author->name }}:
                                </h3>
                                <p class="float-right">
                                    {{ $c->created_at }}
                                <p>
                                <div class="flex-grow border-t border-gray-400"></div>
                                @if (Session::has('comment') && Session::get('comment')->id == $c->id)
                                    <form action="{{ route('comments.update', $c) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <textarea name="newtext" id="newtext"
                                            class="mt-1 focus:ring-gray-800 focus:border-gray-800 rounded-lg block w-5/6 shadow-sm sm:text-sm border-gray-300 inline-block">{{ $c->text }}</textarea>
                                        @error('newtext')
                                            <div class="font-medium text-red-500">{{ $message }}</div>
                                        @enderror
                                        <button type="submit"
                                            class="inline-block justify-center px-1 py-1 bg-red-500 border border-transparent rounded-md text-xs text-white uppercase hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150 mt-1 float-right w-1/6"
                                            onclick="event.preventDefault(); document.location.reload(true);">
                                            Mégsem
                                        </button>
                                        <br>
                                        <button type="submit"
                                            class="inline-block justify-center px-1 py-1 -mt-9 bg-green-500 border border-transparent rounded-md text-xs text-white uppercase hover:bg-green-700 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150 float-right w-1/6">
                                            Mentés
                                        </button>
                                    </form>
                                @else
                                    <p class="text-gray-600 mt-1 inline-block break-words w-full">
                                        {{ $c->text }}
                                    </p>
                                @endif
                                @if (Auth::user() && Auth::user()->can('delete', $c) && !Session::has('comment'))
                                    <form class="absolute right-0 top-1/2 mt-1 mr-2" method="POST"
                                        action="{{ route('comments.destroy', $c) }}" id="delete-c-form">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('comments.destroy', $c) }}"
                                            class="items-center px-1 py-1 bg-red-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150 ml-2 hidden"
                                            onclick="event.preventDefault(); document.querySelector('#delete-c-form').submit();">
                                            <i class="fas fa-trash"></i></a>
                                    </form>
                                    <br>
                                @endif
                                @if (Auth::user() && Auth::user()->can('update', $c) && !Session::has('comment'))
                                    <a href="{{ route('comments.edit', $c) }}"
                                        class="absolute items-center px-1 py-1 bg-yellow-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-700 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150 ml-2 mt-1 hidden right-[34px] top-1/2"><i
                                            class="fas fa-edit"></i></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1 class="font-semibold text-1xl my-2 px-2.5 py-2 border rounded-lg border-gray-400">Nincsenek
                        hozzászólások.</h1>
                @endif
                @can('create', App\Comment::class)
                    <h2 class="font-semibold text-3xl my-2">Hozzászólás írása:</h2>
                    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <textarea name="text"
                            class="mt-1 focus:ring-gray-800 focus:border-gray-800 rounded-lg block w-full shadow-sm sm:text-sm border-gray-300"
                            placeholder="Írj valamit..."></textarea>
                        @error('text')
                            <div class="font-medium text-red-500">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="item_id" value="{{ $item->id }}" />
                        <x-primary-button type="submit" class="ml-4 my-3 float-right">
                            Küldés
                        </x-primary-button>
                    </form>
                @endcan
            </div>
            <div class="relative col-span-4 my-2 lg:col-span-1">
                @auth
                    <div class="absolute -mt-14 justify-center inline-block w-full">
                        @can('update', $item)
                            <a href="{{ route('items.edit', $item) }}"
                                class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-700 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150"><i
                                    class="fas fa-edit"></i> Módosítás</a>
                        @endcan
                        @can('delete', $item)
                            <form method="POST" action="{{ route('items.destroy', $item) }}" id="delete-i-form"
                                class="float-right">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('items.destroy', $item) }}"
                                    class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    onclick="event.preventDefault(); document.querySelector('#delete-i-form').submit();">
                                    <i class="fas fa-trash"></i> Törlés</a>
                            </form>
                        @endcan
                    </div>
                @endauth
                <div class="absolute grid grid-cols-1 gap-3 w-full">
                    <div class="border px-2.5 py-2 bg-gray-100 border-gray-400 rounded-lg">
                        <h3 class="mb-0.5 text-xl font-semibold">
                            Címkék
                        </h3>
                        <div class="flex-grow border-t border-gray-400"></div>
                        <div class="flex flex-row flex-wrap gap-1 mt-3">
                            @foreach ($labels as $l)
                                <a href="{{ route('labels.show', $l) }}"
                                    class="py-0.5 px-1.5 font-semibold text-sm rounded-lg"
                                    style="background-color: {{ $l->color }}">{{ $l->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="border px-2.5 py-2 bg-gray-100 border-gray-400 rounded-lg">
                        <h3 class="mb-0.5 text-xl font-semibold">
                            Adatok
                        </h3>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-comments"></i></span>Hozzászólások:
                                {{ $comment_count }}</li>
                            <li><span class="fa-li"><i class="fa-solid fa-database"></i></span>Bekerült:
                                {{ $item->obtained }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
