<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('All Equipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="mx-auto flex w-full max-w-7xl justify-center border-b border-gray-200 bg-white p-6 shadow-sm hover:shadow-indigo-400 sm:rounded-lg lg:px-8">

            <table class="m-4 table-auto border-b border-gray-200 bg-gray-50 p-4 shadow-sm sm:rounded-lg md:w-4/5">
                <thead>
                    <tr>
                        <th class="text-md font-semibold">
                            {{ __('Building Number') }}
                        </th>

                        <th class="text-md font-semibold">
                            {{ __('Floor') }}
                        </th>

                        <th class="text-md font-semibold">
                            {{ __('Room_Number') }}
                        </th>

                        <th class="text-md font-semibold">
                            {{ __('Type') }}
                        </th>

                        <th class="text-md font-semibold">
                            {{ __('Name') }}
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($equipment as $unit)
                        <tr class="text-center text-slate-800 odd:bg-slate-100 even:bg-white hover:bg-indigo-300">

                            <td>{{ __($unit->building?->building_number) }}</td>

                            <td>{{ __($unit->floor) }}</td>

                            <td>{{ __($unit->room_number) }}</td>

                            <td>{{ __($unit->type) }}</td>

                            <td class="text-indigo-500 hover:text-indigo-700">
                                <a href="{{ route('equipment.show', $unit) }}">
                                    {{ __($unit->name) }}
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
