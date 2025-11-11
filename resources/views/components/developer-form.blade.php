@props(['action', 'method', 'developer'])

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



{{-- /////////////////////////////////////////////////////////////// --}}


    <div>
        <x-primary-button>
            {{ isset($developer) ? 'Update Developer' : 'Add Developer' }}
        </x-primary-button>
    </div>
</form>


{{-- this is the file that holds the form it ensure that the data being entered is the correct variable type and it displays the form page when pressing edit and create --}}