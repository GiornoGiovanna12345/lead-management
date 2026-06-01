<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Leads
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">All Leads</h3>
                    @if(Auth::user()->role == 'admin')
                    <a href="{{ route('leads.create') }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Add Lead
                    </a>
                    @endif
                </div>

                {{-- Search Bar --}}
                <form method="GET" action="{{ route('leads.index') }}" class="mb-4">
                    <div class="flex gap-2">
                        <input type="text" name="search" value="{{ $search ?? '' }}"
                            placeholder="Search by name or email..."
                            class="w-full border rounded px-3 py-2">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Search
                        </button>
                        @if($search)
                        <a href="{{ route('leads.index') }}"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                            Clear
                        </a>
                        @endif
                    </div>
                </form>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Phone</th>
                            <th class="py-2 px-4">Company</th>
                            <th class="py-2 px-4">Status</th>
                            <th class="py-2 px-4">Assigned To</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $lead)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $lead->name }}</td>
                            <td class="py-2 px-4">{{ $lead->email }}</td>
                            <td class="py-2 px-4">{{ $lead->phone }}</td>
                            <td class="py-2 px-4">{{ $lead->company }}</td>
                            <td class="py-2 px-4">
                                <span class="px-2 py-1 rounded text-sm
                                    @if($lead->status == 'Pending') bg-yellow-100 text-yellow-800
                                    @elseif($lead->status == 'Converted') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>
                            <td class="py-2 px-4">
                                {{ $lead->assignedTo->name ?? 'Unassigned' }}
                            </td>
                            <td class="py-2 px-4">
                                <a href="{{ route('leads.show', $lead) }}"
                                   class="text-blue-500 hover:underline mr-2">View</a>
                                @if(Auth::user()->role == 'admin')
                                <a href="{{ route('leads.edit', $lead) }}"
                                   class="text-yellow-500 hover:underline mr-2">Edit</a>
                                <form action="{{ route('leads.destroy', $lead) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:underline"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-4 px-4 text-center text-gray-500">
                                No leads found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>