<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{$title}}</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="m-0 text-gray-200 font-[Segoe_UI] h-screen overflow-hidden bg-cover bg-center"
    @if (isset($backgroundImage)) style="background-image: url('{{ asset($backgroundImage) }}')" @endif>
    <div class="h-full overflow-y-auto flex items-center justify-center scrollbar-none">
        {{ $slot }}
    </div>
</body>

</html>
