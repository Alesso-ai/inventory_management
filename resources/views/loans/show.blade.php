<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <h1 class="text-3xl font-bold mb-2">{{ $item->name }}</h1>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">{{ $loan->description }}</p>
                    </div>
                    <div class="mb-4">
                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="Item Picture" class="h-10 w-10">
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Price: ${{ $loan->price }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-500 dark:text-gray-300 text-sm">Box: {{ $loan->box->label }}</p>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('loans.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
