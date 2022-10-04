<div
    {{ $attributes->merge([
        'class' =>
            'mx-auto w-full max-w-7xl border-b border-gray-200 bg-white p-6 shadow-sm hover:shadow-indigo-400 sm:rounded-lg lg:px-8',
    ]) }}>

    {{ $slot }}

</div>
