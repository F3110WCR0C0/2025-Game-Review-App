<!DOCTYPE html>
<html>
<head><title>Developers</title></head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Developer Details") }}
            </h2>
        </x-slot>

        <div class="max-w-7xl mx-auto mt-6">
            <x-developer-details 
                :first_name="$developer->first_name"
                :last_name="$developer->last_name" 
                :company="$developer->company"
                :bio="$developer->bio"
                :image="$developer->image"

            />
        </div>


        <div class="absolute inset-x-0 bottom-0 border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 ">
            <div class="inset-x-0 bottom-0 grid grid-cols-3 gap-4 my-5 max-h-[1050px] overflow-auto">
                @foreach($developer->games as $game)
                <a href="{{ route('games.show', $game) }}">
                    <div class="border rounded-lg shadow-md p-2 bg-white hover:shadow-lg transition duration-300">
                        <img 
                            src="{{ asset('images/games/' . $game->image) }}" 
                            alt="{{ $game->name }}"
                            class="w-full h-full object-cover rounded-md"
                        />
                        <p class="text-center font-semibold mt-2">{{ $game->name }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </x-app-layout>
</body>
</html>