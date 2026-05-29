<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lead Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Name --}}
                <div class="mb-4">
                    <p class="text-gray-500 text-sm">Name</p>
                    <p class="text-gray-900 font-medium">{{ $lead->name }}</p>
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <p class="text-gray-500 text-sm">Email</p>
                    <p class="text-gray-900 font-medium">{{ $lead->email }}</p>
                </div>

                {{-- Phone --}}
                <div class="mb-4">
                    <p class="text-gray-500 text-sm">Phone</p>
                    <p class="text-gray-900 font-medium">{{ $lead->phone ?? 'N/A' }}</p>
                </div>

                {{-- Company --}}
                <div class="mb-4">
                    <p class="text-gray-500 text-sm">Company</p>
                    <p class="text-gray-900 font-medium">{{ $lead->company ?? 'N/A' }}</p>
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <p class="text-gray-500 text-sm">Status</p>
                    <span class="px-2 py-1 rounded text-sm
                        @if($lead->status == 'Pending') bg-yellow-100 text-yellow-800
                        @elseif($lead->status == 'Converted') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800
                        @endif">
                        {{ $lead->status }}
                    </span>
                </div>

                {{-- Notes --}}
                <div class="mb-6">
                    <p class="text-gray-500 text-sm">Notes</p>
                    <p class="text-gray-900 font-medium">{{ $lead->notes ?? 'N/A' }}</p>
                </div>

                {{-- Created At --}}
                <div class="mb-6">
                    <p class="text-gray-500 text-sm">Added On</p>
                    <p class="text-gray-900 font-medium">{{ $lead->created_at->format('d M Y') }}</p>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-4">
                    <a href="{{ route('leads.edit', $lead) }}"
                        class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                        Edit
                    </a>
                    <a href="{{ route('leads.index') }}"
                        class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                        Back
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>