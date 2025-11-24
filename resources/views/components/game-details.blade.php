@props(['name', 'release_date', 'description', 'age_rating', 'price', 'discount', 'image'])

<div class="border flex rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 my-10 ">
    <img 
        src="{{ asset('images/games/' . $image) }}" 
        alt="{{ $name }}"
        class="h-full w-auto object-cover rounded-md"
    />
    <div class="px-10">
        <h1 class="font-bold text-lg">{{ $name }}</h1>
        <p class="font-bold text-lg">Release Date: <span class="text-slate-600">{{ $release_date }}</span></p>
        <p class="font-bold text-lg">Age Rating: <span class="text-slate-600">{{ $age_rating }}</span></p>
        <p class="font-bold text-lg max-w-50">Description: <span class="text-slate-600">{{ $description }}</span></p>
        <div class="flex items-center space-x-2">
            <button class="font-bold text-lg bg-red-500 border-2 hover:bg-red-400 hover:shadow-sm rounded p-1">
                Price: <strike><span class="text-slate-600">${{ $price }}</span></strike>
                {{ $discount * 100 }}%
            </button>
            <button class="font-bold text-lg bg-orange-500 border-2 hover:bg-orange-400 hover:shadow-sm rounded p-1">
                Discounted: ${{ number_format($price * (1 - $discount), 2) }}
            </button>
            <button class="font-bold text-lg bg-green-500 border-2 hover:bg-green-400 hover:shadow-sm rounded p-1">
                <p>Buy now</p>
            </button>
        </div>
    </div>
</div>
