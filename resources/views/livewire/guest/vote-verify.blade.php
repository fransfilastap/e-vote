<x-jet-dialog-modal wire:model="verify" :maxWidth="'md'">
    <x-slot name="title">
        <h5 class="font-bold">Verification</h5>
    </x-slot>
    <x-slot name="content">
        <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full px-3">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="voteName">
                    Code
                </label>
                <input wire:model="code" autocomplete="off"
                    class="block w-full px-4 py-3 leading-tight border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="code" type="text" placeholder="Vote Code">
                <p class="text-xs italic text-gray-600">Input your Code
                </p>
                @error('code') <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('verify')" type="reset">
            Batal</x-jet-secondary-button>
        <x-jet-button wire:click="verify()">Vote</x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
