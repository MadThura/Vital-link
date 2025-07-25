<x-layout title="Admin Dashboard">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full overflow-hidden font-roboto">
    <div class="flex h-full text-black">
        <!-- Left Pane -->
        <div class="w-[17%] bg-white border-r border-gray-200 p-5 flex flex-col justify-between">
            <div>
                <div class="text-center mb-8">
                    <img src="/images/logo.png" alt="RedLink Logo" class="w-[150px] h-[150px] object-contain rounded-lg mx-auto">
                    <h2 class="text-xl mt-2 text-red-600">RedLink</h2>
                </div>

                <nav class="flex flex-col gap-4">
                    <a href="#" class="no-underline text-gray-700 text-sm py-3 px-2 rounded flex items-center gap-3 hover:bg-blue-50 hover:text-blue-500 transition-colors">
                        <i class="fa-solid fa-house text-blue-500 text-base"></i> Dashboard
                    </a>
                    <a href="#" class="no-underline text-gray-700 text-sm py-3 px-2 rounded flex items-center gap-3 hover:bg-blue-50 hover:text-blue-500 transition-colors">
                        <i class="fa-solid fa-user-check text-blue-500 text-base"></i> Approval Requests
                    </a>
                    <a href="#" class="no-underline text-gray-700 text-sm py-3 px-2 rounded flex items-center gap-3 hover:bg-blue-50 hover:text-blue-500 transition-colors">
                        <i class="fa-solid fa-file-medical text-blue-500 text-base"></i> Donation Records
                    </a>
                    <a href="#" class="no-underline text-gray-700 text-sm py-3 px-2 rounded flex items-center gap-3 hover:bg-blue-50 hover:text-blue-500 transition-colors">
                        <i class="fa-solid fa-file-export text-blue-500 text-base"></i> Export Reports
                    </a>
                    <a href="#" class="no-underline text-gray-700 text-sm py-3 px-2 rounded flex items-center gap-3 hover:bg-blue-50 hover:text-blue-500 transition-colors">
                        <i class="fa-solid fa-arrow-right-from-bracket text-blue-500 text-base"></i>Logout
                    </a>
                </nav>
            </div>

            <div class="text-sm text-center text-gray-600 border-t border-gray-200 pt-5 mt-5">
                <p>Role: <strong>Admin</strong></p>
            </div>
        </div>

        <!-- Right Pane -->
        <div class="w-[83%] h-full">
            <!-- Top Bar -->
            <div class="h-[7%] p-1 flex items-center justify-around">
                <div class="w-[900px]">
                    <input type="text" placeholder="Search..." class="w-full py-1 px-3 text-base border border-gray-300 rounded-full bg-gray-50 text-gray-700 outline-none focus:border-blue-300 transition-colors">
                </div>
                <div class="relative">
                    <button class="outline-none border-none bg-transparent rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="fa-regular fa-bell text-gray-500 text-xl"></i>
                    </button>
                    <span class="absolute top-[-5px] right-[-5px] bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">5</span>
                </div>
                <div class="flex items-center">
                    <div class="w-7 h-7 rounded-full mr-5">
                        <img src="/images/gojo-2.jpeg" alt="profile" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div>
                        <p>Violin Vibe</p>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="h-[93%] bg-gray-100">
                <!-- Stats Cards -->
                <div class="w-full h-[18%] flex items-center justify-around flex-nowrap">
                    <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform">
                        <div class="text-2xl mr-4">
                            <i class="fa-solid fa-hand-holding-heart p-2 rounded-full text-red-600 bg-red-100"></i>
                        </div>
                        <div class="ml-7">
                            <h2 class="m-0 text-gray-600 text-3xl font-bold">1,234</h2>
                            <p class="mt-1 text-gray-600 text-sm">Total Donors</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform">
                        <div class="text-2xl mr-4">
                            <i class="fa-regular fa-clock p-2 rounded-full text-orange-500 bg-orange-100"></i>
                        </div>
                        <div class="ml-7">
                            <h2 class="m-0 text-gray-600 text-3xl font-bold">125</h2>
                            <p class="mt-1 text-gray-600 text-sm">Pending Approval</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform">
                        <div class="text-2xl mr-4">
                            <i class="fa-solid fa-person-circle-check p-2 rounded-full text-teal-600 bg-teal-100"></i>
                        </div>
                        <div class="ml-7">
                            <h2 class="m-0 text-gray-600 text-3xl font-bold">985</h2>
                            <p class="mt-1 text-gray-600 text-sm">Available Donors</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform">
                        <div class="text-2xl mr-4">
                            <i class="fa-solid fa-person-circle-xmark p-2 rounded-full text-gray-500 bg-gray-100"></i>
                        </div>
                        <div class="ml-7">
                            <h2 class="m-0 text-gray-600 text-3xl font-bold">871</h2>
                            <p class="mt-1 text-gray-600 text-sm">Deferred Donors</p>
                        </div>
                    </div>
                </div>

                <!-- Two Column Layout -->
                <div class="flex h-[82%] gap-5 p-5">
                    <!-- First Column -->
                    <div class="flex-1">
                        <div class="graph-container bg-white rounded-lg shadow-sm p-2.5 w-full h-[300px]"></div>
                        <h2 class="text-xl mt-5 mb-3">Quick Access</h2>
                        <div class="flex items-center justify-start gap-7">
                            <a href="#">
                                <button class="text-gray-600 text-base outline-none border-none py-2 px-4 rounded-lg bg-white shadow hover:shadow-md transition-shadow">
                                    <i class="fa-regular fa-pen-to-square text-blue-600 bg-blue-50 p-1 rounded mr-2.5"></i>Update Status
                                </button>
                            </a>
                            <a href="#">
                                <button class="text-gray-600 text-base outline-none border-none py-2 px-4 rounded-lg bg-white shadow hover:shadow-md transition-shadow">
                                    <i class="fa-solid fa-file-invoice text-teal-600 bg-teal-50 p-1 rounded mr-2.5"></i>Donation Record
                                </button>
                            </a>
                            <a href="#">
                                <button class="text-gray-600 text-base outline-none border-none py-2 px-4 rounded-lg bg-white shadow hover:shadow-md transition-shadow">
                                    <i class="fa-solid fa-file-export text-blue-600 bg-blue-50 p-1 rounded mr-2.5"></i>Export Certificate
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- Second Column -->
                    <div class="w-[45%] flex flex-col p-5 bg-white rounded-lg shadow-sm overflow-y-auto">
                        <h3 class="text-lg mb-2.5">Top Donors</h3>
                        <div class="top-donor-table overflow-y-auto">
                            <table class="w-full border-collapse font-roboto text-sm">
                                <thead>
                                    <tr>
                                        <th class="text-left py-3 px-2.5 border-b border-gray-200 bg-gray-50 text-gray-700 font-semibold text-center">Name</th>
                                        <th class="text-left py-3 px-2.5 border-b border-gray-200 bg-gray-50 text-gray-700 font-semibold text-center">Count</th>
                                        <th class="text-left py-3 px-2.5 border-b border-gray-200 bg-gray-50 text-gray-700 font-semibold text-center">Last Donation</th>
                                        <th class="text-left py-3 px-2.5 border-b border-gray-200 bg-gray-50 text-gray-700 font-semibold text-center">Amount (ml)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/gojo.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Violin
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">5</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-07-01</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2500</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/gojo-2.jpeg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-1.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-2.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-3.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-4.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-5.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-6.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-7.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">
                                            <div class="flex items-center gap-2.5 justify-center">
                                                <img src="images/profile-8.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-300 object-cover" />
                                                Lynx
                                            </div>
                                        </td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">4</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2025-06-20</td>
                                        <td class="py-3 px-2.5 border-b border-gray-200 text-center">2000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</x-layout>