<div class="py-12">
    <x-slot name="header">
        Manage Vote
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                <div class="mt-2">
                    <x-jet-button wire:click="requestCreate">
                        <svg class="icon line" width="16" height="16" id="file-new" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M10,20H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3h9.59a1,1,0,0,1,.7.29l3.42,3.42a1,1,0,0,1,.29.7V11"
                                style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                            </path>
                            <path d="M18,15v6m3-3H15"
                                style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                            </path>
                        </svg>
                        {{ __('Add Vote') }}
                    </x-jet-button>
                </div>
                <div class="mt-6 text-gray-500">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="w-3/6 px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-400 bg-gray-100 cursor-pointer">
                                        Title
                                    </th>
                                    <th
                                        class="w-1/6 px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-400 bg-gray-100 cursor-pointer">
                                        Start Date
                                    </th>
                                    <th
                                        class="w-1/6 px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-400 bg-gray-100 cursor-pointer">
                                        End Date
                                    </th>
                                    <th
                                        class="w-1/6 px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-400 bg-gray-100 cursor-pointer">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($votes as $vote)
                                    <tr>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ __($vote->vote_name) }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ __($vote->start_time) }}
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ __($vote->end_time) }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-gray-100 border-b border-l border-gray-200">
                                            <div class="flex flex-col space-y-2">
                                                <a href="{{ route('vote-result', [$vote->uuid]) }}" target="_blank"
                                                    class="inline-flex items-center px-1 py-1 text-xs font-bold text-white bg-indigo-600 rounded hover:bg-yellow-700">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-1">Result</span>
                                                </a>
                                                <a href="{{ route('vote-options', [$vote->uuid]) }}"
                                                    class="inline-flex items-center px-1 py-1 text-xs font-bold text-white bg-yellow-400 rounded hover:bg-yellow-700">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-1">Options</span>
                                                </a>
                                                <a href="{{ route('vote-voters', [$vote->uuid]) }}"
                                                    class="inline-flex items-center px-1 py-1 text-xs font-bold text-white bg-teal-600 rounded hover:bg-teal-700">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-1">Voters</span>
                                                </a>
                                                <button wire:click="requestUpdate({{ $vote }})"
                                                    class="inline-flex items-center px-1 py-1 text-xs font-bold text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                                    <svg class="icon line" width="16" height="16" id="file-edit"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path
                                                            d="M8,20H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3h8.59a1,1,0,0,1,.7.29l3.42,3.42a1,1,0,0,1,.29.7V9"
                                                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                                        </path>
                                                        <path
                                                            d="M15.05,21H12.22V18.17l5.66-5.66a1,1,0,0,1,1.41,0l1.42,1.42a1,1,0,0,1,0,1.41Z"
                                                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-1">Edit</span>
                                                </button>
                                                <button wire:click='requestDelete({{ $vote }})'
                                                    class="inline-flex items-center px-1 py-1 text-xs font-bold text-white bg-red-500 rounded hover:bg-red-600">
                                                    <svg class="icon line" width="16" height="16" id="file-remove"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path
                                                            d="M10,20H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3h8.59a1,1,0,0,1,.7.29l3.42,3.42a1,1,0,0,1,.29.7V12"
                                                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                                        </path>
                                                        <line x1="20" y1="18" x2="14" y2="18"
                                                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                                        </line>
                                                    </svg>
                                                    <span class="ml-1">Hapus</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                            {{ $votes->links() }}
                        </div>
                        <livewire:vote.vote-create />
                        <livewire:vote.vote-update />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
