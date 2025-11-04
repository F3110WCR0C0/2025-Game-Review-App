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


    <div class=" absolute inset-x-0 bottom-0 border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 ">

        @if($game->feedbacks->isEmpty())
            <p class="text-gray-600 p-2 ">No feedbacks yet</p>
        @else
            <ul class="mt-4 space-y-4 h-60 overflow-y-auto">
                @foreach($game->feedbacks as $feedback)
                    <li class="bg-gray-100 p-4 rounded-lg shadow-lg">
                        <p class="font-semibold">
                            {{ $feedback->user->name }} 
                            ({{ $feedback->created_at->format('M d, Y') }})
                        </p>
                        <p>Rating: {{ $feedback->rating }} / 5</p>
                        <p>{{ $feedback->feedback }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="shadow-md p-2 ">
            <h4 class="font-semibold text-md mt-8">Add a Feedback</h4>
            <form action="{{ route('feedbacks.store', $game) }}" method="POST" class="mt-4">
                @csrf

                <div class="mb-4">
                    <label for="rating" class="block font-medium text-sm text-gray-700">Rating</label>
                    <select name="rating" id="rating" class="mt-1 block w-full" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="feedback" class="block font-medium text-sm text-gray-700">Feedback</label>
                    <textarea 
                        name="feedback" 
                        id="feedback" 
                        rows="3" 
                        class="mt-1 block w-full" 
                        placeholder="Write your feedback here..."
                    ></textarea>
                </div>
            
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Feedback</button>
            </form>
        </div>
    </div>
    
    </x-app-layout>
</body>
</html>