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
    

    <!-- Footer -->
    <div class="px-4 py-2 text-center bg-[#262626] rounded-b-lg">
        <a href="#" class="text-xs font-medium text-[#a5f3fc] hover:underline">View
            all notifications</a>
    </div>
</div>
