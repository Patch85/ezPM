@props(['name', 'id' => strtolower($name), 'labelValue' => ucwords($name), 'disabled' => false])

<x-form.field>

    <x-form.label for="{{ $name }}" id="{{ $id }}-label" labelValue="{{ $labelValue }}" />

    <input name={{ $name }} id="{{ $id }}-input" {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
            'class' =>
                'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            'value' => old($name),
        ]) !!}>

    <x-form.error name="{{ $name }}" />

</x-form.field>
