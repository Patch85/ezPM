@props(['title', 'content'])

<div class=" group col-span-3 lg:col-span-1 w-full border-b border-gray-200 bg-white p-6 shadow-sm hover:shadow-blue-400 sm:rounded-lg">

    <h4 class="text-center text-lg font-semibold text-slate-700 group-hover:text-blue-700 group-hover:font-bold">{{ $title }}</h4>

    <div>
        {{ $content }}
    </div>
</div>
