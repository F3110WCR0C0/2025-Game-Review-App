<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Games') }}
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
                        @foreach($games as $game)
                            <div>
                                <a href="{{ route('games.show', $game) }}">
                                    <x-game-card 
                                        :name="$game->name" 
                                        :release_date="$game->release_date" 
                                        :image="$game->image" 
                                        :age_rating="$game->age_rating"
                                        :price="$game->price"
                                        :discount="$game->discount"
                                    />
                                </a>
                                        <div class="mt-4 flex space-x-2">
                                            <a href="{{ route('games.edit', $game) }}" class="text-grey-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('games.destroy', $game) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                            </div>
                        @endforeach       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
