{{-- resources/views/approved-notification.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $notification->data['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-xl w-full bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 sm:p-10">
        <div class="flex items-center mb-6">
            <div class="flex-shrink-0">
                <div class="h-10 w-10 bg-green-500 text-white rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
            <h1 class="ml-4 text-xl sm:text-2xl font-bold text-gray-800 dark:text-gray-100">
                {{ $notification->data['title'] }}
            </h1>
        </div>

        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
            Scheduled Date: <span class="font-semibold">{{ $notification->data['date'] }}</span>
        </p>

        <p class="text-gray-700 dark:text-gray-200 mb-4">
            {{ $notification->data['note'] }}
        </p>

        <p class="text-[11px] text-gray-500 dark:text-gray-400 mb-6">
            {{ \Carbon\Carbon::parse($notification->created_at)->format('F j, Y, g:i A') }}
        </p>
        <img src="{{ $qrCodeUrl }}" alt="QR Code" class="w-36 h-36 rounded-lg shadow-md">



        <div class="flex justify-end">
            <a href="{{ url()->previous() }}"
                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow transition-colors">
                Go Back
            </a>
        </div>
    </div>

</body>

</html>
