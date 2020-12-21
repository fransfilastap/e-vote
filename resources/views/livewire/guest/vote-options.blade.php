<main class="py-6">
    <div class="px-6 md:px-32">
        <h5 class="p-2 mb-5 text-lg font-semibold text-center text-gray-700">
            {{ $vote->vote_name }}
        </h5>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            @foreach ($options as $option)
                <livewire:guest.vote-form :voteOption="$option" :key="'option'.md5(time().$option->id)">
            @endforeach
        </div>
    </div>
    <livewire:guest.vote-verify />
</main>
