<!-- Modal Backdrop -->
<div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity z-50">
</div>

<!-- Modal Dialog -->
<div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
    @click.away="isOpen = false" class="fixed z-50 inset-0 flex items-center justify-center p-4">
    <div
        class="bg-gray-800 border border-gray-700 rounded-xl shadow-2xl overflow-hidden w-full max-w-2xl max-h-[90vh] flex flex-col">
        <!-- Header -->
        <div
            class="bg-gradient-to-r from-gray-900 to-gray-800 p-5 border-b border-gray-700 flex justify-between items-center flex-shrink-0">
            <h3 class="text-xl font-bold text-white flex items-center">
                <i class="fa-solid fa-pen-to-square mr-2 text-indigo-400"></i>
                Create New Post
            </h3>
            <button @click="isOpen = false" class="text-gray-400 hover:text-white transition-colors">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <!-- Body (scrollable) -->
        <form action="{{ route('blogs.store') }}" class="p-6 overflow-y-auto flex-grow scrollbar-none"
            enctype="multipart/form-data" method="POST">
            @csrf
            @method('post')
            <!-- Featured Image Upload -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Featured
                    Image</label>
                <div x-cloak @click="$refs.fileInput.click()"
                    class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:border-indigo-500 transition-colors group">
                    <template x-if="!previewImage">
                        <div class="space-y-2">
                            <i
                                class="fa-solid fa-cloud-arrow-up text-3xl text-gray-500 group-hover:text-indigo-400 transition-colors"></i>
                            <p class="text-sm text-gray-400">Click to upload or drag and drop
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                        </div>
                    </template>
                    <template x-if="previewImage">
                        <img :src="previewImage" alt="Preview" class="max-h-48 mx-auto rounded-lg object-cover">
                    </template>
                    <input x-ref="fileInput" @change="handleFileChange" name="image" type="file" class="hidden"
                        accept="image/*">
                </div>
            </div>

            <!-- Title -->
            <div class="mb-6">
                <label for="postTitle"  class="block text-sm font-medium text-gray-300 mb-2">Title</label>
                <input type="text" id="postTitle" name="title" 
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
            </div>

            <!-- Content -->
            <div class="mb-6">
                <label for="postContent" class="block text-sm font-medium text-gray-300 mb-2">Content</label>
                <textarea id="postContent" rows="6" name="body"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"></textarea>
            </div>

            <!-- Tags -->
            <div class="bg-gray-800/50 border-t border-gray-700 p-4 flex justify-end space-x-3 flex-shrink-0">
                <button @click="isOpen = false"
                    class="px-5 py-2.5 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors duration-200">
                    Cancel
                </button>
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 rounded-lg transition-all duration-200 shadow-md hover:shadow-indigo-500/30 flex items-center">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Publish Post
                </button>
            </div>

        </form>

    </div>
</div>
