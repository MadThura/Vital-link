<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 text-gray-200 font-[Segoe_UI] h-screen overflow-hidden bg-cover bg-center"
    @if (isset($backgroundImage)) style="background-image: url('{{ asset($backgroundImage) }}')" @endif>
    <div class="h-full overflow-y-auto flex items-center justify-center">
        {{ $slot }}
    </div>
</body>

</html>
