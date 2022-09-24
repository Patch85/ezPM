<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Buildings Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="text-md font-semibold">
                            {{ __('Building Number') }}
                        </th>

                        <th class="text-md font-semibold">
                            {{ __('Description') }}
                        </th>

                        <th class="text-md font-semibold">
                            {{ __('Status') }}
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($buildings as $building)
                        <tr class="text-center text-slate-800 odd:bg-slate-100 even:bg-white hover:bg-indigo-300">
                            <td class="hover:text-indigo-700">
                                <a
                                    href="{{ route('buildings.show', $building) }}">{{ __($building->building_number) }}</a>
                            </td>
                            <td>{{ __($building->description) }}</td>
                            <td>{{ __($building->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mx-auto mt-8 max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('buildings.create') }}" class="">
                <x-primary-button>
                    Add a Building
                </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>