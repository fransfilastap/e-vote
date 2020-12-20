<div class="p-2 sm:w-1/4">
    <div class="px-6 py-8 text-center bg-white rounded-lg shadow-lg">
        <div class="mb-3">
            <img class="w-64 h-64 mx-auto rounded-full" src="{{ $voteOption->photos }}" alt=""
                style="background-size: cover; background-position: bottom center;" />
        </div>
        <h2 class="text-xl font-medium text-gray-700">{{ $voteOption->label }}</h2>
        <span class="block mb-5 text-blue-500">{{ $voteOption->attribute_1 }}</span>

        <a href="#" wire:click="voting()" class="px-4 py-2 text-white bg-blue-500 rounded-full">Vote</a>
    </div>
</div>
