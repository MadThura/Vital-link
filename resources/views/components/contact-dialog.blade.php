<div x-show="showContact" x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80">
    <!-- Contact Form -->
    <div x-show="showContact" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @click.away="showContact = false"
        class="w-full max-w-md bg-gray-800 rounded-lg shadow-xl border border-gray-700 absolute top-[50%] left-[50%] transform -translate-x-1/2 -translate-y-1/2">

        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">
            <h3 class="text-lg font-semibold text-white">Contact Us</h3>
            <button @click="showContact = false" class="text-gray-400 hover:text-white">
                ✕
            </button>
        </div>

        <!-- Form -->
        <form class="p-6 space-y-4">
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input type="email" required
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="your@email.com">
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Phone</label>
                <input type="tel"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="+1 (___) ___-____">
            </div>

            <!-- Message -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                <textarea rows="4" required
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="How can we help?"></textarea>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded transition">
                Send Message
            </button>
        </form>

        <!-- Footer -->
        <div class="px-6 py-3 text-center text-xs text-gray-500 border-t border-gray-700">
            We'll respond within 24 hours
        </div>
    </div>
</div>
