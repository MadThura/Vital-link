<x-admin-layout title="SuperAdmin Dashboard">
    <x-alert-box/>
    <div class="h-full bg-gray-900 p-6 font-sans text-gray-100 overflow-y-auto scrollbar-none">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6 text-cyan-400">

            <h1 class="text-2xl font-bold">
                <i class="fa-solid fa-user-tie mr-2"></i>
                User Management
            </h1>
        </div>
        
        <!-- Users Table -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden mb-8">
            <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-200 flex items-center gap-2">
                    <i class="fa-solid fa-users-gear text-blue-400"></i>
                    <span>All Users</span>
                </h3>

            </div>

            <div class="overflow-y-auto max-h-[500px] relative scrollbar-none">
                <table class="w-full ">
                    <thead class="bg-gray-800 sticky top-0 z-10"> <!-- Added z-10 here -->
                        <tr class="border-b border-gray-700">
                            <th class="py-3 px-4 text-left text-gray-300 font-semibold">User</th>
                            <th class="py-3 px-4 text-left text-gray-300 font-semibold">Role</th>
                            <th class="py-3 px-4 text-center text-gray-300 font-semibold">Status</th>
                            <th class="py-3 px-4 text-center text-gray-300 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <!-- Blood Bank Admin -->
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-700/50 transition-colors group">
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="relative">
                                            <div
                                                class="w-9 h-9 rounded-full {{ $user->role === 'blood_bank_admin' ? 'bg-blue-900/20 border-2 border-blue-800 group-hover:border-blue-400' : 'bg-purple-900/20 border-2 border-purple-800 group-hover:border-purple-400' }} flex items-center justify-center transition-colors">
                                                <i
                                                    class="{{ $user->role === 'blood_bank_admin' ? 'fa-solid fa-user-shield text-blue-400' : 'fa-solid fa-user-nurse text-purple-400' }}"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <p
                                                class="group-hover:text-{{ $user->role === 'blood_bank_admin' ? 'blue' : 'purple' }}-400 transition-colors">
                                                {{ $user->name }}
                                            </p>
                                            <p class="text-xs text-gray-400">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs {{ $user->role === 'blood_bank_admin' ? 'bg-blue-900/20 text-blue-400' : 'bg-purple-900/20 text-purple-400' }}">
                                        {{ $user->role === 'blood_bank_admin' ? 'Blood Bank Admin' : 'Ward Operator' }}
                                    </span>
                                </td>

                                <td class="py-3 px-4 text-center">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs {{ $user->status === 'active' ? 'bg-green-900/20 text-green-400' : 'bg-gray-900/20 text-gray-400' }}">
                                        {{ $user->status }}
                                    </span>

                                </td>

                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <div class="flex justify-center gap-3">
                                            <!-- Approve Form -->
                                            <form
                                                action="{{ route('superAdmin.users.updateStatus', ['user' => $user, 'action' => 'active']) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="text-gray-400 hover:text-green-300 transition-colors">
                                                    <i class="text-sm fa-solid fa-check"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="flex justify-center gap-3">
                                            <!-- Ban Form -->
                                            <form
                                                action="{{ route('superAdmin.users.updateStatus', ['user' => $user, 'action' => 'suspend']) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="text-gray-400 hover:text-amber-300 transition-color">
                                                    <i class="text-sm fa-solid fa-ban"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="flex justify-center gap-3">
                                            <!-- Ban Form -->
                                            <form
                                                action="{{ route('superAdmin.users.destroy', $user) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-gray-400 hover:text-red-300 transition-color">
                                                    <i class="text-sm fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-admin-layout>
