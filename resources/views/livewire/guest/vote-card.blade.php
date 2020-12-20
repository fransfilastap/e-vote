<div class="w-full p-4 bg-white rounded shadow lg:w-1/2 xl:w-1/3">
    <div class="flex">
        <div class="w-2/3">
            <h1 class="font-semibold">
                {{ $vote->vote_name }}
            </h1>
            <span
                class="block text-xs text-blue-400 uppercase">{{ $isrunning }} </span>
        </div>
        <div class="w-1/3">
            @if(Carbon\Carbon::now()->between($vote->start_time, $vote->end_time))
            <a href="{{ route('vote-form', ['vote' => $vote->uuid]) }}"
                class="float-right px-2 py-1 text-xs text-white bg-blue-400 rounded">Pilih</a>
            @endif
           @if(Carbon\Carbon::now()->isAfter($vote->end_time))
            <a href="{{ route('vote-result', ['vote' => $vote->uuid]) }}"
                class="float-right px-2 py-1 text-xs text-white bg-blue-400 rounded">Hasil</a>
            @endif
        </div>
    </div>
    <div class="flex">
        <div class="flex-col w-1/2">
            <span class="flex justify-center text-2xl font-semibold">{{ count($vote->options) }}</span>
            <span class="flex justify-center text-gray-500">Kandidat</span>
        </div>
        <div class="flex-col w-1/2">
            <span class="flex justify-center text-2xl font-semibold">{{ count($vote->voters) }}</span>
            <span class="flex justify-center text-gray-500">Pemilih</span>
        </div>
    </div>

    <div class="flex mt-3">
        <span class="py-1 text-xs font-semibold">Yang telah memilih</span>
        <span class="py-1 ml-auto text-xs font-semibold text-blue-600">{{ number_format(((count($vote->voted)/count($vote->voters))*100),2).'%' }}</span>
    </div>
    <div class="flex">
        <div class="h-2 bg-blue-400 rounded @if( (count($vote->voted)/count($vote->voters))!=1) rounded-r-none @endif " style="width: {{ ((count($vote->voted)/count($vote->voters))*100) }}%"></div>
        <div class="h-2 bg-blue-100 rounded rounded-l-none" style="width: {{ 100 - ((count($vote->voted)/count($vote->voters))*100) }}%"></div>
    </div>

</div>
