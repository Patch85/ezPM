<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Current Building') }}: 950 (USMAPS)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 grid-rows-1 gap-y-4 lg:gap-x-4">
                <x-card>
                    <x-slot name='title'>{{ __('In Progress') }}</x-slot>
                    <x-slot name='content'>
                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="text-md font-semibold">{{ __('Building') }}</th>
                                    <th class="text-md font-semibold">{{ __('Room') }}</th>
                                    <th class="text-md font-semibold">{{ __('Unit') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                </tr>
                            </tbody>
                        </table>
                    </x-slot>
                </x-card>

                <x-card>
                    <x-slot name='title'>{{ __('Inaccessible Rooms') }}</x-slot>
                    <x-slot name='content'>
                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="text-md font-semibold">{{ __('Building') }}</th>
                                    <th class="text-md font-semibold">{{ __('Floor') }}</th>
                                    <th class="text-md font-semibold">{{ __('Room') }}</th>
                                    <th class="text-md font-semibold">{{ __('Reason') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>3</td>
                                    <td>324</td>
                                    <td>Locked</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>3</td>
                                    <td>354</td>
                                    <td>Occupied</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>3</td>
                                    <td>325</td>
                                    <td>Occupied</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>2</td>
                                    <td>204</td>
                                    <td>Locked</td>
                                </tr>
                            </tbody>
                        </table>
                    </x-slot>
                </x-card>

                <x-card>
                    <x-slot name='title'>{{ __('Completed PMs') }}</x-slot>
                    <x-slot name='content'>
                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="text-md font-semibold">{{ __('Building') }}</th>
                                    <th class="text-md font-semibold">{{ __('Room') }}</th>
                                    <th class="text-md font-semibold">{{ __('Unit') }}</th>
                                    <th class="text-md font-semibold">{{ __('Date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC8</td>
                                    <td>{{ date('m/d/Y') }}</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>304</td>
                                    <td>A324_FC14_N</td>
                                    <td>{{ date('m/d/Y') }}</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>304</td>
                                    <td>A324_FC14_S</td>
                                    <td>{{ date('m/d/Y') }}</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                    <td>{{ date('m/d/Y') }}</td>
                                </tr>

                                <tr class="text-center odd:bg-slate-100 even:bg-white">
                                    <td>950</td>
                                    <td>324</td>
                                    <td>A324_FC14_N</td>
                                    <td>{{ date('m/d/Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </x-slot>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
