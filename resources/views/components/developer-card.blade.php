@props(['first_name', 'last_name','company'])

<div class=" flex border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <div class="relative inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full dark:bg-gray-600">
        <span class="font-medium text-gray-600 dark:text-gray-300">{{ strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1)) }}</span>
    </div>
    <div class="flex flex-col px-10">
        <div class="flex space-x-2">
            <h1 class="font-bold text-lg">{{ $first_name }}</h1>
            <h2 class="font-bold text-lg">{{ $last_name }}</h2>
        </div>
        <h3 class="font-bold text-lg">{{ $company }}</h3>
    </div>
</div>

