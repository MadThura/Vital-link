{{-- resources/views/approved-notification.blade.php --}}
@php
    $data = json_decode($notification->data, true);
@endphp
<x-layout title="Approved By {{$data['blood_bank_name']}}">
    <div class="h-full flex items-center justify-center">
        <div class="bg-gray-700 max-w-md w-full rounded-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-800 to-emerald-700 p-6 relative">
                
                <div class="flex items-center">
                    <div class="glow bg-emerald-700/30 p-3 rounded-full backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h1 class="ml-4 text-xl font-bold text-white">Appointment Approved</h1>
                </div>
                <p class="mt-2 text-emerald-200">by {{ $data['blood_bank_name'] }} </p>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Date information -->
                <div class="flex items-center bg-slate-800/50 p-4 rounded-lg mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-400">Scheduled Date</p>
                        <p class="font-semibold text-white">{{ $data['date'] }} {{$data['time']}}</p>
                    </div>
                </div>

                <!-- QR Code section -->
                <div class="text-center mb-6">
                    <p class="text-sm text-gray-400 mb-3">Scan QR code at donation center</p>
                    <div class="inline-block p-4 bg-slate-800 rounded-xl">
                        <img src="{{ $qrCodeUrl }}" alt="QR Code" class="w-40 h-40 mx-auto">
                    </div>
                </div>

                <!-- Notification timestamp -->
                <div class="text-center mb-6">
                    <p class="text-xs text-gray-500">
                        {{ \Carbon\Carbon::parse($notification->created_at)->format('F j, Y, g:i A') }}
                    </p>
                </div>

                <!-- Action button -->
                <div class="flex justify-center">
                    <a href="{{ url()->previous() }}"
                        class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-all duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Go Back
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-slate-900/70 p-4 text-center border-t border-slate-700/50">
                <p class="text-xs text-gray-500">Thank you for your life-saving contribution!</p>
            </div>
        </div>
    </div>
</x-layout>
