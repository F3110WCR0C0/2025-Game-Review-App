@props(['first_name', 'last_name', 'company', 'bio', 'image' ])

<div class="border flex rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 my-10 ">

    <div class="px-10 flex">
    <img 
        src="{{ asset('images/developers/' . $image) }}" 
        alt="{{ $first_name }}"
        class="h-64 w-64 object-cover rounded-md"
    />
        <div class="flex flex-col px-2">
            <h1 class="font-bold text-lg">{{ $first_name }}</h1>
            <h1 class="font-bold text-lg">{{ $last_name }}</h1>
            <p class="font-bold text-lg">Company: <span class="text-slate-600">{{ $company }}</span></p>
            <p class="font-bold text-lg">Bio: <span class="text-slate-600">{{ $bio }}</span></p>
        </div>


    </div>

</div>

