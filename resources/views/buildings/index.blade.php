<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Buildings Overview') }}
        </h2>
    </x-slot>

    <div class="ml-12 mt-4">
        <a href="{{ route('buildings.create') }}">
            <x-primary-button>Add a Building</x-primary-button>
        </a>
    </div>

    <x-content-panel class="m-4 flex justify-center py-4">
        <x-table.table>
            <x-slot name="thead">
                <x-table.tr>
                    <x-table.th>{{ __('Building') }}</x-table.th>

                    <x-table.th>{{ __('Description') }}</x-table.th>

                    <x-table.th>{{ __('Status') }}</x-table.th>
                </x-table.tr>
            </x-slot>

            <x-slot name="tbody">
                @foreach ($buildings as $building)
                    <x-table.tr class="odd:bg-slate-100 even:bg-white hover:bg-indigo-300">

                        <x-table.td class="text-right text-indigo-500 hover:text-indigo-700">
                            <a href="{{ route('buildings.show', $building) }}">
                                {{ __($building->building_number) }}
                            </a>
                        </x-table.td>

                        <x-table.td class="text-left">{{ __($building->description) }}</x-table.td>

                        <x-table.td class="text-left">{{ __($building->status) }}</x-table.td>

                    </x-table.tr>
                @endforeach
            </x-slot>
        </x-table.table>
    </x-content-panel>
</x-app-layout>
