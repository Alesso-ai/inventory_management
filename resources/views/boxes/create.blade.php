<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf



                        <div class="mb-4">
                            <label for="name" class="block text-gray-100 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name"
                                class="form-input rounded-md shadow-sm text-black">
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-100 text-sm font-bold mb-2">Description:</label>

                            <textarea name="description" id="description" class="form-textarea rounded-md shadow-sm text-black"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-gray-100 text-sm font-bold mb-2">Picture:</label>


                            <input type="file" name="picture" id="picture"
                                class="form-input rounded-md shadow-sm text-black">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-100 text-sm font-bold mb-2">Price:</label>

                            <input type="number" name="price" id="price"
                                class="form-input rounded-md shadow-sm text-black">
                        </div>

                        <div class="mb-4">
                            <label for="box" class="block text-gray-100 text-sm font-bold mb-2">Box:</label>
                            <select name="box_id" id="box" class="form-select rounded-md shadow-sm  text-black">
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create
                                Item</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
