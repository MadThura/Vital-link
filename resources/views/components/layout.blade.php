<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 text-[#180705] font-roboto h-screen overflow-hidden bg-[#F3F0F0]">
    {{ $slot }}
</body>

</html>