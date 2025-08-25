<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Status Notification - Rejected</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #374151;
        }

        .email-container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            overflow: hidden;
        }

        .email-header {
            background: linear-gradient(to right, #b91c1c, #7f1d1d);
            padding: 24px 32px;
            color: white;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-icon {
            background: white;
            color: #b91c1c;
            padding: 8px;
            border-radius: 12px;
            margin-right: 16px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 24px;
            height: 24px;
        }

        .logo-text h1 {
            font-size: 24px;
            font-weight: 700;
        }

        .logo-text p {
            color: #fca5a5;
            font-size: 14px;
        }

        .header-date {
            font-size: 14px;
        }

        .email-content {
            background: white;
            padding: 32px;
        }

        .greeting {
            margin-bottom: 32px;
        }

        .greeting h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .greeting p {
            color: #6b7280;
            line-height: 1.6;
        }

        .status-section {
            margin-bottom: 32px;
            padding: 24px;
            border-radius: 12px;
            background: linear-gradient(to right, #fef2f2, #fee2e2);
            border: 1px solid #fca5a5;
        }

        .status-container {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
        }

        .status-icon {
            background: #fee2e2;
            padding: 12px;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b91c1c;
            flex-shrink: 0;
        }

        .status-icon svg {
            width: 24px;
            height: 24px;
        }

        .status-text {
            margin-left: 16px;
        }

        .status-text h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 4px;
        }

        .status-detail {
            display: flex;
            align-items: center;
            margin-top: 4px;
            flex-wrap: wrap;
        }

        .status-detail span:first-child {
            color: #6b7280;
            margin-right: 8px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 10px;
            background: #fee2e2;
            color: #b91c1c;
            font-size: 14px;
        }

        .status-badge svg {
            margin-right: 8px;
            width: 14px;
            height: 14px;
        }

        .status-message {
            color: #6b7280;
            margin-top: 16px;
            line-height: 1.6;
        }

        .rejection-reasons {
            background: white;
            border-radius: 8px;
            padding: 16px;
            margin-top: 16px;
        }

        .rejection-reasons ul {
            padding-left: 20px;
            margin: 8px 0 0 0;
        }

        .rejection-reasons li {
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .rejection-reasons strong {
            color: #b91c1c;
        }

        .details-section {
            margin-bottom: 32px;
        }

        .details-section h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 16px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        @media (min-width: 640px) {
            .details-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .donation-card {
            background: #f9fafb;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .card-icon {
            background: #fca5a5;
            padding: 8px;
            border-radius: 8px;
            margin-right: 12px;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .card-icon svg {
            width: 16px;
            height: 16px;
        }

        .card-header h4 {
            font-weight: 500;
            color: #374151;
        }

        .card-content {
            color: #1f2937;
            font-weight: 500;
        }

        .contact-section {
            background: #fef2f2;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #fca5a5;
        }

        .contact-section h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .contact-section p {
            color: #6b7280;
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            color: #6b7280;
        }

        .contact-item svg {
            color: #b91c1c;
            margin-right: 12px;
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .email-footer {
            background: linear-gradient(to right, #7f1d1d, #4b1212);
            padding: 32px;
            color: white;
        }

        .footer-top {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        @media (min-width: 768px) {
            .footer-top {
                flex-direction: row;
            }
        }

        .footer-logo {
            margin-bottom: 16px;
        }

        @media (min-width: 768px) {
            .footer-logo {
                margin-bottom: 0;
            }
        }

        .footer-logo h2 {
            font-size: 20px;
            font-weight: 700;
        }

        .footer-logo p {
            color: #fca5a5;
            font-size: 14px;
        }

        .social-links {
            display: flex;
            gap: 16px;
        }

        .social-links a {
            color: #fca5a5;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid #7f1d1d;
        }

        .footer-bottom p {
            color: #fca5a5;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .next-steps {
            margin: 24px 0;
            padding: 16px;
            background: #f0f9ff;
            border-radius: 8px;
            border-left: 4px solid #0ea5e9;
        }

        .next-steps h4 {
            color: #0369a1;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .next-steps p {
            color: #64748b;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="header-content">
                <div class="logo-container">
                    <div class="logo-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                            <path
                                d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64h16 16c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H248zM64 256c-35.3 0-64 28.7-64 64v48c0 35.3 28.7 64 64 64h16 16c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H64 64zm384 0c-35.3 0-64 28.7-64 64v48c0 35.3 28.7 64 64 64h16 16c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H448 448zM288 288c0 35.3-28.7 64-64 64h-16-16c-35.3 0-64-28.7-64-64v-32c0-35.3 28.7-64 64-64h16 16c35.3 0 64 28.7 64 64v32zM512 96h-16-16c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64h16 16c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64zM224 416v32c0 35.3 28.7 64 64 64h16 16c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64h-16-16c-35.3 0-64 28.7-64 64z" />
                        </svg>
                    </div>
                    <div class="logo-text">
                        <h1>Vital Link</h1>
                        <p>Making a difference together</p>
                    </div>
                </div>
                <div class="header-date">{{ $donor->created_at->format('d M Y') }}</div>
            </div>
        </div>

        <!-- Email Content -->
        <div class="email-content">
            <!-- Greeting -->
            <div class="greeting">
                <h2>Dear {{ $donor->user->name }},</h2>
                <p>Thank you for your willingness to donate and support our cause. After careful review, we regret to
                    inform you that your recent donation request could not be approved at this time.</p>
            </div>

            <!-- Status Section -->
            <div class="status-section">
                <div class="status-container">
                    <div class="status-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor">
                            <path
                                d="M310.6 361.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L160 301.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L114.7 256 9.4 150.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 210.7l105.4-105.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3L205.3 256l105.3 105.4z" />
                        </svg>
                    </div>
                    <div class="status-text">
                        <h3>Donation Request Not Approved</h3>
                        <div class="status-detail">
                            <span>Submission Date: {{ $donor->created_at->format('M d, Y') }}</span>
                            <span class="status-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="10"
                                    height="10" fill="currentColor">
                                    <path
                                        d="M310.6 361.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L160 301.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L114.7 256 9.4 150.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 210.7l105.4-105.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3L205.3 256l105.3 105.4z" />
                                </svg>
                                Not Approved
                            </span>
                        </div>
                    </div>
                </div>

                <div class="status-message">
                    <p>We appreciate your desire to help, but we're unable to accept your donation based on the
                        following criteria:</p>

                    <div class="rejection-reasons">
                        @if ($donor->rejection_errors && is_array($donor->rejection_errors))
                            <ul>
                                @foreach ($donor->rejection_errors as $field => $error)
                                    <li><strong>{{ ucfirst(str_replace('_', ' ', $field)) }}:</strong>
                                        {{ $error }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Our medical team has determined that accepting your donation would not be appropriate at
                                this time based on our current eligibility guidelines.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h4>What You Can Do Next</h4>
                <p>While we're unable to accept your donation at this time, there are other ways to support our mission.
                    Consider sharing information about blood donation with friends and family, or volunteering at one of
                    our upcoming events.</p>
            </div>


            <!-- Contact Section -->
            <div class="contact-section">
                <h3>Have Questions?</h3>
                <p>If you would like more information about our eligibility criteria or have any other questions, our
                    support team is here to help:</p>
                <div class="contact-info">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                            <path
                                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                        </svg>
                        <span>thetmgmg.123875@gmail.com</span>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                            <path
                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                        </svg>
                        <span>09757500076</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <div class="footer-top">
                <div class="footer-logo">
                    <h2>Vital Link</h2>
                    <p>501(c)(3) Nonprofit Organization</p>
                </div>
                <div class="social-links">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor">
                            <path
                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                            <path
                                d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                            <path
                                d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2023 Vital Link. All rights reserved.</p>
                <p>EIN: 12-3456789 | Tax-Exempt since 2010</p>
                <p>You are receiving this email because you made a donation to Vital Link.</p>
            </div>
        </div>
    </div>
</body>

</html>
