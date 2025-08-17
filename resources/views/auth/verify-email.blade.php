<x-layout title="Verify Email">
    <div class="w-full h-full flex items-center justify-center">
        <div class="w-full max-w-md px-6 py-8 bg-white rounded-xl shadow-xl">

            <!-- Header with icon -->
            <div class="text-center mb-6">
                <div
                    class="mx-auto flex items-center justify-center h-12 w-12 rounded-lg bg-gradient-to-br from-[#E91815]/20 to-[#690D0B]/20 mb-4 border border-[#DAD0D0] shadow-inner">
                    <i class="fas fa-envelope text-[#E91815] text-xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-[#180705]">Verify Your Email Address</h2>
            </div>

            <!-- Message -->
            <div class="mb-6 text-sm text-[#180705]/90 text-center">
                Thanks for signing up! Before getting started, please verify your email address by clicking on the link we
                just emailed to you at <span class="font-semibold text-[#690D0B]">{{ auth()->user()->email ?? 'your email' }}</span>.
            </div>

            <!-- Success message -->
            @if (session('message'))
                <div class="mb-6 p-3 bg-green-100 text-green-700 text-sm rounded-md">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <!-- Verification form -->
            <form method="POST" action="{{ route('verification.send') }}" class="space-y-6">
                @csrf
                <div class="flex flex-col items-center">
                    <button type="submit"
                        class="w-full flex justify-center items-center px-4 py-3 bg-gradient-to-r from-[#E91815] to-[#690D0B] text-white font-medium rounded tracking-widest text-sm hover:from-[#690D0B] hover:to-[#E91815] hover:shadow-lg hover:shadow-[#E91815]/30 transition">
                        Resend Verification Email
                    </button>

                    <!-- Logout option -->
                    <div class="mt-4 text-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-[#690D0B] hover:text-[#E91815] transition-colors">
                                Sign out and use different email
                            </button>
                        </form>
                    </div>
                </div>
            </form>

            <!-- Loading indicator (hidden by default) -->
            <div id="loadingIndicator" class="hidden mt-6 text-center">
                <div
                    class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-[#E91815] border-r-transparent">
                </div>
                <p class="mt-2 text-sm text-[#690D0B]/70">Waiting for verification...</p>
            </div>

        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('loadingIndicator').classList.remove('hidden');
        });
    </script>
</x-layout>
