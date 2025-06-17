@extends('layouts.admin')

@section('title', 'Application Details')

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
                            <span class="text-gray-500 dark:text-gray-400">Show</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Application Details
            </h2>

            <!-- Form -->
            <form action="#" class="flex flex-col bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex flex-col w-full gap-4">
                        <!-- Client Selection with Search -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Client</span>
                            <input type="text" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $application->user->name }}">

                        </label>

                        <!-- Email -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input type="text" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $application->user->email }}">

                        </label>

                        {{-- Phone --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Phone</span>
                            <input type="text" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $application->user->phone ?? '-' }}">
                        </label>

                        <!-- Country Dropdown -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Country</span>
                            {{-- input --}}
                            <input type="text" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $application->country->name }}">
                        </label>

                        <!-- Field Name Dropdown -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Field Name</span>
                            <input type="text" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $application->field->title }}">
                        </label>
                    </div>

                    <div class="flex flex-col w-full gap-4">
                        {{-- Amount --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Company Payment</span>
                            <input disabled value="{{ number_format(old('amount', $application->amount)) }} sum" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter amount">
                        </label>

                        <!-- Status -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Application Status</span>
                            <input type="text" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ ucfirst($application->status) }}">
                        </label>

                        {{-- Comment --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Comment</span>
                            <textarea type="text" rows="4" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter comment">{{ $application->comment ?? 'No comment provided' }}</textarea>
                        </label>
                        {{-- Image --}}
                        @if ($application->document)
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Document</span>
                                <a href="{{ asset('storage/' . $application->document) }}" target="_blank" class="text-purple-600 hover:underline">
                                    View Document
                                </a>
                            </label>
                        @endif
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4 items-center">
                    <a href="{{ route('admin.applications.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                        Back
                    </a>
                    <a href="{{ route('admin.payments.show', $application->id) }}" class="px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Payments
                    </a>
                </div>
            </form>
        </div>
    </main>
@endsection
