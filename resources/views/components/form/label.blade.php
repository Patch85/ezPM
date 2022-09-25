@props(['labelValue'])

<label {{ $attributes->merge(['class' => 'medium mb-2 block text-sm text-gray-700']) }}>
    {{ $labelValue }}
</label>
