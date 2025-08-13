<div x-show="showEditDialog" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
    <div class="bg-gray-800 rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <form class="p-6" @submit.prevent="submitForm">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-2xl font-bold text-white">Edit Blog Post</h3>
                <button @click="showEditDialog = false" type="button" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-gray-300 mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ $blog->title }}"
                        class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Featured Image</label>
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Current"
                            class="w-32 h-20 object-cover rounded-lg">
                        <div id="feature-preview"
                            class="relative w-32 h-20 bg-gray-700 border-2 border-dashed border-gray-600 bg-center bg-cover bg-no-repeat rounded-lg flex items-center justify-center text-gray-400 text-sm">
                            No image selected
                        </div>
                        <div>
                            <input type="file" id="featured-image" name="image" class="hidden" accept="image/*">
                            <label for="featured-image"
                                class="cursor-pointer px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors">
                                Change Image
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-gray-300 mb-2">Content</label>
                    <textarea id="content" name="content" rows="5"
                        class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 scrollbar-none">
                        {{ $blog->body }}
                    </textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-700">
                    <button @click="showEditDialog = false" type="button"
                        class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const featurePreview = document.getElementById('feature-preview');
    const featurePicInput = document.getElementById('featured-image');

    featurePicInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.match('image.*')) {
            const reader = new FileReader();
            reader.onload = function(event) {
                // Clear previous content
                featurePreview.innerHTML = '';
                featurePreview.style.backgroundImage = `url(${event.target.result})`;
                
                // Add overlay text
                const overlay = document.createElement('div');
                overlay.className = 'absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center text-white text-xs';
                overlay.textContent = 'New Image';
                featurePreview.appendChild(overlay);
                
                // Update border styling
                featurePreview.classList.remove('border-dashed');
                featurePreview.classList.add('border-solid', 'border-indigo-500');
            }
            reader.readAsDataURL(file);
        } else {
            // Reset to default state
            featurePreview.style.backgroundImage = '';
            featurePreview.innerHTML = 'No image selected';
            featurePreview.classList.add('border-dashed');
            featurePreview.classList.remove('border-solid', 'border-indigo-500');
        }
    });
</script>
