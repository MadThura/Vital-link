<x-layout title="sp">
    <div class="flex w-full h-screen text-black overflow-hidden">
        <!-- Your existing sidebar would go here -->
        <aside
            class="w-[15%] bg-gradient-to-b from-gray-900 to-gray-800 border-r border-gray-700 flex flex-col justify-between">
            <div>
                <div class="text-center mb-8">
                    <img src="/images/logo.png" alt="RedLink Logo"
                        class="w-[100px] h-[100px] object-contain rounded-lg mx-auto">
                    <h2
                        class="text-xl mt-2 font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
                        Vital Link</h2>
                </div>

                <nav aria-label="Main navigation" class="flex flex-col gap-2">
                    <a href="/profile">
                        <div class="flex items-center justify-center h-full w-full">
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors">
                                    name
                                </p>
                                <p class="text-xs text-gray-500 hover:text-gray-400 transition-colors">
                                    role
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('super-admin') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4 border-cyan-400 bg-gray-700/50}}">
                        <i
                            class="fa-solid fa-house text-gray-400 group-hover:text-cyan-400 }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">Dashboard</span>
                    </a>

                    <a href="{{ route('blog-board') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4  border-cyan-400 bg-gray-700/50">

                        <i
                            class="fa-solid fa-blog text-gray-400 group-hover:text-cyan-400 text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">Blog Board</span>
                    </a>
                    <a href="{{ route('user-management') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4  border-transparent">
                        <i
                            class="fa-solid fa-square-poll-horizontal text-gray-400 {{ request()->routeIs('show') ? 'text-cyan-400' : 'group-hover:text-cyan-400' }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">User Management</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-rose-500 transition-all group border-l-4 border-transparent hover:border-rose-500 mt-4 w-full text-left">
                            <i
                                class="fa-solid fa-arrow-right-from-bracket text-gray-400 group-hover:text-rose-500 text-base transition-colors"></i>
                            <span class="group-hover:translate-x-1 transition-transform">Logout</span>
                        </button>
                    </form>
                </nav>
            </div>


            <footer class="text-sm text-center text-gray-400 border-t border-gray-700 pt-5 mt-5">
                <p>Role: <strong
                        class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">role</strong>
                </p>
                <p class="text-xs mt-1 text-gray-500">v1.0.1</p>
            </footer>
        </aside>

        <div class="flex flex-col w-[85%]">
            <!-- Dark Theme Header -->
            <header class="flex items-center justify-between bg-gray-900 shadow-lg p-4">
                <!-- Back to Home Button -->
                <div class="flex items-center">
                    <a href="/"
                        class="flex items-center text-gray-300 hover:text-blue-400 transition-colors duration-200">
                        <i class="fa-solid fa-home mr-3 hover:scale-110 transition-transform"></i>
                        <span class="hover:drop-shadow-[0_0_8px_rgba(96,165,250,0.6)]">Home</span>
                    </a>
                </div>

                <!-- Notification and Profile Section -->
                <div class="flex items-center space-x-4">
                    <!-- Notification Icon -->
                    <div x-data="{
                        open: false,
                        notifications: [{
                                id: 1,
                                name: 'Dr. Marcus Wright',
                                email: 'm.wright@neonmed.org',
                                hospital: 'Neon Medical Center',
                                ward: 'Neuro Ward 7X',
                                position: 'Lead Neuro Operator',
                                requestTime: 'Today, 22:47',
                                avatar: 'MW'
                            },
                            {
                                id: 2,
                                name: 'Dr. Elena Kurosawa',
                                email: 'e.kurosawa@neonmed.org',
                                hospital: 'Neon Surgical Unit',
                                ward: 'OR 5 - Robotics',
                                position: 'Senior Surgical Operator',
                                requestTime: 'Today, 20:15',
                                avatar: 'EK'
                            }
                        ],
                        unreadCount: 2,
                        togglePane() {
                            this.open = !this.open;
                            if (this.open) this.unreadCount = 0;
                        }
                    }" class="relative inline-block">
                        <!-- Notification Bell -->
                        <button @click="togglePane()"
                            class="relative p-2 text-gray-300 hover:text-cyan-400 focus:outline-none transition-colors duration-200 group">
                            <div class="text-xl transform group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-bell"></i>
                            </div>
                            <span x-show="unreadCount > 0" x-text="unreadCount"
                                class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-cyan-400 rounded-full transform translate-x-1/2 -translate-y-1/2 ring-2 ring-gray-900">
                            </span>
                        </button>

                        <x-superadmin-noti />
                    </div>
                    <!-- Profile Information -->
                    <div class="flex items-center space-x-3 group cursor-pointer">
                        <div class="relative h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 p-0.5">
                            <div class="h-full w-full rounded-full bg-gray-800 overflow-hidden border border-gray-700">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile"
                                    class="h-full w-full object-cover">
                            </div>
                        </div>
                        <div class="text-right hidden md:block">
                            <p class="font-medium text-white group-hover:text-blue-400 transition-colors">John Doe</p>
                            <p class="text-xs text-gray-400 group-hover:text-blue-300 transition-colors">Administrator
                            </p>
                        </div>

                    </div>
                </div>
            </header>

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
                <div
                    class="flex-1 overflow-y-auto pr-2 scrollbar-none scrollbar-thumb-gray-700 scrollbar-track-gray-800/50">
                    <!-- Featured Blog Gallery (Auto-scrolling) -->
                    <div class="mb-10 relative group">
                        <h2
                            class="text-xl font-semibold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-indigo-300 to-purple-300">
                            Featured Posts</h2>
                        <div class="relative h-64 overflow-hidden rounded-xl">
                            <!-- Gallery Container -->
                            <div id="blogGallery" class="flex h-full transition-transform duration-1000 ease-in-out">
                                <!-- Slide 1 -->
                                <div class="min-w-full h-full relative rounded-xl overflow-hidden shadow-lg">
                                    <!-- Dark overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-purple-900/70 z-10">
                                    </div>

                                    <!-- Event photo -->
                                    <img src="/images/bg-1.jpg" alt="Upcoming Event" class="w-full h-full object-cover">

                                    <!-- Content -->
                                    <div class="absolute bottom-0 left-0 z-20 p-6 w-full">

                                        <h3 class="text-2xl font-bold text-white mb-2">Summer Music Festival 2025</h3>
                                        <p class="text-gray-300 mb-4">Join us for an unforgettable evening of music,
                                            lights, and celebration.</p>
                                        <button
                                            class="px-4 py-2 bg-white/10 backdrop-blur-sm text-white rounded-lg border border-white/20 hover:bg-white/20 transition-all">
                                            View Details
                                        </button>
                                    </div>
                                </div>
                                <!-- Slide 2 -->
                                <div class="min-w-full h-full relative rounded-xl overflow-hidden shadow-lg">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-purple-900/70 to-pink-900/70 z-10">
                                    </div>
                                    <img src="/images/bg-2.jpg" alt="UX Design" class="w-full h-full object-cover">
                                    <div class="absolute bottom-0 left-0 z-20 p-6 w-full">

                                        <h3 class="text-2xl font-bold text-white mb-2">UX Psychology Fundamentals</h3>
                                        <p class="text-gray-300 mb-4">How cognitive psychology influences modern user
                                            experience design</p>
                                        <button
                                            class="px-4 py-2 bg-white/10 backdrop-blur-sm text-white rounded-lg border border-white/20 hover:bg-white/20 transition-all">
                                            Read Article
                                        </button>
                                    </div>
                                </div>
                                <!-- Slide 3 -->
                                <div class="min-w-full h-full relative rounded-xl overflow-hidden shadow-lg">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-cyan-900/70 z-10">
                                    </div>
                                    <img src="images/bg-3.jpg" alt="Coding" class="w-full h-full object-cover">
                                    <div class="absolute bottom-0 left-0 z-20 p-6 w-full">

                                        <h3 class="text-2xl font-bold text-white mb-2">Clean Code Architecture</h3>
                                        <p class="text-gray-300 mb-4">Best practices for building maintainable and
                                            scalable applications</p>
                                        <button
                                            class="px-4 py-2 bg-white/10 backdrop-blur-sm text-white rounded-lg border border-white/20 hover:bg-white/20 transition-all">
                                            Read Article
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Gallery Navigation -->
                            <div class="absolute bottom-4 right-4 z-20 flex space-x-2" id="galleryNav">
                                <button class="w-3 h-3 rounded-full bg-white/70 gallery-dot" data-index="0"></button>
                                <button
                                    class="w-3 h-3 rounded-full bg-white/30 hover:bg-white/50 transition-all gallery-dot"
                                    data-index="1"></button>
                                <button
                                    class="w-3 h-3 rounded-full bg-white/30 hover:bg-white/50 transition-all gallery-dot"
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
                                    <div
                                        class="relative z-10 p-6 flex flex-col h-full bg-gray-800/40 backdrop-blur-sm">
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
                                    <x-view-blog-dialog />

                                    <!-- Edit Blog Dialog -->
                                    <x-edit-blog-dialog />
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
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

</x-layout>
