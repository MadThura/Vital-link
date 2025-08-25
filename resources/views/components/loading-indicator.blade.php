<!-- Loading Overlay -->
<div id="loadingIndicator" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex flex-col justify-center items-center z-50 opacity-0 pointer-events-none transition-opacity duration-500">
    <div class="relative flex flex-col items-center">
        <!-- Rotating Gradient Spinner -->
        <div class="w-24 h-24 relative">
            <!-- Only the border rotates (no white/gray background) -->
            <div class="absolute inset-0 rounded-full border-4 border-t-red-500 border-r-transparent border-b-red-500 border-l-transparent animate-spin shadow-[0_0_30px_rgba(239,68,68,0.5)]"></div>
            
            <!-- Static Center Logo -->
            <div class="w-full h-full flex justify-center items-center">
                <img src="/images/logo.png" alt="Logo" class="w-12 h-12 object-contain">
            </div>
        </div>

        <!-- Loading Text -->
        <p class="mt-6 text-white font-medium text-lg tracking-wide animate-pulse">Sending Notification...</p>
    </div>
</div>

<style>
/* Optional: subtle glowing pulse animation for the border */
@keyframes glow-spin {
    0% { box-shadow: 0 0 15px rgba(239,68,68,0.4); }
    50% { box-shadow: 0 0 25px rgba(239,68,68,0.6); }
    100% { box-shadow: 0 0 15px rgba(239,68,68,0.4); }
}
.animate-spin-shadow {
    animation: spin 1s linear infinite, glow-spin 2s ease-in-out infinite;
}
</style>

<script>
// Show loader on form submission
const searchForm = document.getElementById('searchForm');
const loader = document.getElementById('loadingIndicator');

searchForm.addEventListener('submit', function() {
    loader.classList.remove('opacity-0', 'pointer-events-none');
    loader.classList.add('opacity-100', 'pointer-events-auto');
});
</script>