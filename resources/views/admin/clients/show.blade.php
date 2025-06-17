@extends('layouts.admin')

@section('title', 'Client Details')

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
                            <a href="{{ route('admin.clients.index') }}" class="hover:text-purple-600">Clients</a>
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
                Client Details
            </h2>

            <div class="flex flex-col bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                <form>
                    <div class="flex gap-4">
                        <div class="flex flex-col w-full gap-4">
                            <!-- Name -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Name</span>
                                <input type="text" disabled class="block w-full mt-1 text-sm rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" value="{{ $client->name }}" readonly>
                            </label>
                            <!-- Email -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Email</span>
                                <input type="email" disabled class="block w-full mt-1 text-sm rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" value="{{ $client->email }}" readonly>
                            </label>
                            <!-- Phone -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Phone</span>
                                <input type="text" disabled class="block w-full mt-1 text-sm rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" value="{{ $client->phone ?? '-' }}" readonly>
                            </label>
                            <!-- Role -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Role</span>
                                <input type="text" disabled class="block w-full mt-1 text-sm rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" value="{{ ucfirst($client->role) }}" readonly>
                            </label>
                        </div>
                        <div class="flex flex-col w-full gap-4">
                            <!-- Passport -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Passport</span>
                                <input type="text" disabled class="block w-full mt-1 text-sm rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" value="{{ $client->passport ?? '-' }}" readonly>
                            </label>
                            <!-- Birthday -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Birthday</span>
                                <input type="text" disabled class="block w-full mt-1 text-sm rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" value="{{ $client->birthday ? date('Y-m-d', strtotime($client->birthday)) : '-' }}" readonly>
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('admin.clients.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
