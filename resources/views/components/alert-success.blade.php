@if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 border border-green-500 text-green-700 rounded-md">
        {{ $slot }}
    </div>
@endif

{{-- this makes it so if the delete and edit works and is a success it displays a success message --}}