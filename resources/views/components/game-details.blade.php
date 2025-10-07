<div>
    @props(['name', 'release_date', 'age_rating', 'price', 'discount', 'image'])`
</div>

<!-- Book Details Component -->
|<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-x1 mx-auto"> <!-- Limit the overall container width to make the component more compact -->
<!-- Book Title -->
<h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $name }}</h1> <!-- Heading with larger text and color -->
<!-- Book Cover Image
<div class="overflow-hidden rounded-lg mb-4 flex justify-center">
<!-- Image is further restricted to a smaller size -->
<img src="{{ asset('images/books/' . $image) }}" alt="{{ $name }}" |class="w-full max-w-xs h-auto object-cover"> <!-- Restrict image to max-w-xs (20rem) and ensure responsiveness -->
</div>
<!-- Publication Year
<h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">Published: {{ $release_date }}</h2> <!-- Emphasizing release_date with italics and smaller text -->
<!-- Book Description
<h3 class="text-gray-800 font-semibold mb-2" style="font-size:
2rem;">Description</h3> <!-- Subheading for price -->
<p class="text-gray-700 leading-relaxed">{{ $price }}</p> <!-- Text is spaced out for readability -->
</div>