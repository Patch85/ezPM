@props(['name', 'id' => strtolower($name), 'labelValue' => ucwords($name), 'disabled' => false])

<x-form.field>

    <x-form.label for="{{ $name }}" id="{{ $id }}-label" labelValue="{{ $labelValue }}" />

    <textarea name={{ $name }} id="{{ $id }}-textarea" {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
            'class' =>
                'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
        ]) !!}>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />

</x-form.field>
