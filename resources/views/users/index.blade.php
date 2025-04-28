<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('alert')

                    <div class="overflow-x-auto">
                        <a href="{{ route('users.create') }}" class="mb-4 inline-flex items-center px-4 py-2 bg-teal-700 text-sm text-white rounded-md hover:bg-blue-700">
                            {{ __('Add New User') }}
                        </a>
                        <table class="min-w-full bg-white border border-gray-300 text-sm">
                            
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">#</th>
                                    <th class="py-2 px-4 border-b text-left">Name</th>
                                    <th class="py-2 px-4 border-b text-left">Email</th>
                                    <th class="py-2 px-4 border-b text-left">Created At</th>
                                    <th class="py-2 px-4 border-b text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-sm">
                                @forelse($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <div class="flex space-x-2">
                                                <!-- Trigger for Edit Modal -->
                                                <button type="button" class="text-blue-500 hover:underline" onclick="openModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')">Edit</button>

                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing User -->
    <div id="editModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-lg font-semibold mb-4">Edit User</h3>
            <form id="editUserForm" action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 text-sm bg-gray-500 text-white rounded-md" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-teal-700 text-white text-sm rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Open modal with user data
        function openModal(id, name, email) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            document.getElementById('editUserForm').action = '/users/' + id;
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>

</x-app-layout>
