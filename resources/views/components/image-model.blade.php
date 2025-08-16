<div
    x-data="{ open: false, src: '', alt: '' }"
    x-on:open-image-modal.window="open = true; src = $event.detail.src; alt = $event.detail.alt"
    x-show="open"
    style="display: none;"
    class="fixed inset-0 z-50 p-5 flex items-center justify-center bg-black bg-opacity-75"
    @click.away="open = false"
>
    <button @click="open = false" class="absolute top-3 right-3 text-white text-xl font-bold hover:text-red-500"><i class="fa-solid fa-xmark"></i></button>
    <div class="relative max-w-[95vw] max-h-[90vh] p-2">
        
        <img :src="src" :alt="alt" class="max-w-full max-h-[80vh] rounded-lg object-contain shadow-lg" />
    </div>
</div>
