<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Loans') }}
            </h2>
            <a href="{{ route('loans.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create Item</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Agregar una tabla para mostrar el historial de préstamos -->
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                                <tr>
                                    <td>{{ $loan->name }}</td>
                                    <td>{{ $loan->description }}</td>
                                    <td>
                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:underline">View Details</a>

                                        @if(!$loan->returned) <!-- Verificar si el préstamo está abierto -->
                                            <form action="{{ route('loans.return', $loan->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-red-500 hover:underline">Return</button>
                                            </form>
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
