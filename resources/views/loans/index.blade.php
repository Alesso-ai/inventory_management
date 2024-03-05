<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Historial de Préstamos') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">Historial de Préstamos</h2>

                    @if($loans->isEmpty())
                        <p>No tienes préstamos registrados.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800">
                            
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Item
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Fecha de Préstamo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Fecha de Devolución
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                           
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($loans as $loan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $loan->item->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $loan->checkout_date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $loan->returned ? $loan->return_date : 'Pendiente' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(!$loan->returned)
                                                <form action="{{ route('loans.return', $loan->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="text-red-500 hover:underline">Devolver</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
