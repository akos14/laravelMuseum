<x-guest-layout>
    <x-slot name="title">
        {{ $label->name }} címke módosítása
    </x-slot>
    <div class="container mx-auto p-3 lg:px-36">
        <div class="grid grid-cols-3 gap-6 px-32">
            <div class="col-span-3 lg:col-span-3 p-2 border rounded-lg bg-gray-100">
                <h2 class="font-semibold text-3xl my-2 inline-block p-3">{{ Str::ucfirst($label->name) }} címke
                    módosítása</h2>
                <a href="{{ route('labels.show', $label) }}"
                    class="inline-flex bg-red-500 border border-transparent rounded-md text-base text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150 float-right content-center">
                    <i class="fa-solid fa-xmark p-1 mx-1"></i>
                </a>
                <p class="mb-2 p-3">Ezen az oldalon lehet egy rendszerbeli címkét szerkeszteni. A tárgyakat úgy lehet
                    hozzárendelni, ha a címke mentése után módosítod a tárgyat, és ott bejelölöd ezt a címkét is.</p>
                <div class="ml-5 w-[96%] border-t border-gray-400"></div>
                <form x-data="{ labelName: '{{ old('name', $label->name) }}', bgColor: '{{ old('bg-color', $label->color) }}', display: '{{ old('display', $label->display) }}' }" x-init="() => {
                    new Picker({
                        color: bgColor,
                        popup: 'bottom',
                        parent: $refs.bgColorPicker,
                        onDone: (color) => bgColor = color.hex
                    });
                }" action="{{ route('labels.update', $label) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="container mx-auto p-3">
                        <div class="flex flex-col">
                            <div class="col-span-2 lg:col-span-1">
                                <div class="w-1/2 p-1 col-span-2 lg:col-span-1 inline-block">
                                    <label for="name" class="block font-medium text-gray-700">Címke neve</label>
                                    <input type="text" name="name" id="name"
                                        class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 border rounded-lg"
                                        x-model="labelName">
                                    @error('name')
                                        <div class="font-medium text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-1/2 p-1 col-span-2 lg:col-span-1 float-right">
                                    <label class="font-medium text-gray-700">Címke színe</label>
                                    <div x-ref="bgColorPicker" id="bg-color-picker"
                                        class="mt-1 py-[18px] focus:ring-gray-500 focus:border-gray-500  w-full shadow-sm sm:text-sm border-gray-300 float-right border rounded-lg"
                                        :style="`background-color: ${bgColor};`"></div>
                                    <p x-text="bgColor"></p>
                                    @error('bg-color')
                                        <div class="font-medium text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full p-1 col-span-2 lg:col-span-1">
                                <div class="w-1/2 inline-block p-1">
                                    <label class="w-full flex font-medium text-gray-700 pt-2">Megjelenítés</label>
                                    <div
                                        class="w-full flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700 bg-white mt-2">
                                        <input id="display" type="radio" value=1 name="display"
                                            class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500 dark:focus:ring-gray-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white-700 dark:border-gray-600"
                                            {{ old('display', $label->display) == 1 ? 'checked' : '' }}>
                                        <label for="display" class="py-4 ml-2 w-full text-sm font-medium">Igen</label>
                                    </div>
                                    <div
                                        class="w-full flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700 bg-white mt-2">
                                        <input id="display-2" type="radio" value=0 name="display"
                                            class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500 dark:focus:ring-gray-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white-700 dark:border-gray-600"
                                            {{ old('display', $label->display) == 0 ? 'checked' : '' }}>
                                        <label for="display-2" class="py-4 ml-2 w-full text-sm font-medium">Nem</label>
                                    </div>
                                    @error('display')
                                        <div class="font-medium text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-1/2 p-1 float-right">
                                    <div x-show="labelName.length > 0">
                                        <label class="w-full flex font-medium text-gray-700 pt-2 mb-2">Előnézet</label>
                                        <span x-text="labelName" :style="`background-color: ${bgColor}`"
                                            class="text-center px-4 rounded border border-gray-200 dark:border-gray-700 bg-white font-semibold rounded-lg"></span>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <input type="hidden" id="bg-color" name="bg-color" x-model="bgColor" />

                        <button type="submit"
                            class="float-right rounded-lg
              inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-l text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150
              ">Mentés</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
