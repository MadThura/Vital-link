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
                    <input type="text" id="title" name="title" value="2025 Summer Music Trends"
                        class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Featured Image</label>
                    <div class="flex items-center space-x-4">
                        <!-- Always show the current image (bg-3.jpg) -->
                        <img src="/images/bg-3.jpg" alt="Current" class="w-32 h-20 object-cover rounded-lg">
                        <!-- Preview div -->
                        <div id="profile-preview"
                            class="w-32 h-20 bg-gray-200 bg-center bg-cover rounded-lg flex items-center justify-center text-gray-500 text-center">
                            No image selected
                        </div>
                        <div>
                            <!-- Hidden file input -->
                            <input type="file" id="featured-image" name="featured_image"
                                class="hidden">
                            <!-- Label styled as button -->
                            <label for="featured-image"
                                class="cursor-pointer px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors">
                                Change Image
                        </div>
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-gray-300 mb-2">Content</label>
                    <textarea id="content" name="content" rows="8"
                        class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 scrollbar-none">
Explore the hottest music and event styles shaping this summer's festival season. From tropical house making a comeback to the rise of AI-generated performances, this year promises to be unforgettable.

Festival organizers are incorporating more immersive experiences, with virtual reality stages and interactive art installations becoming standard features at major events.

The trend towards sustainability continues, with more festivals implementing zero-waste policies and carbon offset programs.
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
    const profilePreview = document.getElementById('profile-preview');
    const profilePicInput = document.getElementById('featured-image');

    profilePicInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                profilePreview.style.backgroundImage = `url(${event.target.result})`;
                profilePreview.textContent = ''; // remove text when image is loaded
            }
            reader.readAsDataURL(file);
        } else {
            // No file selected, reset preview
            profilePreview.style.backgroundImage = '';
            profilePreview.textContent = 'No image selected';
        }
    });
</script>
