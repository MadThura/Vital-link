@props(['donor' => null])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalLink | Blood Donation Network</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
</head>

<body class="bg-[#DFE3EE] dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans min-h-screen overflow-y-auto scrollbar-none transition-colors duration-300">    
    <x-nav-bar :donor="$donor ?? null" />
    {{ $slot }}
    <x-footer />
</body>


</html>

