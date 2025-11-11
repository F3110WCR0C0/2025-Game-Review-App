<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Developer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Using the DeveloperForm component for developer creation --}}
                    <x-developer-form
                        :action="route('developers.update', $developer)"
                        :method="'PUT'"
                        :developer="$developer"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- this is the page people are brought to edit a developer with the x-developer-form having a post method to store data --}}