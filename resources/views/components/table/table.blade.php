<table
    {{ $attributes->merge([
        'class' => 'm-4 table-auto border-b border-gray-200 bg-gray-50 p-4 shadow-sm sm:rounded-lg',
    ]) }}>

    <thead>
        {{ $thead }}
    </thead>

    <tbody>
        {{ $tbody }}
    </tbody>

</table>
