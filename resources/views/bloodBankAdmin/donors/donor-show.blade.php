<x-admin-layout>

    <form action="" method="GET"
        class="h-[10%] p-2 bg-gray-800/90 backdrop-blur-sm flex flex-col md:flex-row items-center gap-4 justify-center shadow-lg">
        <!-- Search Input - Enhanced with glass morphism effect -->
        <div class="w-full md:w-[700px] relative">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                class="w-full py-2.5 px-5 text-sm border border-gray-600 rounded-full bg-gray-700/60 text-gray-200 
                      outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 transition-all 
                      placeholder-gray-400 hover:bg-gray-700/80 shadow-md" />
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>

        <!-- Status Filter - Enhanced with gradient border -->
        <div class="w-full md:w-[200px] relative group">
            <select name="status" onchange="this.form.submit()"
                class="w-full py-2.5 px-4 text-sm rounded-full border border-gray-600 bg-gray-700/60 text-gray-200 
                       outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 transition-all
                       hover:bg-gray-700/80 shadow-md appearance-none">
                <option value="">All Status</option>
                @foreach (['pending', 'approved', 'rejected', 'suspended', 'resubmitted'] as $status)
                    <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">
                <i class="fa-solid fa-chevron-down text-xs"></i>
            </div>
        </div>

        <!-- Clear Button - More prominent -->
        <a href="{{ route('bba.donors.index') }}"
            class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center gap-1
              px-4 py-2 rounded-full hover:bg-gray-700/50">
            <i class="fa-solid fa-rotate-left"></i>
            <span>Clear</span>
        </a>

        <!-- Submit Button - With gradient and hover effect -->
        <div>
            <button type="submit"
                class="flex items-center gap-2 text-white font-medium py-2.5 px-6 
                       rounded-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700
                       shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span>Search</span>
            </button>
        </div>
    </form>

    <x-alert-box />
    <!-- Donor Table Area (scrollable) -->
    <div class="flex-grow overflow-y-auto p-5 bg-gray-800 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
        <h3 class="text-lg mb-4 font-medium text-gray-200 flex items-center gap-2">
            <i class="fa-solid fa-people-arrows text-emerald-400"></i>
            <span>Donor List</span>
        </h3>
        <div class="overflow-y-auto max-h-full [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <table class="w-full border-collapse font-roboto text-sm">
                <thead>
                    <tr class="sticky top-0 bg-gray-800 z-10">
                        <th class="py-3 px-3 border-b border-gray-700 text-gray-300 font-semibold text-left w-[40%]">
                            Name</th>
                        <th class="py-3 px-3 border-b border-gray-700 text-gray-300 font-semibold text-center w-[40%]">
                            Status</th>
                        <th class="py-3 px-3 border-b border-gray-700 text-gray-300 font-semibold text-center w-[20%]">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($donors as $donor)
                        <!-- Approved Donor -->
                        <tr class="hover:bg-gray-700/50 transition-colors group">
                            <!-- Name Column -->
                            <td class="py-3 px-3 text-gray-300">
                                <div class="flex items-center gap-3">
                                    <div class="relative">
                                        <img src="/donor-files/{{ $donor->profile_img }}" alt="user"
                                            class="w-8 h-8 rounded-full border-2 border-gray-600 group-hover:border-cyan-400 object-cover transition-colors" />
                                    </div>
                                    <span
                                        class="group-hover:text-cyan-400 transition-colors">{{ $donor->user->name }}</span>
                                </div>
                            </td>

                            <!-- Status Column -->
                            <td class="py-3 px-3 text-center">
                                @if ($donor->status === 'pending')
                                    <span class="status-badge {{ $donor->status }}">{{ $donor->status }}</span>
                                @elseif ($donor->status === 'approved' || $donor->status === 'suspended' || $donor->status === 'rejected')
                                    <span class="status-badge {{ $donor->status }}">{{ $donor->status }} by
                                        {{ $donor->bloodBank->name }} </span>
                                @elseif($donor->status === 'resubmitted')
                                    <span class="status-badge {{ $donor->status }}">{{ $donor->status }}</span>
                                @endif
                            </td>

                            <!-- Actions Column -->
                            <td class="py-3 px-3 text-center">
                                <div class="flex justify-center gap-1">
                                    <div x-data="{ showDonorDetail: false, selectedDonor: null }">
                                        <!-- View Button -->
                                        <button @click="showDonorDetail = true;"
                                            class="text-cyan-400 hover:text-cyan-300 p-2 rounded-full hover:bg-gray-700 transition"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <!-- Donation Detail Dialog -->
                                        <x-donor-detail-dialog-box :donor="$donor" />
                                    </div>
                                    @if ($donor->status === 'pending')
                                        <form
                                            action="{{ route('bba.donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <x-tooltip-button peerClass="approve" tooltipText="Approve" icon="fa-check"
                                                hoverColor="emerald-400" />
                                        </form>
                                        <!-- Wrapper for Alpine state -->
                                        <div x-data="{ showRejectModal: false }">
                                            <!-- Reject Button (Triggers modal) -->
                                            <x-tooltip-button peerClass="reject" tooltipText="Reject" icon="fa-xmark"
                                                hoverColor="red-400" @click="showRejectModal = true" />
                                            <!-- Modal -->
                                            <x-rejection-dialog :donor="$donor" />
                                        </div>
                                </div>
                    @endif
                    @if ($donor->status === 'approved')
                        <form
                            action="{{ route('bba.donors.updateStatus', ['donor' => $donor, 'action' => 'suspend']) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <x-tooltip-button peerClass="ban" tooltipText="Ban" icon="fa-ban" hoverColor="rose-500" />
                        </form>
                        <form action="{{ route('bba.donors.destroy', $donor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-tooltip-button peerClass="delete" tooltipText="Delete" icon="fa-trash"
                                hoverColor="rose-500" />
                        </form>
                    @endif
                    @if ($donor->status === 'suspended')
                        <form
                            action="{{ route('bba.donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <x-tooltip-button peerClass="approve" tooltipText="Approve" icon="fa-check"
                                hoverColor="emerald-400" />
                        </form>
                        <form action="{{ route('bba.donors.destroy', $donor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-tooltip-button peerClass="delete" tooltipText="Delete" icon="fa-trash"
                                hoverColor="rose-500" />
                        </form>
                    @endif
                    @if ($donor->status === 'rejected')
                        <form
                            action="{{ route('bba.donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <x-tooltip-button peerClass="approve" tooltipText="Approve" icon="fa-check"
                                hoverColor="emerald-400" />
                        </form>
                        <form action="{{ route('bba.donors.destroy', $donor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-tooltip-button peerClass="delete" tooltipText="Delete" icon="fa-trash"
                                hoverColor="rose-500" />
                        </form>
                    @endif
                    @if ($donor->status === 'resubmitted')
                        <form
                            action="{{ route('bba.donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <x-tooltip-button peerClass="approve" tooltipText="Approve" icon="fa-check"
                                hoverColor="emerald-400" />
                        </form>
                        <div x-data="{ showRejectModal: false }">
                            <!-- Reject Button (Triggers modal) -->
                            <x-tooltip-button peerClass="reject" tooltipText="Reject" icon="fa-xmark"
                                hoverColor="red-400" @click="showRejectModal = true" />
                            <!-- Modal -->
                            <x-rejection-dialog :donor="$donor" />
                        </div>
                    @endif
        </div>
        </td>

        </tr>
    @empty
        <p class="text-red-50">No donors found</p>
        @endforelse

        </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $donors->appends(request()->query())->links() }}
    </div>
    </div>
</x-admin-layout>
