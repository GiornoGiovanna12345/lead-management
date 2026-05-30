<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Lead
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('leads.update', $lead) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Name *</label>
                        <input type="text" name="name" value="{{ old('name', $lead->name) }}"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email', $lead->email) }}"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $lead->phone) }}"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Company</label>
                        <input type="text" name="company" value="{{ old('company', $lead->company) }}"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full border rounded px-3 py-2">
                            @foreach(['Pending', 'Converted', 'Rejected'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $lead->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Assign To (Admin Only) --}}
                    @if(Auth::user()->role == 'admin')
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Assign To</label>
                        <select name="assigned_to" class="w-full border rounded px-3 py-2">
                            <option value="">-- Select Staff --</option>
                            @foreach($staff as $member)
                                <option value="{{ $member->id }}"
                                    {{ $lead->assigned_to == $member->id ? 'selected' : '' }}>
                                    {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Notes</label>
                        <textarea name="notes" rows="4"
                            class="w-full border rounded px-3 py-2">{{ old('notes', $lead->notes) }}</textarea>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                            Update Lead
                        </button>
                        <a href="{{ route('leads.index') }}"
                            class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>