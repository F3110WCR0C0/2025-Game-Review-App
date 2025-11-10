@props(['action', 'method', 'game', 'feedback'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="rating" class="block text-sm font-medium text-gray-700">Rating current: {{ old('rating', $feedback->rating ?? '') }}</label>
            <select name="rating" id="rating" class="mt-1 block w-full" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            
            @error("rating")
                <p class="text-sm text-red-600">{{ $message }}</p> 
            @enderror
    </div>

    <div class="mb-4">
        <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback</label>
        <input
        type="text"
        name="feedback"
        id="feedback"
        value="{{ old('feedback', $feedback->feedback ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus: ring-indigo-500 focus:border-indigo-500"
        />
        @error('feedback')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <x-primary-button>
        {{ isset($feedback) ? 'Update Feedback' : 'Save Feedback' }}
    </x-primary-button>
</form>