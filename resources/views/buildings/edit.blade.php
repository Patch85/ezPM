<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __("Edit Building $building->building_number") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form action="{{ route('buildings.update', $building) }}" method="post">
                @method('PUT')
                @csrf

                <x-form.input type="text" name="building_number" class="mt-1 w-full" required autofocus
                    :value="old('building_number', $building->building_number)" :labelValue="__('Building Number')" />

                <x-form.input type="text" name="address" class="w-full" :value="old('address', $building->address)" />

                <x-form.input type="text" name="description" class="w-full" :value="old('description', $building->description)" />

                <x-form.input type="number" name="floors" class="w-full" required :value="old('floors', $building->floors)" />

                <x-form.field class="w-full">

                    <x-form.label for="status" id="status-label" labelValue="Status" />

                    <select name="status" id="status" :value="old('status')"
                        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                        <option value="To Do" {{ old('status', $building->status) == 'To Do' ? 'selected' : '' }}>To Do
                        </option>
                        <option value="In Progress"
                            {{ old('status', $building->status) == 'In Progress' ? 'selected' : '' }}>In Progress
                        </option>
                        <option value="Complete" {{ old('status', $building->status) == 'Complete' ? 'selected' : '' }}>
                            Complete</option>
                    </select>

                </x-form.field>

                <div class="mt-4">
                    <x-primary-button>Submit</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
