<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Boxes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('boxes.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-4">
                            <label for="label" class="block text-gray-100 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="label" id="label"
                                class="form-input rounded-md shadow-sm text-black">
                        </div>

                        <div class="mb-4">
                            <label for="location"
                                class="block text-gray-100 text-sm font-bold mb-2">Location:</label>

                            <textarea name="location" id="location" class="form-textarea rounded-md shadow-sm text-black"></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create
                                Box</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
