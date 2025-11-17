@props(['action', 'method', 'developer' => null, 'games' => []])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

{{-- /////////////////////////////////////////////////////////////////// --}}
    <div class="mb-4">
        <label for="first_name" class="block text-sm text-gray-700">First Name</label>
        <input
            type="text"
            name="first_name"
            id="name"
            value="{{ old('first_name', $developer->first_name ?? 'First Name') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('first_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="last_name" class="block text-sm text-gray-700">Last Name</label>
        <input
            type="text"
            name="last_name"
            id="last_name"
            value="{{ old('last_name', $developer->last_name ?? 'last Name') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('last_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="company" class="block text-sm text-gray-700">Company</label>
        <input
            type="text"
            name="company"
            id="company"
            value="{{ old('company', $developer->company ?? 'Company') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('company')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div class="mb-4">
        <label for="games[]" class="block text-sm text-gray-700">Games</label>
        <div class="grid grid-cols-2 gap-2 max-h-64 overflow-y-auto border rounded-md p-2">
            @foreach($games as $game)
                <label class="inline-flex items-center space-x-2">
                    <input 
                        type="checkbox" 
                        name="games[]" 
                        value="{{ $game->id }}"
                        {{ (isset($developer) && $developer->games->contains($game->id)) ? 'checked' : '' }}
                        class="form-checkbox h-5 w-5 text-indigo-600"
                    >
                    <span>{{ $game->name }}</span>
                </label>
            @endforeach
        </div>
        @error('games')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


{{-- /////////////////////////////////////////////////////////////// --}}


    <div>
        <x-primary-button>
            {{ isset($developer) ? 'Update Developer' : 'Add Developer' }}
        </x-primary-button>
    </div>
</form>


{{-- this is the file that holds the form it ensure that the data being entered is the correct variable type and it displays the form page when pressing edit and create --}}