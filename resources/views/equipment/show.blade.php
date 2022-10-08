<x-app-layout title="Equipment">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Equipment Details') }}
        </h2>

        @if ($buildingNumber = $equipment->building?->building_number)
            <h3 class="text-lg font-semibold text-slate-600">
                Building {{ $buildingNumber }}
            </h3>
        @endif

        <h4 class="text-md font-semibold text-slate-600">
            Floor {{ $equipment->floor }} :
            Room {{ $equipment->room_number }}
        </h4>
    </x-slot>

    <x-content-panel class="m-4 py-4">
        <div class="flex justify-evenly">
            <p class="text-lg font-semibold text-slate-600">
                <strong>Name</strong> <br>
                {{ $equipment->name }}
            </p>

            <p class="text-lg font-semibold text-slate-600">
                <strong>Type</strong> <br>
                {{ $equipment->type }}
            </p>

            <p class="text-lg font-semibold text-slate-600">
                <strong>PM</strong> <br>
                {{ $equipment->pm_status }}
            </p>

            <p class="text-lg font-semibold text-slate-600">
                <strong>Condition</strong> <br>
                {{ $equipment->functional_status }}
            </p>
        </div>

        <p class="mt-2 text-sm font-normal">
            <strong class="underline">Description</strong> <br>
            {{ $equipment->description }}
        </p>

        <div class="mt-4 mr-4 flex justify-end">
            <a href="{{ route('equipment.edit', $equipment) }}">
                <x-primary-button>
                    Edit
                </x-primary-button>
            </a>
        </div>
    </x-content-panel>
</x-app-layout>
