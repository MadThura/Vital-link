<x-layout title="Admin Dashboard">
    <div class="flex w-full h-screen text-black overflow-hidden">
        <!-- Sidebar (fixed height, scroll-independent) -->
        <x-side-bar />

        <!-- Right Pane -->
        <div class="flex flex-col w-[85%] h-full">
            <x-search-bar />
         
            <!-- Donor Table Area (scrollable) -->
            <div class="flex-grow overflow-y-auto p-5 bg-gray-800 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                <h3 class="text-lg mb-4 font-medium text-gray-200 flex items-center gap-2">
                    <i class="fa-solid fa-people-arrows text-emerald-400"></i>
                    <span>Donor List</span>
                </h3>

                <div class="overflow-y-auto max-h-full scrollbar-none">
                    <table class="w-full border-collapse font-roboto text-sm">
                        <thead>
                            <tr class="sticky top-0 bg-gray-800 z-10">
                                <th class="py-3 px-3 border-b border-gray-700 text-gray-300 font-semibold text-left w-[50%]">
                                    Name</th>
                                <th class="py-3 px-3 border-b border-gray-700 text-gray-300 font-semibold text-center w-[30%]">
                                    Status</th>
                                <th class="py-3 px-3 border-b border-gray-700 text-gray-300 font-semibold text-center w-[20%]">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <!-- Approved Donor -->
                            <tr class="hover:bg-gray-700/50 transition-colors group">
                                <!-- Name Column -->
                                <td class="py-3 px-3 text-gray-300">
                                    <div class="flex items-center gap-3">
                                        <div class="relative">
                                            <img src="images/gojo.jpg" alt="user"
                                                class="w-8 h-8 rounded-full border-2 border-gray-600 group-hover:border-cyan-400 object-cover transition-colors" />
                                        </div>
                                        <span class="group-hover:text-cyan-400 transition-colors">Violin</span>
                                    </div>
                                </td>

                                <!-- Status Column -->
                                <td class="py-3 px-3 text-center">
                                    <span class="status-badge approved">Approved</span>
                                </td>

                                <!-- Actions Column -->
                                <td class="py-3 px-3 text-center">
                                    <div class="flex justify-center gap-1">
                                        <x-tooltip-button peerClass="view" tooltipText="View" icon="fa-eye"
                                            hoverColor="cyan-400" />
                                        <x-tooltip-button peerClass="edit" tooltipText="Edit" icon="fa-pen-to-square"
                                            hoverColor="emerald-400" />
                                        <x-tooltip-button peerClass="delete" tooltipText="Delete" icon="fa-trash"
                                            hoverColor="rose-500" />
                                        <x-tooltip-button peerClass="ban" tooltipText="Ban" icon="fa-ban"
                                            hoverColor="rose-500" />
                                    </div>
                                </td>

                            </tr>

                            <!-- Pending Donor -->
                            <tr class="hover:bg-gray-700/50 transition-colors group">
                                <!-- Name Column -->
                                <td class="py-3 px-3 text-gray-300">
                                    <div class="flex items-center gap-3">
                                        <div class="relative">
                                            <img src="images/profile-1.jpg" alt="user"
                                                class="w-8 h-8 rounded-full border-2 border-gray-600 group-hover:border-cyan-400 object-cover transition-colors" />
                                        </div>
                                        <span class="group-hover:text-cyan-400 transition-colors">Lynx</span>
                                    </div>
                                </td>

                                <!-- Status Column -->
                                <td class="py-3 px-3 text-center">
                                    <span class="status-badge pending">Pending</span>
                                </td>

                                <!-- Actions Column -->
                                <td class="py-3 px-3 text-center">
                                    <div class="flex justify-center gap-1">
                                        <x-tooltip-button peerClass="view" tooltipText="View" icon="fa-eye"
                                            hoverColor="cyan-400" />
                                        <x-tooltip-button peerClass="approve" tooltipText="Approve" icon="fa-check"
                                            hoverColor="emerald-400" />
                                        <x-tooltip-button peerClass="reject" tooltipText="Approve" icon="fa-xmark"
                                            hoverColor="rose-500" />

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
