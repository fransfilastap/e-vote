<div class="flex flex-col items-center p-10 space-y-2">
    <h5 class="p-2 text-lg font-bold text-white bg-blue-600 rounded shadow-md">Available Vote</h5>
    @foreach ($votes as $vote)
        @if (count($vote->voters) > 1 && count($vote->options) > 1)
            <livewire:guest.vote-card :vote="$vote" :key="'vote_card'.md5(time().$vote->uuid)" />
        @endif
    @endforeach
</div>
