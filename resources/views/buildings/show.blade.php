<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Building Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <h3 class="text-lg font-semibold text-slate-600">Building {{ $building->building_number }} -
                <em>{{ $building->status }}</em>
            </h3>

            <p class="mt-2 text-sm font-normal">{{ $building->address }}</p>

            <h4 class="text-md mt-2 font-medium text-slate-500">{{ $building->description }}</h4>

            <p class="text-md mt-2 font-medium">Floors: {{ $building->floors }}</p>

            <div class="mt-4">
                <a href="{{ route('buildings.edit', $building) }}">
                    <x-primary-button>
                        Edit
                    </x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
