<x-layout title="Verify Email">
    <div class="w-full h-full flex items-center justify-center">
        <div class="w-full max-w-md px-6 py-8 bg-gray-900 bg-opacity-80 rounded-lg shadow-xl backdrop-blur-sm">
        <!-- Header with icon -->
        <div class="text-center mb-6">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 mb-4">
                <i class="fas fa-envelope text-blue-600 text-xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white">Verify Your Email Address</h2>
        </div>

        <!-- Message -->
        <div class="mb-6 text-sm text-gray-300 text-center">
            Thanks for signing up! Before getting started, please verify your email address by clicking on the link we
            just
            emailed to you at <span class="font-semibold text-white">{{ auth()->user()->email ?? 'your email' }}</span>.
        </div>

        <!-- Success message -->
        @if (session('message'))
            <div class="mb-6 p-3 bg-green-500 bg-opacity-20 text-green-300 text-sm rounded-md">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <!-- Verification form -->
        <form method="POST" action="{{ route('verification.send') }}" class="space-y-6">
            @csrf
            <div class="flex flex-col items-center">
                <button type="submit"
                    class="w-full flex justify-center items-center px-4 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    Resend Verification Email
                </button>

                <!-- Logout option -->
                <div class="mt-4 text-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-400 hover:text-white">
                            Sign out and use different email
                        </button>
                    </form>
                </div>
            </div>
        </form>

        <!-- Loading indicator (hidden by default) -->
        <div id="loadingIndicator" class="hidden mt-6 text-center">
            <div
                class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-blue-500 border-r-transparent">
            </div>
            <p class="mt-2 text-sm text-gray-400">Waiting for verification...</p>
        </div>
    </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('loadingIndicator').classList.remove('hidden');
        });
    </script>
</x-layout>
