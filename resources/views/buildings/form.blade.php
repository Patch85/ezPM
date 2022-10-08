<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __($heading) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form action="{{ $route }}" method="post">

                @if ($building?->building_number)
                    @method('PUT')
                @endif

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">

                    <x-form.input type="text" name="building_number" class="w-full" required autofocus :value="old('building_number', $building?->building_number)"
                        :labelValue="__('Building Number')" />

                    <x-form.input type="number" name="floors" class="w-full" required :value="old('floors', $building?->floors)" />

                    <x-form.select name="status">

                        @foreach ($building?->statuses as $status)
                            <option value="{{ $status }}"
                                {{ old('status', $building?->status) == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach

                    </x-form.select>
                </div>

                <x-form.input type="text" name="address" class="w-full" :value="old('address', $building?->address)" />

                <x-form.textarea name="description" class="w-full" maxlength="500">
                    {{ old('description', $building?->description) }}
                </x-form.textarea>

                <div class="mt-4">
                    <x-primary-button>Submit</x-primary-button>
                </div>
            </form>

            @if ($building?->building_number)
                <form action="{{ route('buildings.destroy', ['building' => $building]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-primary-button type="submit" class="mt-4 text-red-500 hover:text-red-600">
                        Delete
                    </x-primary-button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
