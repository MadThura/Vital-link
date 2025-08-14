<div x-show="showViewDialog" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
    <div @click.away="showViewDialog = false"
        class="bg-gray-800 rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-2xl font-bold text-white">{{ $blog->title }}</h3>
                <button @click="showViewDialog = false" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <img src="{{ asset('storage/' . $blog->image) }}" alt="Event" class="w-full h-64 object-cover rounded-lg mb-6">

            <div class="prose prose-invert max-w-none max-h-44 overflow-y-auto scrollbar-none">
                {{$blog->body}}
            </div>

            <div class="mt-6 pt-4 border-t border-gray-700 flex items-center justify-between">
                <div class="flex items-center space-x-2 text-gray-400">
                    <i class="fa-regular fa-clock"></i>
                    <span>{{ $blog->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
