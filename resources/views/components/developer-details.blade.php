@props(['first_name', 'last_name', 'company', ])

<div class="border flex rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 my-10 ">

    <div class="px-10 flex">
        <div class="relative inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full dark:bg-gray-600 mr-5">
            <span class="font-medium text-gray-600 dark:text-gray-300">{{ strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1)) }}</span>
        </div>

        <div class="flex flex-col">
            <h1 class="font-bold text-lg">{{ $first_name }}</h1>
            <h1 class="font-bold text-lg">{{ $last_name }}</h1>
            <p class="font-bold text-lg">Company: <span class="text-slate-600">{{ $company }}</span></p>
        </div>


    </div>

</div>

