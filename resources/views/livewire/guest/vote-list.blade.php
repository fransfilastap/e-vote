<div class="flex flex-col items-center p-10 space-y-2">
    <h5 class="p-2 mb-2 text-lg font-bold text-white bg-blue-600 rounded shadow">Vote App</h5>
    <h5 class="p-2 mb-2 text-sm text-gray-600">Vote list</h5>
    @if (count($votes) > 0)
        @foreach ($votes as $vote)
            @if (count($vote->voters) > 1 && count($vote->options) > 1)
                <livewire:guest.vote-card :vote="$vote" :key="'vote_card'.md5(time().$vote->uuid)" />
            @endif
        @endforeach
    @else
        <h5 class="p-2 mb-2 text-xs text-gray-600">Nothing here</h5>
    @endif
</div>
