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
                    <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-4">
                            <label for="item_id" class="block font-medium text-white">Item</label>
                           
                            <select name="item_id" id="item_id" class="form-input">
                                <option value="{{ $item_id->id }}">{{ $item_id->name }}</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
         
                           
         
         
                        </div>
                        <div class="p-4">
                            <label for="location" class="block font-medium text-white">Fecha de devolucion esperada</label>
                            <input type="date" name="due_date" id="due_date" class="form-input">
                        </div>
         
                        <!-- Submit button -->
                        <div class="flex justify-end p-4">
                            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="ml-2 btn btn-primary">Crear Prestamo</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
