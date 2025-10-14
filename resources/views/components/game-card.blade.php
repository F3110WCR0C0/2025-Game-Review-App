@props(['name', 'image','release_date','age_rating','price','discount'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{ asset('images/games/' . $image) }}" alt="{{ $name }}">
    <p class="font-bold text-lg"> <span> Release Date: {{$release_date}}</span></p>
    <p class="font-bold text-lg">Age Rating: <span>{{$age_rating}}</span></p>
    <p class="font-bold text-lg">Price: <span>${{$price}}</span></p>
    {{-- <p class="font-bold text-lg">{{$discount}}</p> --}}
</div>

