@props(['title', 'content'])

<div
    class="group col-span-3 w-full border-b border-gray-200 bg-white p-6 shadow-sm hover:shadow-indigo-400 sm:rounded-lg lg:col-span-1">

    <h4 class="text-center text-lg font-semibold text-slate-700 group-hover:font-bold group-hover:text-indigo-600">
        {{ $title }}</h4>

    <div>
        {{ $content }}
    </div>
</div>
