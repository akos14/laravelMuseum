<x-guest-layout>
    <x-slot name="title">
        {{ Str::ucfirst($item->name) }} tárgy módosítása
    </x-slot>
    <div class="container mx-auto p-3 lg:px-36">
        <div class="grid grid-cols-3 gap-6 px-32">
            <div class="col-span-3 lg:col-span-3 p-2 border rounded-lg bg-gray-100">
                <h2 class="font-semibold text-3xl my-2 inline-block p-3">{{ Str::ucfirst($item->name) }} tárgy
                    módosítása</h2>
                <a href="{{ route('items.show', $item) }}"
                    class="inline-flex bg-red-500 border border-transparent rounded-md text-base text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150 float-right content-center">
                    <i class="fa-solid fa-xmark p-1 mx-1"></i>
                </a>
                <p class="mb-2 p-3">Ezen az oldalon lehet a(z) {{ $item->name }} tárgy adatait módosítani.</p>
                <div class="ml-5 w-[96%] border-t border-gray-400"></div>
                <form x-data="{ itemName: '{{ old('name', $item->name) }}', itemObtained: '{{ old('obtained', $item->obtained) }}', itemDescription: '{{ old('description', $item->description) }}', itemImage: '{{ old('image', $item->image) }}' }" action="{{ route('items.update', $item) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="container mx-auto p-3">
                        <div class="flex flex-col">
                            <div class="col-span-2 lg:col-span-1">
                                <div class="w-1/2 p-1 col-span-2 lg:col-span-1 inline-block">
                                    <label for="name" class="block font-medium text-gray-700">Tárgy neve</label>
                                    <input type="text" name="name" id="name"
                                        class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 border rounded-lg"
                                        x-model="itemName">
                                    @error('name')
                                        <div class="font-medium text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-1/2 p-1 col-span-2 lg:col-span-1 float-right">
                                    <label class="font-medium text-gray-700">Tárgy gyűjteménybe kerülése</label>
                                    <input type="date" name="obtained" id="obtained"
                                        class="mt-1 focus:ring-gray-500 focus:border-gray-500  w-full shadow-sm sm:text-sm border-gray-300 float-right border rounded-lg"
                                        x-model="itemObtained">
                                    @error('obtained')
                                        <div class="font-medium text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="block font-medium text-gray-700 pt-2">Tárgy leírása</label>
                                <textarea name="description" id="description"
                                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 border rounded-lg"
                                    x-model="itemDescription"></textarea>
                                @error('description')
                                    <div class="font-medium text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label class="block font-medium text-gray-700 pt-2">Kép</label>
                                @if ($item->image !== null)
                                    <img class="w-96" src="{{ Storage::url('images/' . $item->image) }}">
                                @endif
                                <input type="file" name="image" id="image"
                                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-1/2 p-1 shadow-sm sm:text-sm border-gray-300 border rounded-lg bg-white"
                                    x-model="itemImage">
                            </div>
                            @error('image')
                                <div class="font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label class="block font-medium text-gray-700 py-2">Címkék</label>
                            <div class="columns-3">
                                @foreach ($labels as $l)
                                    <div class="flex flex-row pb-1">
                                        <input type="checkbox" class="my-0.5 mx-1 rounded" name="labels[]"
                                            value="{{ $l->id }}"
                                            {{ (is_array(old('labels')) && in_array($l->id, old('labels'))) || $item->labels->contains('name', $l->name) ? 'checked' : '' }}>
                                        <div class="w-full text-center py-0.5 px-1.5 font-semibold text-sm rounded-lg"
                                            style="background-color: {{ $l->color }};">{{ $l->name }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('labels')
                                <div class="font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                        class="float-right rounded-lg
          inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-l text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150
          ">Mentés</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
