<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Current Building') }}: 950 (USMAPS)
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="mx-auto grid max-w-fit grid-cols-3 grid-rows-1 gap-y-4 lg:gap-x-4">
            <x-card>
                <x-slot name='title'>{{ __('In Progress') }}</x-slot>
                <x-slot name='content'>
                    <x-table.table class="!m-0">
                        <x-slot name="thead">
                            <x-table.tr>
                                <x-table.th>{{ __('Building') }}</x-table.th>
                                <x-table.th>{{ __('Room') }}</x-table.th>
                                <x-table.th>{{ __('Unit') }}</x-table.th>
                            </x-table.tr>
                        </x-slot>

                        <x-slot name="tbody">
                            @for ($i = 10; $i < 21; $i++)
                                <x-table.tr class="odd:bg-slate-100 even:bg-white hover:bg-indigo-300">
                                    <x-table.td>950</x-table.td>
                                    <x-table.td>{{ 310 + $i }}</x-table.td>
                                    <x-table.td>A342_FC{{ $i }}_N</x-table.td>
                                </x-table.tr>
                            @endfor
                        </x-slot>
                    </x-table.table>
                </x-slot>
            </x-card>

            <x-card>
                <x-slot name='title'>{{ __('Inaccessible Rooms') }}</x-slot>
                <x-slot name='content'>
                    <x-table.table class="!m-0">
                        <x-slot name='thead'>
                            <x-table.tr>
                                <x-table.th>{{ __('Building') }}</x-table.th>
                                <x-table.th>{{ __('Floor') }}</x-table.th>
                                <x-table.th>{{ __('Room') }}</x-table.th>
                                <x-table.th>{{ __('Reason') }}</x-table.th>
                            </x-table.tr>
                        </x-slot>

                        <x-slot name='tbody'>
                            @for ($i = 0; $i < 8; $i++)
                                <x-table.tr class="odd:bg-slate-100 even:bg-white hover:bg-indigo-300">
                                    <x-table.td class="!px-7">950</x-table.td>
                                    <x-table.td class="!px-7">3</x-table.td>
                                    <x-table.td class="!px-7">{{ ((8 * $i + 3) % 11) + 1 }}</x-table.td>
                                    <x-table.td class="!px-7"> {{ $i % 3 == 1 ? 'Locked' : 'Occupied' }}</x-table.td>
                                </x-table.tr>
                            @endfor
                        </x-slot>
                    </x-table.table>
                </x-slot>
            </x-card>

            <x-card>
                <x-slot name='title'>{{ __('Completed PM') }}</x-slot>
                <x-slot name='content'>

                    <x-table.table class="!m-0">
                        <x-slot name="thead">
                            <x-table.tr>
                                <x-table.th>{{ __('Building') }}</x-table.th>
                                <x-table.th>{{ __('Room') }}</x-table.th>
                                <x-table.th>{{ __('Unit') }}</x-table.th>
                            </x-table.tr>
                        </x-slot>

                        <x-slot name="tbody">
                            @for ($i = 10; $i < 21; $i++)
                                <x-table.tr class="odd:bg-slate-100 even:bg-white hover:bg-indigo-300">
                                    <x-table.td>950</x-table.td>
                                    <x-table.td>{{ 310 - $i }}</x-table.td>
                                    <x-table.td>A342_FC{{ $i }}_S</x-table.td>
                                </x-table.tr>
                            @endfor
                        </x-slot>
                    </x-table.table>
                </x-slot>
            </x-card>
        </div>
    </div>
</x-app-layout>
