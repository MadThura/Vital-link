<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Donation Certificate</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .certificate {
            border: 5px solid #d32f2f;
            padding: 30px;
            text-align: center;
        }
        h1 { color: #d32f2f; }
    </style>
</head>
<body>
    <div class="certificate">
        <h1>Blood Donation Certificate</h1>
        <p>This is to certify that</p>
        <h2>{{ $donor->name }}</h2>
        <p>donated blood on <b>{{ $donation->donation_date }}</b></p>
        <p>at <b>{{ $donation->bloodBank->name }}</b></p>
        <br>
        <p>Donation ID: {{ $donation->id }}</p>
    </div>
</body>
</html>
