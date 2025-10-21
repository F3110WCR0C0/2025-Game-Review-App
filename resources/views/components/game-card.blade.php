@props(['name', 'image','release_date','age_rating','price','discount'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{ asset('images/games/' . $image) }}" alt="{{ $name }}">
</div>

{{-- this is what you see when you see all the games just the title being drawn fron the database and an image  --}}