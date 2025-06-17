@extends('layouts.admin')

@section('title', 'Application Payments')

@php

    $paymentTypes = [
        'cash' => 'Cash',
        'card' => 'Card',
        'bank_transfer' => 'Bank Transfer',
    ];

@endphp

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
                            <a href="{{ route('admin.payments.index') }}" class="hover:text-purple-600">Payments</a>
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
                Application № <a href="{{ route('admin.applications.show', $application->id) }}" class="text-purple-600 hover:underline cursor-pointer">{{ $application->id }}</a> Payments for <a href="{{ route('admin.clients.show', $application->user->id) }}" class="text-purple-600 cursor-pointer hover:underline">{{ $application->user->name }}</a>
            </h2>

            {{-- form: payment amount, type --}}
            <form action="{{ route('admin.payments.store') }}" method="POST" class="flex flex-col bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                @csrf
                <div class="row flex-row gap-4">
                    <input type="hidden" name="application_id" value="{{ $application->id }}">
                    <!-- Amount -->
                    <div class="flex flex-col sm:flex-row gap-4 w-full mb-4">
                        <div class="row flex-col w-full space-y-1.5">
                            {{-- Amount --}}
                            <div class="w-full sm:w-1/2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="amount">Amount</label>
                                <input type="number" name="amount" required id="amount" class="mt-1 block w-full form-input text-gray-700 dark:text-gray-300 dark:bg-gray-700 rounded-md border-gray-300 dark:border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-200" value="{{ old('amount') }}" placeholder="Enter amount">
                                @error('amount')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Payment Type -->
                            <div class="w-full sm:w-1/2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="type">Payment Type</label>
                                <select name="type" required id="type" class="mt-1 block w-full form-select text-gray-700 dark:text-gray-300 dark:bg-gray-700 rounded-md border-gray-300 dark:border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-200">
                                    @foreach ($paymentTypes as $key => $value)
                                        <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Payment Comment --}}
                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="comment">Comment</label>
                            <textarea name="comment" id="comment" rows="4" class="mt-1 block w-full form-textarea text-gray-700 dark:text-gray-300 dark:bg-gray-700 rounded-md border-gray-300 dark:border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-200" placeholder="Enter any comments or notes">{{ old('comment') }}</textarea>
                            @error('comment')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Cancel / Save -->
                    <div class="flex justify-end items-center space-x-4">
                        <a href="{{ route('admin.applications.show', $application->id) }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                            Back
                        </a>
                        <button type="submit" class="px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            Save Payment
                        </button>
                    </div>
                </div>
            </form>

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Payment History
            </h2>
            {{-- Table: table number, amount, date --}}
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="w-1/6 px-4 py-3 text-center">Payment ID</th>
                                <th class="w-1/3 px-4 py-3">Amount</th>
                                <th class="w-1/5 px-4 py-3 text-center">Date</th>
                                <th class="w-1/6 px-4 py-3 text-center">Type</th>
                                <th class="w-1/2 px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($payments as $payment)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm text-center">{{ $payment->id }}</td>
                                    <td class="px-4 py-3 text-sm">{{ number_format($payment->amount, 0) }} so'm</td>
                                    <td class="px-4 py-3 text-sm text-center">{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{ __('messages.' . $payment->payment_type) }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this payment?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Showing {{ $payments->firstItem() }}-{{ $payments->lastItem() }} of {{ $payments->total() }}
                    </span>

                    <span class="col-span-2"> </span>

                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        {{ $payments->links('pagination::tailwind') }}
                    </span>
                </div>
            </div>
        </div>
    </main>
@endsection
