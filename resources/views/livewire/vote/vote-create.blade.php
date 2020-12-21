    @push('styles')
        <style>
            [x-cloak] {
                display: none;
            }

        </style>
    @endpush
    <x-jet-dialog-modal wire:model="creating" :maxWidth="'full'">
        <x-slot name="title">{{ __('Add Vote Form') }}</x-slot>
        <x-slot name="content">
            <div class="overflow-x-hidden overflow-y-scroll" style="height: 70vh;">
                <form wire:submit.prevent="__save">
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="voteName">
                                Vote Name
                            </label>
                            <input wire:model="voteName" autocomplete="off"
                                class="block w-full px-4 py-3 leading-tight border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="voteName" type="text" placeholder="Pemilihan Pegawai Teladan 2020">
                            <p class="text-xs italic text-gray-600">Vote Name
                            </p>
                            @error('voteName') <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-2 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="datepicker">
                                Start Date
                            </label>
                            <div class="antialiased sans-serif">
                                <div x-data="{
                    showDatepicker: false,
                    datepickerValue: '',

                    month: '',
                    year: '',
                    no_of_days: [],
                    blankdays: [],
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                    initDate() {
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                    },

                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);

                        return today.toDateString() === d.toDateString() ? true : false;
                    },

                    getDateValue(date) {
                        let selectedDate = new Date(this.year, this.month, date);
                        this.datepickerValue = selectedDate.toDateString();

                        console.log(selectedDate);
                        let _month = 1+selectedDate.getMonth()

                        this.$refs.date.value = selectedDate.getFullYear() + '-' + ('0' + _month).slice(-
                            2) + '-' + ('0' + selectedDate.getDate()).slice(-2);

                        console.log(this.$refs.date.value);
                        @this.set('startDate',this.$refs.date.value);

                        this.showDatepicker = false;
                    },

                    getNoOfDays() {
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                        // find where to start calendar day of week
                        let dayOfWeek = new Date(this.year, this.month).getDay();
                        let blankdaysArray = [];
                        for (var i = 1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }

                        let daysArray = [];
                        for (var i = 1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }

                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    }
                }" x-init="[initDate(), getNoOfDays()]" x-cloak>
                                    <div class="container px-1 py-2 mx-auto md:py-1">
                                        <div class="w-64 mb-5">
                                            <div class="relative">
                                                <input type="hidden" wire:model="startDate" name="startDate"
                                                    x-ref="date">
                                                <input type="text" readonly x-model="datepickerValue"
                                                    @click="showDatepicker = !showDatepicker"
                                                    @keydown.escape="showDatepicker = false"
                                                    class="w-full py-3 pl-4 pr-10 font-medium leading-none text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                                                    placeholder="Select date">

                                                <div class="absolute top-0 right-0 px-3 py-2">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>

                                                <div class="absolute top-0 left-0 z-50 p-4 mt-12 bg-white rounded-lg shadow"
                                                    style="width: 17rem" x-show.transition="showDatepicker"
                                                    @click.away="showDatepicker = false">

                                                    <div class="flex items-center justify-between mb-2">
                                                        <div>
                                                            <span x-text="MONTH_NAMES[month]"
                                                                class="text-lg font-bold text-gray-800"></span>
                                                            <span x-text="year"
                                                                class="ml-1 text-lg font-normal text-gray-600"></span>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer hover:bg-gray-200"
                                                                @click="if(month == 0) {month=11;  year--} else {month--}; getNoOfDays()">
                                                                <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M15 19l-7-7 7-7" />
                                                                </svg>
                                                            </button>
                                                            <button type="button"
                                                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer hover:bg-gray-200"
                                                                @click="if (month == 11) {month=0; year++} else {month++}; getNoOfDays()">
                                                                <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-wrap mb-3 -mx-1">
                                                        <template x-for="(day, index) in DAYS" :key="index">
                                                            <div style="width: 14.26%" class="px-1">
                                                                <div x-text="day"
                                                                    class="text-xs font-medium text-center text-gray-800">
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>

                                                    <div class="flex flex-wrap -mx-1">
                                                        <template x-for="blankday in blankdays">
                                                            <div style="width: 14.28%"
                                                                class="p-1 text-sm text-center border border-transparent">
                                                            </div>
                                                        </template>
                                                        <template x-for="(date, dateIndex) in no_of_days"
                                                            :key="dateIndex">
                                                            <div style="width: 14.28%" class="px-1 mb-1">
                                                                <div @click="getDateValue(date)" x-text="date"
                                                                    class="text-sm leading-none leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                                    :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @error('startDate') <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-2 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="datepicker">
                                End Date
                            </label>
                            <div class="antialiased sans-serif">
                                <div x-data="{
                    showDatepicker: false,
                    datepickerValue: '',

                    month: '',
                    year: '',
                    no_of_days: [],
                    blankdays: [],
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                    initDate() {
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                    },

                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);

                        return today.toDateString() === d.toDateString() ? true : false;
                    },

                    getDateValue(date) {
                        console.log(date)
                        let selectedDate = new Date(this.year, this.month, date);
                        this.datepickerValue = selectedDate.toDateString();
                        let _month = 1 + selectedDate.getMonth()

                        this.$refs.date.value = selectedDate.getFullYear() + '-' + ('0' + _month).slice(-
                            2) + '-' + ('0' + selectedDate.getDate()).slice(-2);
                        @this.set('endDate',this.$refs.date.value);
                        console.log(this.$refs.date.value);

                        this.showDatepicker = false;
                    },

                    getNoOfDays() {
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                        // find where to start calendar day of week
                        let dayOfWeek = new Date(this.year, this.month).getDay();
                        let blankdaysArray = [];
                        for (var i = 1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }

                        let daysArray = [];
                        for (var i = 1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }

                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    }
                }" x-init="[initDate(), getNoOfDays()]" x-cloak>
                                    <div class="container px-1 py-2 mx-auto md:py-1">
                                        <div class="w-64 mb-5">
                                            <div class="relative">
                                                <input type="hidden" name="endDate" wire:model="endDate" x-ref="date">
                                                <input type="text" readonly x-model="datepickerValue"
                                                    @click="showDatepicker = !showDatepicker"
                                                    @keydown.escape="showDatepicker = false"
                                                    class="w-full py-3 pl-4 pr-10 font-medium leading-none text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                                                    placeholder="Select date">

                                                <div class="absolute top-0 right-0 px-3 py-2">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>

                                                <div class="absolute top-0 left-0 z-50 p-4 mt-12 bg-white rounded-lg shadow"
                                                    style="width: 17rem" x-show.transition="showDatepicker"
                                                    @click.away="showDatepicker = false">

                                                    <div class="flex items-center justify-between mb-2">
                                                        <div>
                                                            <span x-text="MONTH_NAMES[month]"
                                                                class="text-lg font-bold text-gray-800"></span>
                                                            <span x-text="year"
                                                                class="ml-1 text-lg font-normal text-gray-600"></span>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer hover:bg-gray-200"
                                                                @click="if(month == 0) {month=11;  year--} else {month--}; getNoOfDays()">
                                                                <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M15 19l-7-7 7-7" />
                                                                </svg>
                                                            </button>
                                                            <button type="button"
                                                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer hover:bg-gray-200"
                                                                @click="if (month == 11) {month=0; year++} else {month++}; getNoOfDays()">
                                                                <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-wrap mb-3 -mx-1">
                                                        <template x-for="(day, index) in DAYS" :key="index">
                                                            <div style="width: 14.26%" class="px-1">
                                                                <div x-text="day"
                                                                    class="text-xs font-medium text-center text-gray-800">
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>

                                                    <div class="flex flex-wrap -mx-1">
                                                        <template x-for="blankday in blankdays">
                                                            <div style="width: 14.28%"
                                                                class="p-1 text-sm text-center border border-transparent">
                                                            </div>
                                                        </template>
                                                        <template x-for="(date, dateIndex) in no_of_days"
                                                            :key="dateIndex">
                                                            <div style="width: 14.28%" class="px-1 mb-1">
                                                                <div @click="getDateValue(date)" x-text="date"
                                                                    class="text-sm leading-none leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                                    :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            @error('startDate') <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('creating')" type="reset">
                Batal</x-jet-secondary-button>
            <x-jet-button type="submit">Simpan</x-jet-button>
            </form>
        </x-slot>
    </x-jet-dialog-modal>
    @push('scripts')
        <script>
            const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        </script>
    @endpush
