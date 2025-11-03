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


        <a href="{{ route('games.show', $game) }}" class="flex justify-evenly pt-6">
            <x-game-details 
                :name="$game->name" 
                :release_date="$game->release_date" 
                :image="$game->image" 
                :age_rating="$game->age_rating"
                :price="$game->price"
                :discount="$game->discount"
            />
        </a>

    </x-app-layout>
</body>
</html>