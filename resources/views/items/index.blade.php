<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
            <a href="{{ route('items.create') }}"
                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600  ">Create Item</a>
        </div>

        <div class="p-6 sm:px-20 bg-gray-800 border-b text-white">
            <h1 class="text-2xl">Buscar...</h1>
            <input type="text" id="search"
                class=" mt-2 w-full border-2 border-gray-300 bg-white dark:bg-gray-800 h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none mb-4"
                placeholder="Search">
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">







                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Picture
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Box
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>


                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">

                            @foreach ($items as $item)
                                <tr>
                                    <td id="nameSearch" class="px-6 py-4 whitespace-nowrap">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $item->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="Item Picture"
                                            class="h-10 w-10">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $item->price }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($item->box)
                                            {{ $item->box->label }}
                                        @else
                                            No Box
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 flex flex-col">
                                        <a href="{{ route('items.show', $item->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">View</a>
                                        <a href="{{ route('items.edit', $item->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                        @if ($item->activeLoan())
                                            <span class="text-gray-400">Ver Prestamo</span>
                                        @else
                                            <a href="{{ route('loans.create', $item->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Prestar</a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const search = document.getElementById('search');
    search.addEventListener('keyup', function() {
        let value = search.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let nameCell = row.querySelector('#nameSearch');
            let rowText = nameCell.textContent.toLowerCase();
            if (rowText.includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
