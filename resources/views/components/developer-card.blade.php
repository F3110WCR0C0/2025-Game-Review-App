@props(['first_name', 'last_name','company', 'bio', 'image'])

<div class="flex items-center border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <img src="{{ asset('images/developers/' . $image) }}" 
         alt="{{ $first_name }}" 
         class="w-24 h-24 object-cover rounded-lg flex-shrink-0">

    <div class="flex flex-col px-4">
        <div class="flex space-x-2">
            <h1 class="font-bold text-lg">{{ $first_name }}</h1>
            <h2 class="font-bold text-lg">{{ $last_name }}</h2>
        </div>
    </div>
</div>