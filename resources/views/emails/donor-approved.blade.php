<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Status Notification</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .email-container {
            transition: all 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            overflow: hidden;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 10px;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #d1d5db, transparent);
            margin: 24px 0;
        }

        .donation-card {
            transition: transform 0.3s ease;
        }

        .donation-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>
    <div class="max-w-2xl mx-auto email-container">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6 text-white">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="bg-white text-blue-600 p-2 rounded-lg mr-4">
                        <i class="fas fa-hand-holding-heart text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">Vital Link</h1>
                        <p class="text-blue-100">Making a difference together</p>
                    </div>
                </div>
                <div class="text-sm">October 15, 2023</div>
            </div>
        </div>

        <!-- Email Content -->
        <div class="bg-white px-8 py-8">
            <!-- Greeting -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Dear Alex Johnson,</h2>
                <p class="text-gray-600">Thank you for your generous donation to our cause. Here is the status of your
                    recent contribution:</p>
            </div>

            <!-- Status Section -->
            <div class="mb-8 p-6 rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Donation Status</h3>
                        <div class="flex items-center mt-1">
                            <span class="text-gray-600">Approved</span>
                            <span class="status-badge bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-2"></i> Completed
                            </span>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 mt-4">Your donation has been successfully processed and will directly support
                    our community outreach programs.</p>
            </div>

            <!-- Donation Details -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Donation Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="donation-card bg-gray-50 p-5 rounded-xl border border-gray-200">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-receipt text-blue-600"></i>
                            </div>
                            <h4 class="font-medium text-gray-700">Donor Id</h4>
                        </div>
                        <p class="text-gray-800 font-mono">DN-2023-78945</p>
                    </div>

                    <div class="donation-card bg-gray-50 p-5 rounded-xl border border-gray-200">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-calendar text-blue-600"></i>
                            </div>
                            <h4 class="font-medium text-gray-700">Date</h4>
                        </div>
                        <p class="text-gray-800">October 15, 2023</p>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="divider"></div>

            <!-- Impact Message -->
            <div class="mb-8 bg-blue-50 p-6 rounded-xl border border-blue-200">
                <div class="flex items-start">
                    <div class="bg-blue-100 p-3 rounded-full mt-1">
                        <i class="fas fa-hands-helping text-blue-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Your Impact</h3>
                        <p class="text-gray-600">Your generous contribution will provide essential supplies for 5
                            families in need this month. We truly appreciate your support in making our community a
                            better place.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Need Assistance?</h3>
                <p class="text-gray-600 mb-4">Our donor support team is here to help with any questions you may have.
                </p>
                <div class="flex items-center text-gray-600 mb-2">
                    <i class="fas fa-envelope mr-3 text-blue-500"></i>
                    <span>donors@Vital Link.org</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <i class="fas fa-phone mr-3 text-blue-500"></i>
                    <span>(555) 123-4567</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-8 py-8 text-white">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-xl font-bold">Vital Link</h2>
                    <p class="text-gray-400">501(c)(3) Nonprofit Organization</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white transition"><i
                            class="fab fa-face-f fa-lg"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white transition"><i
                            class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white transition"><i
                            class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white transition"><i
                            class="fab fa-linkedin-in fa-lg"></i></a>
                </div>
            </div>

            <div class="text-center text-gray-400 text-xs pt-4 border-t border-gray-700">
                <p>© 2023 Vital Link. All rights reserved.</p>
                <p class="mt-1">EIN: 12-3456789 | Tax-Exempt since 2010</p>
                <p class="mt-3">You are receiving this email because you made a donation to Vital Link. </p>
            </div>
        </div>
    </div>
</body>
</html>
