<x-app-layout title="Equipment - {{ $equipment->name }}">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __($heading) }}
        </h2>
    </x-slot>

    <x-content-panel class="m-4 flex py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form action="{{ $route }}" method="post">

                @if ($equipment?->name)
                    @method('PUT')
                @endif

                @csrf

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                    <x-form.input type="text" name="name" class="w-full" placeholder="FCU_01_N" required autofocus
                        :value="old('name', $equipment?->name)" />

                    <x-form.select name="type" class="w-full" :labelValue="__('Unit Type')">
                        <option value="" disabled {{ empty(old('type', $equipment?->type)) ? 'selected' : '' }}>
                            Select an Equipment Type
                        </option>

                        @foreach ($equipmentTypes as $equipmentType)
                            <option value="{{ $equipmentType }}"
                                {{ old('type', $equipment?->type) == $equipmentType ? 'selected' : '' }}>
                                {{ $equipmentType }}
                            </option>
                        @endforeach
                    </x-form.select>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                    <x-form.select name="building_id" :labelValue="__('Building Number')">

                        <option value=""
                            {{ empty(old('building_id', $equipment?->building?->id ? 'selected' : '')) }} disabled>
                            Select a Building
                        </option>

                        @foreach ($buildings as $building)
                            <option value="{{ $building->id }}"
                                {{ old('building_id', $equipment->building?->id) == $building->id ? 'selected' : '' }}>
                                {{ $building->building_number }}
                            </option>
                        @endforeach

                    </x-form.select>

                    <x-form.input type="text" name="floor" class="w-full" :value="old('floor', $equipment?->floor)" placeholder="2" />

                    <x-form.input type="text" name="room_number" class="w-full" :value="old('room_number', $equipment?->room_number)" :labelValue="__('Room Number')"
                        placeholder="245B" />
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                    <x-form.select name="functional_status" class=w-full :labelValue="__('Condition')">

                        <option value="" disabled
                            {{ empty(old('functional_status', $equipment?->functional_status)) ? 'selected' : '' }}>
                            Select a status that best describes the equipment's condition
                        </option>

                        @foreach ($functionalStatuses as $functionalStatus)
                            <option value="{{ $functionalStatus }}"
                                {{ old('functional_status', $equipment?->functional_status) == $functionalStatus ? 'selected' : '' }}>
                                {{ $functionalStatus }}
                            </option>
                        @endforeach

                    </x-form.select>

                    <x-form.select name="pm_status" class=w-full :labelValue="__('PM Status')">

                        <option value="" disabled
                            {{ empty(old('pm_status', $equipment?->pm_status)) ? 'selected' : '' }}>
                            Select a PM status
                        </option>

                        @foreach ($pmStatuses as $pmStatus)
                            <option value="{{ $pmStatus }}"
                                {{ old('pm_status', $equipment?->pm_status) == $pmStatus ? 'selected' : '' }}>
                                {{ $pmStatus }}
                            </option>
                        @endforeach

                    </x-form.select>
                </div>

                <x-form.textarea name="description" class="w-full" maxlength="500">
                    {{ old('description', $equipment?->description) }}
                </x-form.textarea>

                <div class="mt-4">
                    <x-primary-button>Submit</x-primary-button>
                </div>

            </form>

        </div>

    </x-content-panel>

</x-app-layout>
