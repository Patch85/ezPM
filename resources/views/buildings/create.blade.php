<x-app-layout title="Buildings">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Add a New Building') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form action="/buildings/new" method="post">
                @csrf

                <div>
                    <x-input-label for="building_number" :value="__('Building Number')" />

                    <x-text-input id="building_number" class="mt-1 block w-full" type="text" name="building_number"
                        :value="old('building_number')" placeholder="123 N" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="address" :value="__('Address')" />

                    <x-text-input id="address" class="mt-1 block w-full" type="text" name="address"
                        :value="old('address')" placeholder="456 Street Rd" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />

                    <x-text-input id="description" class="mt-1 block w-full" type="text" name="description"
                        :value="old('description')" placeholder="Cadet Housing" />
                </div>

                <div class="mt-4">
                    <x-input-label for="floors" :value="__('Floors')" />

                    <x-text-input id="floors" class="mt-1 block w-full" type="number" name="floors"
                        :value="old('floors')" placeholder="1" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="status" :value="__('Status')" />

                    <select name="status" id="status" :value="old('status')"
                        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                        <option value="To Do" selected>To Do</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Complete">Complete</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-primary-button>Submit</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
