<x-layout title="Verify Email">
    <div class="mb-4 text-sm text-gray-600">
        Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just
        emailed to you.
    </div>

    @if (session('message'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                Resend Verification Email
            </button>
        </div>
    </form>
</x-layout>
