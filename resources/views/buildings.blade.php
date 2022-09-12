<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Buildings Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div>
                <form action="{{ route('buildings') }}" method="get">
                    <div>
                        <x-input-label for="buildingNumber" :value="__('Building Number')" />

                        <x-text-input id="buildingNumber" class="mt-1 w-full" type="text" name="buildingNumber"
                            :value="old('buildingNumber')" placeholder="950" required autofocus />
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
