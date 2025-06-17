@extends('layouts.admin')

@section('title', 'Clients')

@section('content')

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto my-6">
            <!-- Breadcrumb -->
            <nav class="flex mb-4 text-gray-700 dark:text-gray-300 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 sm:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center hover:text-purple-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0h-2a2 2 0 01-2-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v8a2 2 0 01-2 2H3" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-500 dark:text-gray-400">Clients</span>
                        </div>
                    </li>
                </ol>
            </nav>

            {{-- Page Title --}}
            <div class="flex flex-col items-center sm:flex-row sm:justify-between  my-6 w-full gap-4">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Clients
                </h2>

                <div class="flex items-center w-full sm:w-auto gap-2 flex-col sm:flex-row">
                    <div class="relative min-w-32 max-w-xl w-full sm:w-auto focus-within:text-purple-500">
                        <div class="absolute inset-y-0 flex items-center pl-2">
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" placeholder="Search for clients" aria-label="Search" />

                        <script>
                            document.getElementById('search').addEventListener('input', function() {
                                const searchTerm = this.value.toLowerCase();
                                const rows = document.querySelectorAll('tbody tr');

                                rows.forEach(row => {
                                    const nameCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                                    const emailCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                                    if (nameCell.includes(searchTerm) || emailCell.includes(searchTerm)) {
                                        row.style.display = '';
                                    } else {
                                        row.style.display = 'none';
                                    }
                                });
                            });
                        </script>

                    </div>
                    <a href="{{ route('admin.clients.create') }}" class="flex w-full sm:w-auto justify-center items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="w-auto">Add Client</span>
                    </a>
                </div>
            </div>

            {{-- Main Data --}}
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="w-1/16 px-4 py-3 text-center">ID</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3 text-center">Phone</th>
                                <th class="px-4 py-3 text-center">Passport</th>
                                <th class="px-4 py-3 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($clients as $index => $client)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{ $index += 1 }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <p class="font-semibold">{{ $client->name }}</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $client->email }}
                                    </td>
                                    <td class="px-4 py-3 text-sm {{ $client->phone ? '' : 'text-center' }}">
                                        {{ $client->phone ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{ $client->passport ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 flex gap-1 justify-end">

                                        <a href="{{ route('admin.clients.show', $client) }}" class="flex items-center text-blue-600 hover:underline mr-2">
                                            Show
                                        </a>
                                        @if ($client->id != auth()->id())
                                            <a href="{{ route('admin.clients.edit', $client) }}" class="flex items-center text-purple-600 hover:underline mr-2">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="flex items-center text-red-600 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Showing {{ $clients->firstItem() }}-{{ $clients->lastItem() }} of {{ $clients->total() }}
                    </span>

                    <span class="col-span-2"> </span>

                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        {{ $clients->links('pagination::tailwind') }}
                    </span>
                </div>
            </div>
        </div>
    </main>
@endsection
