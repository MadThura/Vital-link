<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donation Completed</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 650px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #ff4b4b, #d32f2f);
            color: white;
            padding: 30px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cpath fill='rgba(255,255,255,0.1)' d='M49.9,-46.2C65.2,-32.5,78.2,-16.2,78.8,0.6C79.4,17.4,67.6,34.8,52.3,47.3C37,59.8,18.5,67.4,1.4,66C-15.7,64.6,-31.4,54.3,-44.1,41.8C-56.8,29.3,-66.5,14.6,-67.3,-0.7C-68.1,-16,-60,-32,-47.3,-45.7C-34.6,-59.4,-17.3,-70.7,-0.3,-70.4C16.8,-70.1,33.5,-58.2,49.9,-46.2Z' transform='translate(100 100)'/%3E%3C/svg%3E");
            background-size: contain;
            opacity: 0.3;
            animation: rotate 30s linear infinite;
        }
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .header-content {
            position: relative;
            z-index: 1;
        }
        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 10px 0;
            letter-spacing: 0.5px;
        }
        .header p {
            font-size: 16px;
            font-weight: 300;
            margin: 0;
            opacity: 0.9;
        }
        .heart-icon {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            line-height: 70px;
            margin-bottom: 15px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .content {
            padding: 35px;
            color: #444;
            font-size: 16px;
            line-height: 1.6;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 25px;
            color: #d32f2f;
            font-weight: 600;
        }
        .highlight-box {
            background: linear-gradient(to right, rgba(255, 145, 145, 0.1), rgba(255, 145, 145, 0.05));
            border-left: 4px solid #ff4b4b;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 25px 0;
        }
        .details-card {
            background: #f9f9f9;
            border-radius: 12px;
            padding: 20px;
            margin: 25px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }
        .detail-item {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }
        .detail-icon {
            width: 40px;
            height: 40px;
            background: rgba(211, 47, 47, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #d32f2f;
            font-size: 18px;
        }
        .detail-text {
            flex: 1;
        }
        .detail-label {
            font-size: 14px;
            color: #777;
        }
        .detail-value {
            font-size: 16px;
            font-weight: 500;
            color: #333;
        }
        .button {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 14px 20px;
            background: linear-gradient(135deg, #ff4b4b, #d32f2f);
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(211, 47, 47, 0.3);
            transition: all 0.3s ease;
        }
        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(211, 47, 47, 0.4);
        }
        .closing {
            text-align: center;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }
        .signature {
            font-weight: 600;
            color: #d32f2f;
            font-size: 18px;
            margin-top: 5px;
        }
        .footer {
            background: #f8f8f8;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #eee;
        }
        .social-links {
            margin: 15px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #d32f2f;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <div class="heart-icon">❤️</div>
                <h1>Donation Successful!</h1>
                <p>Your generosity is saving lives</p>
            </div>
        </div>
        
        <div class="content">
            <p class="greeting">Dear {{ $donation->donor->user->name }},</p>
            <p>Thank you for your incredible generosity and for choosing to donate blood. Your contribution has the power to save up to three lives and brings hope to patients in need.</p>
            
            <div class="highlight-box">
                <p>Every donation makes a difference. Because of you, someone in our community will get another chance at life.</p>
            </div>
            
            <div class="details-card">
                <h3 style="margin-top: 0; color: #d32f2f;">Donation Details</h3>
                
                <div class="detail-item">
                    <div class="detail-icon">🩸</div>
                    <div class="detail-text">
                        <div class="detail-label">Blood Type</div>
                        <div class="detail-value">{{ $donation->donor->blood_type }}</div>
                    </div>
                </div>
                
                <div class="detail-item">
                    <div class="detail-icon">📅</div>
                    <div class="detail-text">
                        <div class="detail-label">Donation Date</div>
                        <div class="detail-value">{{ $donation->created_at->format('F j, Y') }}</div>
                    </div>
                </div>
                
                <div class="detail-item">
                    <div class="detail-icon">📍</div>
                    <div class="detail-text">
                        <div class="detail-label">Location</div>
                        <div class="detail-value">{{ $donation->bloodBank->name }}</div>
                    </div>
                </div>
            </div>
            
            {{-- <a href="{{ url('/donations/'.$donation->id) }}" class="button">View Full Details</a> --}}
            
            <div class="closing">
                <p>With heartfelt gratitude,</p>
                <p class="signature">The VitalLink Team</p>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} RedLink. All rights reserved.</p>
            <p>{{ $donation->bloodBank->address }}</p>
            
            <div class="social-links">
                <a href="#">Website</a> • 
                <a href="#">Facebook</a> • 
                <a href="#">Instagram</a> • 
                <a href="#">Twitter</a>
            </div>
            
            <p>You're receiving this email because you made a blood donation through RedLink.</p>
        </div>
    </div>
</body>
</html>