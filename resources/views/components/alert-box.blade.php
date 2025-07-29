@if (session('status') === 'success')
    <div id="alertBox"
         class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md shadow-xl rounded-xl overflow-hidden">
        <div class="bg-green-100 text-green-800 flex items-start justify-between gap-4 px-6 py-4">
            <span class="text-base font-medium">
                Action completed successfully!
            </span>
            <button onclick="document.getElementById('alertBox').style.display='none'"
                    class="text-gray-600 hover:text-black transition cursor-pointer">
                &times;
            </button>
        </div>
    </div>
@elseif (session('status') === 'fail')
    <div id="alertBox"
         class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md shadow-xl rounded-xl overflow-hidden">
        <div class="bg-rose-100 text-rose-800 flex items-start justify-between gap-4 px-6 py-4">
            <span class="text-base font-medium">
                Action failed. Please try again.
            </span>
            <button onclick="document.getElementById('alertBox').style.display='none'"
                    class="text-gray-600 hover:text-black transition cursor-pointer">
                &times;
            </button>
        </div>
    </div>
@endif
