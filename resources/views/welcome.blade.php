<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-600">
            {{ __('Welcome to ezPM') }}
        </h2>
    </x-slot>


    <div class="items-top relative flex min-h-screen justify-center bg-gray-100 py-4 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif


        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-3 grid-rows-1 gap-y-4 lg:gap-x-4">

                    <x-card>
                        <x-slot name="title">{{ __('Up to Date') }}</x-slot>

                        <x-slot name="content">
                            <p>Always have access to the most up-to date PM and CM data. Who is working where, on what?
                                What problems have been encountered? Are they new or persistent from previous seasons?
                            </p>
                        </x-slot>
                    </x-card>

                    <x-card>
                        <x-slot name="title">{{ __('In Sync') }}</x-slot>

                        <x-slot name="content">
                            <p>When multiple people are sharing and editing a single file, it's practiclly guaranteed
                                that somebody will have made changes that make other copies obsolete or incorrect. Since
                                ezPM operates from a central database, changes made by operators in the field or during
                                supervisor review are synchronized and available ASAP</p>
                        </x-slot>
                    </x-card>

                    <x-card>
                        <x-slot name="title">{{ __('Offline-First') }}</x-slot>

                        <x-slot name="content">
                            <p>Since operators are frequently working without access to the internet, ezPM stores
                                offline changes locally and uploads the new data to the central database when internet
                                access is available. This ensures work continues in any environment while keeping data
                                in sync as much as possible.</p>
                        </x-slot>
                    </x-card>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
