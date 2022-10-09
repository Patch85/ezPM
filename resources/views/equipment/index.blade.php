<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('All Equipment') }}
        </h2>
    </x-slot>

    <div class="ml-12 mt-4">
        <a href="{{ route('equipment.create') }}">
            <x-primary-button>Add Equipment</x-primary-button>
        </a>
    </div>

    <x-content-panel class="m-4 flex justify-center py-4">

        <x-table.table>
            <x-slot name="thead">
                <x-table.tr>
                    <x-table.th> {{ __('Building') }} </x-table.th>

                    <x-table.th> {{ __('Floor') }} </x-table.th>

                    <x-table.th> {{ __('Room') }} </x-table.th>

                    <x-table.th> {{ __('Type') }} </x-table.th>

                    <x-table.th class="pl-8 text-left"> {{ __('Name') }} </x-table.th>
                </x-table.tr>
            </x-slot>

            <x-slot name="tbody">
                @foreach ($equipment as $unit)
                    <x-table.tr class="odd:bg-slate-100 even:bg-white hover:bg-indigo-300">

                        <x-table.td class="text-right">
                            {{ __($unit->building?->building_number) }}
                        </x-table.td>

                        <x-table.td class="text-right"> {{ __($unit->floor) }}</x-table.td>

                        <x-table.td class="text-right"> {{ __($unit->room_number) }}</x-table.td>

                        <x-table.td> {{ __($unit->type) }}</x-table.td>

                        <x-table.td class="text-left text-indigo-500 hover:text-indigo-700">
                            <a href="{{ route('equipment.show', $unit) }}">
                                {{ __($unit->name) }}
                            </a>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-slot>
        </x-table.table>
    </x-content-panel>

    </div>
</x-app-layout>
