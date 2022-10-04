<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Building Details') }}
        </h2>
    </x-slot>

    <x-content-panel class="m-4 py-4">
        <div>
            <h3 class="text-lg font-semibold text-slate-600">Building {{ $building->building_number }} -
                <em>{{ $building->status }}</em>
            </h3>

            <p class="mt-2 text-sm font-normal">{{ $building->address }}</p>

            <h4 class="text-md mt-2 font-medium text-slate-500">{{ $building->description }}</h4>

            <p class="text-md mt-2 font-medium">Floors: {{ $building->floors }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('buildings.edit', $building) }}">
                <x-primary-button>
                    Edit
                </x-primary-button>
            </a>
        </div>
    </x-content-panel>

    <x-content-panel class="flex justify-center">

        <table class="m-4 table-auto border-b border-gray-200 bg-gray-50 p-4 shadow-sm sm:rounded-lg md:w-4/5">
            <thead>
                <tr>
                    <th class="text-md font-semibold">
                        {{ __('Floor') }}
                    </th>

                    <th class="text-md font-semibold">
                        {{ __('Room Number') }}
                    </th>

                    <th class="text-md font-semibold">
                        {{ __('Name') }}
                    </th>

                    <th class="text-md font-semibold">
                        {{ __('Type') }}
                    </th>

                    <th class="text-md font-semibold">
                        {{ __('PM Status') }}
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($building->equipment as $equipment)
                    <tr class="text-center text-slate-800 odd:bg-slate-100 even:bg-white hover:bg-indigo-300">

                        <td>{{ __($equipment->floor) }}</td>

                        <td>{{ __($equipment->room_number) }}</td>

                        <td class="text-indigo-500 hover:text-indigo-700">
                            <a href="{{ route('equipment.show', $equipment) }}">
                                {{ __($equipment->name) }}
                            </a>
                        </td>

                        <td>{{ __($equipment->type) }}</td>

                        <td>{{ __($equipment->pm_status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-content-panel>
</x-app-layout>
