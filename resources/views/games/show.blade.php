<!DOCTYPE html>
<html>
<head><title>Games</title></head>
<body>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Game Details") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
                            <a href="{{ route('games.show', $game) }}">
                                <x-game-details 
                                    :name="$game->name" 
                                    :release_date="$game->release_date" 
                                    :image="$game->image" 
                                    :age_rating="$game->age_rating"
                                    :price="$game->price"
                                    :discount="$game->discount"
                                />
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>