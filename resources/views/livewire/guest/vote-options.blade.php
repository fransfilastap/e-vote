<div class="w-4/5 py-10 mx-auto">
    <h5 class="items-center ml-2 text-lg font-bold text-cool-gray-600">Kandidat</h5>
    <div class="flex flex-col sm:flex-row justify-items-center">
        @foreach ($options as $option)
            <livewire:guest.vote-form :voteOption="$option" :key="'option'.md5(time().$option->id)" />
        @endforeach
    </div>
    <livewire:guest.vote-verify />
</div>
