<!-- Notification Pane -->
<div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-1"
    class="fixed right-4 top-16 w-96 bg-gray-900 rounded-lg shadow-xl border border-gray-700 z-50 backdrop-blur-sm bg-opacity-95">

    <!-- Header -->
    <div class="flex items-center justify-between p-4 border-b border-gray-800 bg-gray-800/50 rounded-t-lg">
        <h3 class="font-semibold text-gray-200 flex items-center">
            <i class="fas fa-user-lock text-cyan-400 mr-2"></i>
            <span>Access Permissions</span>
        </h3>
        <button @click="open = false" class="text-gray-400 hover:text-cyan-400 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Content -->
    <div class="max-h-[500px] overflow-y-auto scrollbar-thin scrollbar-thumb-cyan-400/30 scrollbar-track-gray-800/50">
        <template x-if="notifications.length === 0">
            <div class="p-8 text-center">
                <i class="fas fa-bell-slash text-gray-600 text-3xl mb-3"></i>
                <p class="text-sm text-gray-400">All systems nominal</p>
            </div>
        </template>

        <template x-for="notification in notifications" :key="notification.id">
            <div class="p-4 border-b border-gray-800 hover:bg-gray-800/50 transition-colors duration-150">
                <div class="flex items-start space-x-3">
                    <!-- Avatar -->
                    <div
                        class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-white font-medium text-sm shadow-md">
                        <span x-text="notification.avatar"></span>
                    </div>

                    <!-- Info -->
                    <div class="flex-1 min-w-0 space-y-2">
                        <div class="flex justify-between items-start">
                            <h4 class="text-sm font-medium text-cyan-400 truncate" x-text="notification.name"></h4>
                            <span class="text-xs text-gray-400 font-mono" x-text="notification.requestTime"></span>
                        </div>

                        <div class="grid grid-cols-1 gap-1 text-xs">
                            <div class="flex items-baseline">
                                <span class="text-gray-500 font-mono text-xxs w-16 flex-shrink-0">HOSPITAL</span>
                                <span class="text-gray-300 truncate" x-text="notification.hospital"></span>
                            </div>
                            <div class="flex items-baseline">
                                <span class="text-gray-500 font-mono text-xxs w-16 flex-shrink-0">WARD</span>
                                <span class="text-gray-300 truncate" x-text="notification.ward"></span>
                            </div>
                            <div class="flex items-baseline">
                                <span class="text-gray-500 font-mono text-xxs w-16 flex-shrink-0">POSITION</span>
                                <span class="text-gray-300 truncate" x-text="notification.position"></span>
                            </div>
                            <div class="flex items-baseline">
                                <span class="text-gray-500 font-mono text-xxs w-16 flex-shrink-0">Email</span>
                                <span class="text-gray-300 truncate font-mono" x-text="notification.email"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Footer -->
    <div class="p-3 border-t border-gray-800 text-center bg-gray-900/50 rounded-b-lg">
        <a href="#"
            class="text-xs font-medium text-cyan-400 hover:text-cyan-300 transition-colors inline-flex items-center justify-center">
            <i class="fas fa-history mr-1"></i>
            <span>Access History</span>
        </a>
    </div>
</div>
