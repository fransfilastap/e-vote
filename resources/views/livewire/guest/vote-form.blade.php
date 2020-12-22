<div class="w-full">
    <div
        class="relative overflow-hidden transition duration-500 ease-in-out transform bg-white rounded-lg shadow hover:-translate-y-1 hover:shadow-lg">
        <img class="object-cover object-center w-full h-56" src="{{ $voteOption->photos }}" alt="">
        <div class="h-40 p-4 lg:h-48">
            <a href="#"
                class="block mb-2 text-lg font-semibold text-blue-500 hover:text-blue-600 md:text-base lg:text-lg">
                {{ $voteOption->label }}
            </a>
            <div class="block text-sm leading-relaxed text-gray-600 md:text-xs lg:text-xs md:break-normal">
                {{ Str::of($voteOption->description)->limit(100) }}
                @if (strlen($voteOption->description) > 100)
                    <a wire:click="readmore"
                        class="text-blue-500 cursor-pointer hover:text-blue-700 hover:underline">Selengkapnya</a>
                @endif
            </div>
            <div class="relative bottom-0 mt-2 mb-4 lg:absolute md:hidden lg:block">
                <a href="#" wire:click.prevent="voting()"
                    class="items-center inline px-4 py-2 text-xs font-bold text-white bg-green-500 rounded-full hover:bg-green-700"
                    href="#">#VoteMe</a>
            </div>
        </div>
    </div>
</div>
