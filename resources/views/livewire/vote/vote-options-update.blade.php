    <x-jet-dialog-modal wire:model="updating" :maxWidth="'full'">
        <x-slot name="title">{{ __('Vote Option Form') }}</x-slot>
        <x-slot name="content">
            <div class="overflow-x-hidden overflow-y-scroll" style="height: 70vh;">
                <form wire:submit.prevent="save">
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="label">
                                Option Label
                            </label>
                            <input wire:model="label" autocomplete="off"
                                class="block w-full px-4 py-3 leading-tight border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="label" type="text" placeholder="Option label">
                            <p class="text-xs italic text-gray-600">Option label. e.g : Nanas, Semangka
                            </p>
                            @error('label') <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="desc">
                                Option Description
                            </label>
                            <textarea wire:model="desc" autocomplete="off"
                                class="block w-full px-4 py-3 leading-tight border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="desc"></textarea>
                            <p class="text-xs italic text-gray-600">Description
                            </p>
                            @error('desc') <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="desc">
                                Photo
                            </label>
                            <input type="file" wire:model="photo"
                                class="block w-full px-4 py-3 leading-tight border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <p class="text-xs italic text-gray-600">Description
                            </p>
                            @error('photo') <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div wire:loading>
                        <p>Mohon menunggu...</p>
                    </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('updating')" type="reset">
                Batal</x-jet-secondary-button>
            <x-jet-button type="submit">Simpan</x-jet-button>
            </form>
        </x-slot>
    </x-jet-dialog-modal>
