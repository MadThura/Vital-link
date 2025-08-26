@if (session('success') || session('fail'))
<div x-data="{ show: true }" 
     x-cloak
     x-show="show"
     x-init="setTimeout(() => show = false, 3500)"
     x-transition:leave="transition transform ease-in duration-500"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 -translate-y-12"
     class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md shadow-xl rounded-xl overflow-hidden">
    
    <div class="{{ session('success') ? 'bg-green-100 text-green-800' : 'bg-rose-100 text-rose-800' }} flex items-start justify-between gap-4 px-6 py-4">
        <span class="text-base font-medium">
            {{ session('success') ?? session('fail') }}
        </span>
        <button @click="show = false"
                class="text-gray-600 hover:text-black transition cursor-pointer">&times;</button>
    </div>
</div>
@endif
