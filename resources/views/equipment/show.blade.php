<x-app-layout title="Equipment">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Equipment Details') }}
        </h2>
    </x-slot>

    <x-content-panel class="m-4 py-4">
        <h3 class="text-lg font-semibold text-slate-600">
            {{ $equipment->name }} - <em>{{ $equipment->pm_status }}</em> - <strong>{{ $equipment->type }}</strong>
        </h3>

        <h4 class="text-md font-semibold text-slate-600">
            Floor {{ $equipment->floor }} :
            Room {{ $equipment->room_number }}
        </h4>

        <p class="text-bold text-sm uppercase">{{ $equipment->functional_status }}</p>

        <p class="mt-2 text-sm font-normal">{{ $equipment->description }}</p>
    </x-content-panel>
</x-app-layout>
