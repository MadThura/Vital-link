@props(['donor'])

<div x-show="showDonorDetail" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="showDonorDetail" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="showDonorDetail = false">
        </div>

        <!-- Modal panel -->
        <div x-show="showDonorDetail" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">

            <!-- Header -->
            <div
                class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:items-center sm:justify-between border-b border-gray-700">
                <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                    <span>{{ $donor->user->name }}</span>
                </h3>
                <button @click="showDonorDetail = false" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="px-4 pt-5 pb-4 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Donor Information -->
                    <div class="col-span-1">
                        <div class="bg-gray-700 rounded-lg p-4 h-full max-h-[400px] overflow-y-auto scrollbar-none">
                            <h4 class="text-lg font-medium text-white mb-4 border-b border-gray-600 pb-2">
                                <i class="fas fa-user-circle mr-2 text-cyan-400"></i>Donor Information
                            </h4>
                            <div class="flex items-center mb-4">
                                <img src="/donor-files/{{ $donor->profile_img }}" alt="Donor Profile Image"
                                    class="w-16 h-16 rounded-full border-2 border-cyan-400 object-cover mr-3">
                                <div>
                                    <p class="text-xl font-bold text-white">{{ $donor->user->name }}</p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                {{-- unique id --}}
                                <div class="flex justify-between">
                                    <div class="text-gray-400">Unique ID</div>
                                    <div x-data="{ text: 'DNR-2025-hello', copied: false }" class="flex items-center gap-2 ">
                                        <p class="font-bold text-cyan-300 text-xs" x-text="text"></p>
                                        <button
                                            @click="navigator.clipboard.writeText(text).then(() => { copied = true; setTimeout(() => copied = false, 1000) })">
                                            <i class="fa-solid fa-copy text-cyan-200 text-sm"></i>
                                        </button>
                                        <span x-show="copied" x-transition class="text-green-400 text-xs">Copied!</span>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Date of Birth:</span>
                                    <span class="text-white">{{ $donor->dob }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Gender:</span>
                                    <span class="text-white">
                                        @if ($donor->gender === 'Male')
                                            <i class="fa-solid fa-mars text-blue-500"></i>
                                        @else
                                            <i class="fa-solid fa-venus text-pink-500"></i>
                                        @endif
                                        {{ $donor->gender }}
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Contact:</span>
                                    <span class="text-white">{{ $donor->phone }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Email:</span>
                                    <span class="text-white">{{ $donor->user->email }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">NRC Number: </span>
                                    <span class="text-white">{{ $donor->nrc }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400">Address:</span>
                                    <p class="text-white text-sm mt-1">{{ $donor->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Health Certificate -->
                    <div class="col-span-1">
                        <div class="bg-gray-700 rounded-lg p-4 h-full max-h-[400px] overflow-y-auto scrollbar-none">
                            <h4 class="text-lg font-medium text-white mb-4 border-b border-gray-600 pb-2">
                                <i class="fas fa-notes-medical mr-2 text-cyan-400"></i>Health Certificate
                            </h4>
                            <div class="flex items-center justify-center">
                                <img src="/donor-files/{{ $donor->health_certificate }}" alt="Health Certificate"
                                    class="rounded-lg w-[250px] object-contain border border-cyan-400">
                            </div>
                        </div>
                    </div>

                    <!-- NRC Images -->
                    <div class="col-span-1">
                        <div class="bg-gray-700 rounded-lg p-4 h-full max-h-[400px] overflow-y-auto scrollbar-none">
                            <h4 class="text-lg font-medium text-white mb-4 border-b border-gray-600 pb-2">
                                <i class="fas fa-id-card mr-2 text-cyan-400"></i>NRC Images
                            </h4>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Front:</p>
                                    <img src="/donor-files/{{ $donor->nrc_front }}" alt="NRC Front"
                                        class="rounded-lg w-[250px] object-contain border border-cyan-400 mx-auto">
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Back:</p>
                                    <img src="/donor-files/{{ $donor->nrc_back }}" alt="NRC Back"
                                        class="rounded-lg w-[250px] object-contain border border-cyan-400 mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- Footer -->
            <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-700">
                <button @click="showDonorDetail = false"
                    class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-gray-100 hover:bg-gray-200 text-gray-800 border border-gray-300 sm:ml-3 sm:w-auto sm:text-sm">
                    <i class="fas fa-times-circle mr-2 text-gray-600"></i>
                    <span class="pt-0.5">Close</span>
                </button>
                @if ($donor->status === 'pending')
                    <form action="{{ route('donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-green-600 hover:bg-green-700 text-white border border-green-700 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-check-circle mr-2 "></i>
                            <span class="pt-0.5">Approve</span>
                        </button>
                    </form>
                    <div x-data="{ showRejectModal: false }">
                        <!-- Reject Button (Triggers modal) -->
                        <button @click="showRejectModal = true"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-red-600 hover:bg-red-700 text-white border border-red-700 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-times-circle mr-2"></i>
                            <span class="pt-0.5">Reject</span>
                        </button>
                        <!-- Modal -->
                        <x-rejection-dialog :donor="$donor" />
                    </div>
                @endif
                @if ($donor->status === 'approved')
                    <form action="{{ route('donors.updateStatus', ['donor' => $donor, 'action' => 'suspend']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-amber-500 hover:bg-amber-600 text-white border border-amber-600 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-ban mr-2"></i>
                            <span class="pt-0.5">Suspend</span>
                        </button>
                    </form>
                    <form action="{{ route('donors.destroy', $donor) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-red-500 hover:bg-red-600 text-white border border-red-600 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-trash-alt mr-2"></i>
                            <span class="pt-0.5">Delete</span>
                        </button>
                    </form>
                @endif
                @if ($donor->status === 'suspended')
                    <form action="{{ route('donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-green-600 hover:bg-green-700 text-white border border-green-700 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-check-circle mr-2 "></i>
                            <span class="pt-0.5">Approve</span>
                        </button>
                    </form>
                    <form action="{{ route('donors.destroy', $donor) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-red-500 hover:bg-red-600 text-white border border-red-600 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-trash-alt mr-2"></i>
                            <span class="pt-0.5">Delete</span>
                        </button>
                    </form>
                @endif
                @if ($donor->status === 'rejected')
                    <form action="{{ route('donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-green-600 hover:bg-green-700 text-white border border-green-700 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-check-circle mr-2 "></i>
                            <span class="pt-0.5">Approve</span>
                        </button>
                    </form>
                    <form action="{{ route('donors.destroy', $donor) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-red-500 hover:bg-red-600 text-white border border-red-600 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-trash-alt mr-2"></i>
                            <span class="pt-0.5">Delete</span>
                        </button>
                    </form>
                @endif
                @if ($donor->status === 'resubmitted')
                    <form action="{{ route('donors.updateStatus', ['donor' => $donor, 'action' => 'approve']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" @click="showDonorDetail = false"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-green-600 hover:bg-green-700 text-white border border-green-700 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-check-circle mr-2 "></i>
                            <span class="pt-0.5">Approve</span>
                        </button>
                    </form>
                    <div x-data="{ showRejectModal: false }">
                        <!-- Reject Button (Triggers modal) -->
                        <button @click="showRejectModal = true"
                            class="flex items-center justify-center rounded-lg shadow-sm px-4 py-2.5 text-base font-medium focus:outline-none transition bg-red-600 hover:bg-red-700 text-white border border-red-700 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-times-circle mr-2"></i>
                            <span class="pt-0.5">Reject</span>
                        </button>
                        <!-- Modal -->
                        <x-rejection-dialog :donor="$donor" />
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
