<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('List of Developers') }}
            <x-nav-link>
                <input type="text" placeholder="searchbar">
            </x-nav-link>
        </h2>
        <x-alert-success>
            successful!
        </x-alert-success>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($developers as $developer)
                            <div>
                                <a href="{{ route('developers.show', $developer) }}">
                                    <x-developer-card 
                                        :first_name="$developer->first_name" 
                                        :last_name="$developer->last_name"
                                        :company="$developer->company" 
                                    />
                                </a>
                                    @if(auth()->user()->role === 'admin')
                                        <div class="mt-4 flex space-x-2">
                                            <a href="{{ route('developers.edit', $developer) }}" class="text-grey-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('developers.destroy', $developer) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this developer?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                            </div>
                        @endforeach       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- This is the main page that people see where you can access every other page in x-developer-card we see the file pulling all the data in the data base --}}
