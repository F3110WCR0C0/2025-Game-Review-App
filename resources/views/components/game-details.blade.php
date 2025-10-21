@props(['name', 'release_date', 'age_rating', 'price', 'discount', 'image'])

<div class="border  rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{ asset('images/games/' . $image) }}" alt="{{ $name }}">
    <p class="font-bold text-lg">Release Date: <span>{{ $release_date }}</span></p>
    <p class="font-bold text-lg">Age Rating: <span>{{ $age_rating }}</span></p>
    <p class="font-bold text-lg">
        Price: <strike><span>${{ $price }}</span></strike>
        {{ $discount * 100 }}%
    </p>
    <p class="font-bold text-lg">Discounted: ${{ number_format($price * (1 - $discount), 2) }}</p>
</div>

{{-- this is what you see when you click on a game in the view all games section with extra details and all the data being drawn from the data base thanks to the migration making the table and columns and the seeder filling in the data needed --}}