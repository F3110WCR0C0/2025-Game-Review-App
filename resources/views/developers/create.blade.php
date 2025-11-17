<!DOCTYPE html>
<html>
<head><title>Developers</title></head>
<body>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Create New Developer") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
                        <x-developer-form
                            :action="route('developers.store')"
                            :method="'POST'"
                            :games="$games"

                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>


{{-- this is the page people are brought to create a developer with the x-developer-form having a post method to store data --}}