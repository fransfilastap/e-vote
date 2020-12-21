<x-jet-dialog-modal wire:model="reading" :maxWidth="'md'">
    <x-slot name="title">
        <h5 class="font-bold">Description</h5>
    </x-slot>
    <x-slot name="content">
        <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full px-3">
                <p>{{ $description }}</p>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('reading')" type="reset">
            Tutup</x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
