<div class="w-4/5 py-10 mx-auto">
    <h5 class="p-2 text-lg font-bold text-center text-gray-900">{{ $vote->vote_name }}</h5>
    <div class="flex flex-col sm:flex-row md:flex-row">
        @foreach ($options as $option)
            <livewire:guest.vote-form :voteOption="$option" :key="'option'.md5(time().$option->id)" />
        @endforeach
    </div>
    <livewire:guest.vote-verify />
</div>
