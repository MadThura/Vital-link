<x-admin-layout title="SuperAdmin Dashboard">
    <!-- Blog Dashboard Container -->
    <div
        class="flex flex-col w-full h-full bg-gradient-to-br from-gray-900 to-gray-800 text-gray-100  p-8 backdrop-blur-sm border border-gray-700/50 overflow-hidden">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6 pb-6 border-b border-gray-700/50">
            <div>
                <h1
                    class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-500">
                    Blog Studio</h1>
            </div>
            <div x-data="{
                isOpen: false,
                featuredImage: null,
                previewImage: null,
                handleFileChange(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.featuredImage = file;
                        this.previewImage = URL.createObjectURL(file);
                    }
                }
            }" class="relative">
                <!-- Button to open the modal -->
                <button @click="isOpen = true" id="newPostBtn"
                    class="relative group bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white px-5 py-2.5 rounded-lg transition-all duration-300 flex items-center shadow-lg hover:shadow-indigo-500/40 hover:scale-[1.02] active:scale-95">
                    <span class="relative z-10 flex items-center">
                        <i class="fa-solid fa-plus mr-3"></i>
                        New Post
                    </span>
                    <span
                        class="absolute inset-0 bg-gradient-to-r from-indigo-700 to-purple-700 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></span>
                </button>

                <x-new-blog-dialog />
            </div>

        </div>

        <!-- Main Content Area (Scrollable) -->
        <div class="flex-1 overflow-y-auto pr-2 scrollbar-none scrollbar-thumb-gray-700 scrollbar-track-gray-800/50">
            <!-- Featured Blog Gallery (Auto-scrolling) -->
            <div class="mb-10 relative group">
                <h2
                    class="text-xl font-semibold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-indigo-300 to-purple-300">
                    Featured Posts</h2>
                <div class="relative h-64 overflow-hidden rounded-xl">
                    <!-- Gallery Container -->
                    <div id="blogGallery" class="flex h-full transition-transform duration-1000 ease-in-out">
                        <!-- Slides -->
                        @foreach ($randomBlogs as $blog)
                            <div class="min-w-full h-full relative rounded-xl overflow-hidden shadow-lg">
                                <!-- Dark overlay -->
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-purple-900/70 z-10">
                                </div>

                                <!-- Event photo -->
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Upcoming Event"
                                    class="w-full h-full object-cover">

                                <!-- Content -->
                                <div class="absolute bottom-0 left-0 z-20 p-6 w-full">

                                    <h3 class="text-2xl font-bold text-white mb-2">{{ $blog->title }}</h3>
                                    <p class="text-gray-300 mb-4">{{ $blog->body }}</p>
                                    <div x-data="{
                                        showViewDialog: false,
                                    }">
                                        <button @click="showViewDialog = true"
                                            class="px-4 py-2 bg-white/10 backdrop-blur-sm text-white rounded-lg border border-white/20 hover:bg-white/20 transition-all">
                                            View Details
                                        </button>
                                        <x-view-blog-dialog :blog="$blog"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Gallery Navigation -->
                    <div class="absolute bottom-4 right-4 z-20 flex space-x-2" id="galleryNav">
                        <button class="w-3 h-3 rounded-full bg-white/70 gallery-dot" data-index="0"></button>
                        <button class="w-3 h-3 rounded-full bg-white/30 hover:bg-white/50 transition-all gallery-dot"
                            data-index="1"></button>
                        <button class="w-3 h-3 rounded-full bg-white/30 hover:bg-white/50 transition-all gallery-dot"
                            data-index="2"></button>
                    </div>
                </div>
            </div>


            <!-- Blog Posts Grid -->
            <div class="mb-10">
                <h2
                    class="text-xl font-semibold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-indigo-300 to-purple-300">
                    Recent Posts</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Blog Post Card 1 -->
                    @foreach ($blogs as $blog)
                        <div x-data="{
                            showViewDialog: false,
                            showEditDialog: false,
                        }"
                            class="relative group rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                            <!-- Event photo -->
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Event"
                                class="absolute inset-0 w-full h-full object-cover z-0">

                            <!-- Dark overlay on hover -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-indigo-900/20 to-purple-900/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-0">
                            </div>

                            <!-- Card content -->
                            <div class="relative z-10 p-6 flex flex-col h-full bg-gray-800/40 backdrop-blur-sm">
                                <h3
                                    class="text-xl font-bold text-white mb-3 group-hover:text-indigo-300 transition-colors duration-200">
                                    {{ $blog->title }}
                                </h3>
                                <p class="text-gray-200 text-sm mb-6 flex-grow">
                                    {{ $blog->body }}
                                </p>
                                <div class="flex justify-between items-center text-sm text-white">
                                    <div class="flex items-center space-x-1">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>{{ $blog->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button @click="showViewDialog = true"
                                            class="text-white-400 hover:text-indigo-300 transition-colors">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button @click="showEditDialog = true"
                                            class="text-white hover:text-indigo-300 transition-colors">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white hover:text-indigo-300 transition-colors">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- View Blog Dialog -->
                            <x-view-blog-dialog :blog="$blog" />
                            <!-- Edit Blog Dialog -->
                            <x-edit-blog-dialog :blog="$blog"/>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-5">
                {{ $blogs->links() }}
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Auto-scrolling gallery
            const gallery = document.getElementById('blogGallery');
            const dots = document.querySelectorAll('.gallery-dot');
            let currentIndex = 0;
            const slideCount = document.querySelectorAll('#blogGallery > div').length;
            let autoScrollInterval;

            function goToSlide(index) {
                currentIndex = index;
                gallery.style.transform = `translateX(-${currentIndex * 100}%)`;

                // Update dots
                dots.forEach((dot, i) => {
                    if (i === currentIndex) {
                        dot.classList.remove('bg-white/30', 'hover:bg-white/50');
                        dot.classList.add('bg-white/70');
                    } else {
                        dot.classList.remove('bg-white/70');
                        dot.classList.add('bg-white/30', 'hover:bg-white/50');
                    }
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slideCount;
                goToSlide(currentIndex);
            }

            // Start auto-scrolling
            function startAutoScroll() {
                autoScrollInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
            }

            // Initialize gallery
            if (gallery && slideCount > 0) {
                // Set up dot navigation
                dots.forEach(dot => {
                    dot.addEventListener('click', (e) => {
                        e.preventDefault();
                        const index = parseInt(dot.getAttribute('data-index'));
                        goToSlide(index);
                        resetAutoScroll();
                    });
                });

                // Pause auto-scroll on hover
                gallery.parentElement.addEventListener('mouseenter', () => {
                    clearInterval(autoScrollInterval);
                });

                gallery.parentElement.addEventListener('mouseleave', () => {
                    startAutoScroll();
                });

                // Start auto-scroll
                startAutoScroll();
            }

            // Reset auto-scroll timer when user interacts
            function resetAutoScroll() {
                clearInterval(autoScrollInterval);
                startAutoScroll();
            }
        });
    </script>

</x-admin-layout>
