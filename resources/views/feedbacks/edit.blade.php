<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> 
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Feedback:</h3>

                    <x-feedback-form
                        :action="route('feedbacks.update', $feedback)"
                        :method="'PUT'"
                        :feedback="$feedback"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>