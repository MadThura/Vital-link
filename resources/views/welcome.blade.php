<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="bg-red-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Save Lives, Donate Blood</h1>
            <p class="text-xl mb-8">Join our community of heroes who give the gift of life</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="/donate"
                    class="bg-white text-red-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition">Donate
                    Now</a>
                <a href="/request"
                    class="border-2 border-white px-8 py-3 rounded-lg font-bold hover:bg-red-700 transition">Request
                    Blood</a>
            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <h3 class="text-4xl font-bold text-red-600">10,000+</h3>
                    <p class="text-gray-600">Lives Saved</p>
                </div>
                <div class="p-6">
                    <h3 class="text-4xl font-bold text-red-600">5,000+</h3>
                    <p class="text-gray-600">Active Donors</p>
                </div>
                <div class="p-6">
                    <h3 class="text-4xl font-bold text-red-600">200+</h3>
                    <p class="text-gray-600">Partner Hospitals</p>
                </div>
                <div class="p-6">
                    <h3 class="text-4xl font-bold text-red-600">24/7</h3>
                    <p class="text-gray-600">Emergency Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="bg-red-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <span class="text-red-600 text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Register</h3>
                    <p class="text-gray-600">Sign up as a donor or recipient in just a few minutes</p>
                </div>
                <div class="text-center p-6">
                    <div class="bg-red-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <span class="text-red-600 text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Connect</h3>
                    <p class="text-gray-600">Find matching blood types when needed</p>
                </div>
                <div class="text-center p-6">
                    <div class="bg-red-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <span class="text-red-600 text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Save Lives</h3>
                    <p class="text-gray-600">Complete the donation process at a certified center</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blood Types Info -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Blood Types We Need</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-red-600 text-white p-4 rounded-lg text-center">
                    <h3 class="text-xl font-bold">A+</h3>
                    <p class="text-sm">High Demand</p>
                </div>
                <div class="bg-red-600 text-white p-4 rounded-lg text-center">
                    <h3 class="text-xl font-bold">O+</h3>
                    <p class="text-sm">Most Needed</p>
                </div>
                <div class="bg-red-600 text-white p-4 rounded-lg text-center">
                    <h3 class="text-xl font-bold">B-</h3>
                    <p class="text-sm">Rare</p>
                </div>
                <div class="bg-red-600 text-white p-4 rounded-lg text-center">
                    <h3 class="text-xl font-bold">AB</h3>
                    <p class="text-sm">Universal Plasma</p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="/blood-types" class="text-red-600 font-bold hover:underline">Learn more about blood types →</a>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Latest From Our Blog</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/images/blog1.jpg" alt="Blood donation" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-sm text-red-600">Donor Stories</span>
                        <h3 class="text-xl font-bold my-2">Why I Donate Every 8 Weeks</h3>
                        <p class="text-gray-600 mb-4">Hear from regular donors about their experiences and
                            motivations...
                        </p>
                        <a href="/blog/why-i-donate" class="text-red-600 font-bold hover:underline">Read More →</a>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/images/blog2.jpg" alt="Blood donation" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-sm text-red-600">Health Tips</span>
                        <h3 class="text-xl font-bold my-2">Preparing for Your First Donation</h3>
                        <p class="text-gray-600 mb-4">Everything you need to know to make your first donation a
                            success...
                        </p>
                        <a href="/blog/first-donation" class="text-red-600 font-bold hover:underline">Read More →</a>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/images/blog3.jpg" alt="Blood donation" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-sm text-red-600">News</span>
                        <h3 class="text-xl font-bold my-2">Summer Blood Shortage Alert</h3>
                        <p class="text-gray-600 mb-4">How seasonal changes affect blood supply and what you can do to
                            help...</p>
                        <a href="/blog/summer-shortage" class="text-red-600 font-bold hover:underline">Read More →</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="/blog"
                    class="bg-red-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-red-700 transition">View All
                    Posts</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-red-600 text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Stories of Hope</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-6 bg-red-700 rounded-lg">
                    <p class="italic mb-4">"Thanks to the generous donors through this platform, my daughter received
                        the
                        blood she needed for her surgery. Forever grateful!"</p>
                    <p class="font-bold">- Maria G., Recipient's Mother</p>
                </div>
                <div class="p-6 bg-red-700 rounded-lg">
                    <p class="italic mb-4">"Donating blood is the easiest way to make a huge difference. The process
                        was
                        simple and the staff made me feel like a hero."</p>
                    <p class="font-bold">- David T., Regular Donor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Make a Difference?</h2>
            <p class="text-xl mb-8">Every donation can save up to 3 lives. Join our community today.</p>
            <a href="/register"
                class="bg-red-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-red-700 transition">Become a
                Donor</a>
        </div>
    </section>

</body>

</html>
