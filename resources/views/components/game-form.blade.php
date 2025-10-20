@props(['action', 'method', 'game'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

{{-- /////////////////////////////////////////////////////////////////// --}}
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $game->name ?? 'Title') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Game Cover Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($game) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

        <div class="mb-4">
        <label for="release_date" class="block text-sm text-gray-700">Release_date</label>
        <input
            type="date"
            name="release_date"
            id="release_date"
            value="{{ old('release_date', $game->release_date ?? ' ') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('release_date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="age_rating" class="block text-sm text-gray-700">Age_rating</label>
        <input
        {{-- Possibly edit text to some sort of int --}}
            type="text"
            name="age_rating"
            id="age_rating"
            value="{{ old('age_rating', $game->age_rating ?? '18') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('age_rating')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    
    <div class="mb-4">
        <label for="price" class="block text-sm text-gray-700">Price</label>
        <input
        {{-- Possibly edit text to some sort of int --}}
            type="text"
            name="price"
            id="price"
            value="{{ old('price', $game->price ?? '0.00') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('price')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="discount" class="block text-sm text-gray-700">Discount</label>
        <input
        {{-- Possibly edit text to some sort of decimal --}}
            type="text"
            name="discount"
            id="discount"
            value="{{ old('discount', $game->discount ?? '0.00') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('discount')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>



{{-- /////////////////////////////////////////////////////////////// --}}
    @isset($game->image)
        <div class="mb-4">
            <img src="{{ asset($game->image) }}" alt="Game cover" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($game) ? 'Update Game' : 'Add Game' }}
        </x-primary-button>
    </div>
</form>


