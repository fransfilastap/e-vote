<div class="py-12">
    <x-slot name="header">
        Voter
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
                        {{ __('Add Voter') }}
                    </x-jet-button>
                </div>
                <div class="flex flex-row w-full space-x-2">
                                    <div class="flex flex-wrap mb-2 -mx-3 mt-3">
                        <div class="w-30 px-3">
                            <select wire:model="perPage" class="px-2 py-1 border border-gray-500 rounded">
                                <option>Per Halaman</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                
                            </select/>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-2 -mx-3 mt-3">
                        <div class="w-30 px-3">
                            <select wire:model="voteCount" class="px-2 py-1 border border-gray-500 rounded">
                                <option>Sudah vote/Belum Vote</option>
                                <option value="1">Sudah vote</option>
                                <option value="0">Belum Vote</option>
                            </select/>
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-gray-500">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="w-3/6 px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-400 bg-gray-100 cursor-pointer">
                                        Name
                                    </th>
                                    <th
                                        class="w-2/6 px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-400 bg-gray-100 cursor-pointer">
                                        Code
                                    </th>
                                    <th
                                        class="w-1/6 px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-400 bg-gray-100 cursor-pointer">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($voters as $voter)
                                    <tr>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ __($voter->name) }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ __($voter->code) }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-gray-100 border-b border-l border-gray-200">
                                            <div class="flex flex-col space-y-2">
                                                <button wire:click="requestUpdate({{ $voter }})"
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
                                                <button wire:click='requestDelete({{ $voter }})'
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
                            {{ $voters->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
