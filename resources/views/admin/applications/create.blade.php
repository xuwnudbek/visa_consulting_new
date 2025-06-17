@extends('layouts.admin')

@section('title', 'Add Application')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container my-6 px-6 mx-auto grid">

            <!-- Breadcrumb -->
            <nav class="flex mb-4 text-gray-700 dark:text-gray-300 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center hover:text-purple-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0h-2a2 2 0 01-2-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v8a2 2 0 01-2 2H3" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('admin.applications.index') }}" class="hover:text-purple-600">Applications</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-500 dark:text-gray-400">Add New</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add New Application
            </h2>

            <!-- Form -->
            <form action="{{ route('admin.applications.store') }}" method="POST" class="flex flex-col bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                @csrf

                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex flex-col w-full gap-4">
                        <!-- Client Selection with Search -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Client</span>
                            <select id="client-select" required name="client_id" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                  dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option disabled selected>Clientni tanlang</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client['id'] }}" {{ old('client_id') == $client['id'] ? 'selected' : '' }}>{{ $client['name'] }}</option>
                                @endforeach
                            </select>
                        </label>

                        <!-- Country Dropdown -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Country</span>
                            <select name="country_id" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                  dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option disabled selected>Countryni tanlang</option>

                                @foreach ($countries as $country)
                                    <option value="{{ $country['id'] }}" {{ old('country_id') == $country['id'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                        </label>

                        <!-- Field Name Dropdown -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Field Name</span>
                            <select name="field_id" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                  dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option disabled selected>Ish turini tanlang</option>

                                @foreach ($fields as $field)
                                    <option value="{{ $field['id'] }}" {{ old('field_id') == $field['id'] ? 'selected' : '' }}>{{ $field['title'] }}</option>
                                @endforeach
                            </select>
                        </label>


                    </div>

                    <div class="flex flex-col w-full gap-4">
                        <!-- Status -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Application Status</span>
                            <select name="status" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                {{-- <option disabled selected>Statusni tanlang</option> --}}
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4 items-center">
                    <a href="{{ route('admin.applications.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                        Back
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Save Application
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
