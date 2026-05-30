<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Stats Cards --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6 border">
                    <p class="text-gray-500 text-sm">Total Leads</p>
                    <p class="text-3xl font-medium mt-1">{{ $totalLeads }}</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border">
                    <p class="text-gray-500 text-sm">Pending</p>
                    <p class="text-3xl font-medium mt-1 text-yellow-600">{{ $pendingLeads }}</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border">
                    <p class="text-gray-500 text-sm">Converted</p>
                    <p class="text-3xl font-medium mt-1 text-green-600">{{ $convertedLeads }}</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border">
                    <p class="text-gray-500 text-sm">Rejected</p>
                    <p class="text-3xl font-medium mt-1 text-red-600">{{ $rejectedLeads }}</p>
                </div>
            </div>

            {{-- Recent Leads --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Recent Leads</h3>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Status</th>
                            <th class="py-2 px-4">Added On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentLeads as $lead)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $lead->name }}</td>
                            <td class="py-2 px-4">{{ $lead->email }}</td>
                            <td class="py-2 px-4">
                                <span class="px-2 py-1 rounded text-sm
                                    @if($lead->status == 'Pending') bg-yellow-100 text-yellow-800
                                    @elseif($lead->status == 'Converted') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>
                            <td class="py-2 px-4">{{ $lead->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                                No leads yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
