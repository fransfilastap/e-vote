<div class="flex flex-col items-center p-10 space-y-2">
    <h5 class="p-2 text-lg font-bold text-white bg-blue-600 rounded shadow-md">Vote Result</h5>
    @foreach ($vote->options as $options)
    <div class="w-full p-4 bg-white rounded shadow lg:w-1/2 xl:w-1/3">
        <div class="flex flex-row">
            <div class="w-16 h-16 rounded-full">
                <img class="object-cover rounded-full" src="{{ asset($options->photos) }}"/>
            </div>
            <div class="flex-auto p-2">
                <div class="flex flex-col">
                    <h5 class="font-semibold text-gray-900 text-md">{{ $options->label }}</h5>
                    <div class="flex mt-3">
                        <span class="py-1 text-xs font-semibold">Dipilih</span>
                        <span
                            class="py-1 ml-auto text-xs font-semibold text-blue-600">{{ number_format(((count($options->voted)/count($vote->voters))*100),2).'%' }}</span>
                    </div>
                    <div class="flex">
                        <div class="h-2 bg-blue-400 rounded @if( (count($options->voted)/count($vote->voters))!=1) rounded-r-none @endif "
                            style="width: {{ ((count($options->voted)/count($vote->voters))*100) }}%"></div>
                        <div class="h-2 bg-blue-100 rounded rounded-l-none"
                            style="width: {{ 100 - ((count($options->voted)/count($vote->voters))*100) }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
