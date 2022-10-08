@props(['name', 'id' => strtolower($name), 'labelValue' => ucwords($name), 'disabled' => false])

<x-form.field>

    <x-form.label for="{{ $name }}" id="{{ $id }}-label" labelValue="{{ $labelValue }}" />

    <select name="{{ $name }}" id="{{ $name }}-select" :value="old('{{ $name }}')"
        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        required>

        {{ $slot }}

    </select>

    <x-form.error name="{{ $name }}" />

</x-form.field>
