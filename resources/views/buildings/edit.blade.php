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

                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                    <x-form.input type="text" name="building_number" class="w-full" required autofocus :value="old('building_number', $building->building_number)"
                        :labelValue="__('Building Number')" />

                    <x-form.input type="number" name="floors" class="w-full" required :value="old('floors', $building->floors)" />

                    <x-form.field class="w-full">

                        <x-form.label for="status" id="status-label" labelValue="Status" />

                        <select name="status" id="status-select" :value="old('status')"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            required>

                            @foreach ($building->statuses as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $building->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </x-form.field>
                </div>

                <x-form.input type="text" name="address" class="w-full" :value="old('address', $building->address)" />

                <x-form.textarea type="text" name="description" class="w-full" maxlength="500">
                    {{ old('description', $building->description) }}
                </x-form.textarea>

                <div class="mt-4">
                    <x-primary-button>Submit</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
