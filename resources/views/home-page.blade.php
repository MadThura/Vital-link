<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($donor->status === 'rejected')
        <a href="">Edit and Resubmit</a>
    @elseif($donor->status === 'pending')
        <p>pending</p>
    @else
        <p>approved</p>
    @endif
</body>

</html>
