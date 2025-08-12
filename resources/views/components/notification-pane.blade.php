<!-- Notification Pane -->
<div x-show="showNotifications" @click.away="showNotifications = false"
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
    class="absolute right-0 mt-2 w-80 bg-[#1e1e1e] border border-[#333] rounded-lg shadow-lg z-50">
    <!-- Header -->
    <div class="flex items-center justify-between px-4 py-3 border-b border-[#333]">
        <h3 class="text-lg font-medium text-[#a5f3fc]">Notifications</h3>
        <button @click="showNotifications = false" class="text-[#7a7a7a] hover:text-[#a5f3fc]">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Notification List -->
    <div class="max-h-96 overflow-y-auto scrollbar-none">
        <!-- Sample Notification Items -->
        <div class="px-4 py-3 hover:bg-[#262626] border-b border-[#333]">
            <div class="flex items-start">
                <div class="flex-shrink-0 text-[#3b82f6]">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-[#f3f4f6]">New update available</p>
                    <p class="text-xs text-[#9ca3af] mt-1">Version 2.0 is now available with
                        new features.</p>
                    <p class="text-xs text-[#6b7280] mt-1">2 hours ago</p>

                    <!-- Action Buttons with Icons -->
                    <div class="flex space-x-2 mt-2">
                        <button
                            class="flex items-center px-3 py-1 text-xs font-medium rounded-md bg-[#1e40af] text-[#f3f4f6] hover:bg-[#1e3a8a] transition">
                            <i class="fas fa-check mr-1"></i> Accept
                        </button>
                        <button
                            class="flex items-center px-3 py-1 text-xs font-medium rounded-md bg-[#262626] text-[#f3f4f6] hover:bg-[#333] border border-[#333] transition">
                            <i class="fas fa-times mr-1"></i> Deny
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 py-3 hover:bg-[#262626] border-b border-[#333] cursor-pointer">
            <div class="flex items-start">
                <div class="flex-shrink-0 text-[#10b981]">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-[#f3f4f6]">Task completed</p>
                    <p class="text-xs text-[#9ca3af] mt-1">Your recent task has been marked
                        as completed.</p>
                    <p class="text-xs text-[#6b7280] mt-1">5 hours ago</p>
                </div>
            </div>
        </div>

        <div class="px-4 py-3 hover:bg-[#262626] border-b border-[#333] cursor-pointer">
            <div class="flex items-start">
                <div class="flex-shrink-0 text-[#bf1a3e]">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-[#f3f4f6]">Warning</p>
                    <p class="text-xs text-[#9ca3af] mt-1">System maintenance scheduled for
                        tomorrow.</p>
                    <p class="text-xs text-[#6b7280] mt-1">1 day ago</p>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div class="px-4 py-6 text-center">
            <i class="mx-auto text-3xl text-[#4b5563] fas fa-bell-slash"></i>
            <p class="mt-2 text-sm text-[#9ca3af]">No new notifications</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="px-4 py-2 text-center bg-[#262626] rounded-b-lg">
        <a href="#" class="text-xs font-medium text-[#a5f3fc] hover:underline">View
            all notifications</a>
    </div>
</div>
