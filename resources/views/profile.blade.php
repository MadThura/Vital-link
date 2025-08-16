<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodConnect Profile | Dark Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-100 font-sans">
    <div class="min-h-screen py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Role Selection Tabs -->
            <div class="flex border-b border-gray-700 mb-8">
                <button class="px-6 py-3 font-medium border-b-2 border-blue-500 text-blue-400">Donor Profile</button>
                <button class="px-6 py-3 font-medium text-gray-400 hover:text-blue-400">Blood Bank</button>
                <button class="px-6 py-3 font-medium text-gray-400 hover:text-blue-400">Ward Operator</button>
            </div>

            <!-- Donor Profile Section -->
            <div class="bg-gray-800 rounded-xl p-8 border border-gray-700 shadow-2xl shadow-blue-900/20 mb-12">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-full md:w-1/3">
                        <div class="relative mb-6">
                            <img src="https://via.placeholder.com/300" alt="Profile picture" 
                                 class="w-full rounded-xl border-4 border-blue-600/80 shadow-lg">
                            <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">ACTIVE DONOR</span>
                        </div>
                        
                        <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/30 mb-4">
                            <h3 class="text-blue-400 font-semibold mb-2 flex items-center">
                                <i class="fas fa-tint mr-2"></i> Blood Details
                            </h3>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <div class="text-xs text-gray-400">Blood Type</div>
                                    <div class="font-bold text-lg">O+</div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-400">Last Donated</div>
                                    <div class="font-medium">15 Jun 2023</div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-400">Total Donations</div>
                                    <div class="font-bold text-lg">12</div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-400">Next Eligible</div>
                                    <div class="font-medium">15 Sep 2023</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/30">
                            <h3 class="text-blue-400 font-semibold mb-2 flex items-center">
                                <i class="fas fa-id-card mr-2"></i> Donor ID
                            </h3>
                            <div class="text-center p-3 bg-gray-800 rounded border border-gray-600">
                                <div class="text-xs text-gray-400 mb-1">Unique Donor ID</div>
                                <div class="font-mono text-lg tracking-wider">DNR-5A8B2C4D</div>
                                <div class="text-xs text-gray-400 mt-2">Valid until: 12/2025</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full md:w-2/3">
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent mb-2">Dr. Sarah Johnson</h1>
                        <p class="text-blue-400 mb-6">Regular Blood Donor | Member Since 2020</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Personal Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-user-circle mr-2 text-blue-400"></i> Personal Information
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Date of Birth</div>
                                        <div class="font-medium">March 15, 1985</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Gender</div>
                                        <div class="font-medium">Female</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">National ID</div>
                                        <div class="font-medium">4587-9654-3258</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Phone</div>
                                        <div class="font-medium">+1 (555) 123-4567</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Email</div>
                                        <div class="font-medium">sarah.johnson@example.com</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Address Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-blue-400"></i> Address
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Street</div>
                                        <div class="font-medium">123 Medical Drive, Suite 400</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">City</div>
                                        <div class="font-medium">San Francisco</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">State/Province</div>
                                        <div class="font-medium">California</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">ZIP/Postal Code</div>
                                        <div class="font-medium">94110</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Country</div>
                                        <div class="font-medium">United States</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Medical Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-heartbeat mr-2 text-blue-400"></i> Medical Information
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Health Status</div>
                                        <div class="font-medium text-green-400">Excellent</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Last Screening</div>
                                        <div class="font-medium">June 10, 2023</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Allergies</div>
                                        <div class="font-medium">None reported</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Medications</div>
                                        <div class="font-medium">None</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Restrictions</div>
                                        <div class="font-medium">None</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Emergency Contact -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-exclamation-triangle mr-2 text-blue-400"></i> Emergency Contact
                                </h2>
                                <div class="space-y-4">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Primary Contact</div>
                                        <div class="font-medium">Michael Johnson</div>
                                        <div class="text-sm text-gray-400">Spouse</div>
                                        <div class="text-sm mt-1">+1 (555) 987-6543</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Secondary Contact</div>
                                        <div class="font-medium">Emily Johnson</div>
                                        <div class="text-sm text-gray-400">Daughter</div>
                                        <div class="text-sm mt-1">+1 (555) 789-0123</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blood Bank Section (Hidden by default, shown when tab clicked) -->
            <div class="hidden bg-gray-800 rounded-xl p-8 border border-gray-700 shadow-2xl shadow-blue-900/20 mb-12">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-full md:w-1/3">
                        <div class="relative mb-6">
                            <img src="https://via.placeholder.com/300x200" alt="Blood bank" 
                                 class="w-full rounded-xl border-4 border-blue-600/80 shadow-lg">
                            <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">CERTIFIED</span>
                        </div>
                        
                        <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/30 mb-4">
                            <h3 class="text-blue-400 font-semibold mb-2 flex items-center">
                                <i class="fas fa-warehouse mr-2"></i> Inventory Summary
                            </h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">O+ Available</div>
                                    <div class="font-bold text-lg text-red-400">42 units</div>
                                </div>
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">A- Available</div>
                                    <div class="font-bold text-lg text-red-400">18 units</div>
                                </div>
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">B+ Available</div>
                                    <div class="font-bold text-lg text-red-400">25 units</div>
                                </div>
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">AB- Available</div>
                                    <div class="font-bold text-lg text-red-400">8 units</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/30">
                            <h3 class="text-blue-400 font-semibold mb-2 flex items-center">
                                <i class="fas fa-certificate mr-2"></i> Accreditation
                            </h3>
                            <div class="text-center p-3 bg-gray-800 rounded border border-gray-600">
                                <div class="text-xs text-gray-400 mb-1">License Number</div>
                                <div class="font-mono text-lg tracking-wider">BBK-9X7Y6Z2A</div>
                                <div class="text-xs text-gray-400 mt-2">Expires: 06/2024</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full md:w-2/3">
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent mb-2">San Francisco Central Blood Bank</h1>
                        <p class="text-blue-400 mb-6">24/7 Emergency Services | AABB Accredited</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Bank Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-info-circle mr-2 text-blue-400"></i> Bank Information
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Bank ID</div>
                                        <div class="font-medium">BB-SF-0042</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Director</div>
                                        <div class="font-medium">Dr. Robert Chen</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Established</div>
                                        <div class="font-medium">January 15, 1998</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Phone</div>
                                        <div class="font-medium">+1 (415) 555-7890</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Emergency Line</div>
                                        <div class="font-medium">+1 (415) 555-7891</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Email</div>
                                        <div class="font-medium">contact@sfbloodbank.org</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Facility Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-building mr-2 text-blue-400"></i> Facility
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Address</div>
                                        <div class="font-medium">500 Hematology Way</div>
                                        <div class="font-medium">San Francisco, CA 94103</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Hours</div>
                                        <div class="font-medium">24/7 Operations</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Facility Size</div>
                                        <div class="font-medium">15,000 sq ft</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Storage Capacity</div>
                                        <div class="font-medium">1,200 units</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Services Offered -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-hand-holding-medical mr-2 text-blue-400"></i> Services
                                </h2>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Whole Blood Collection</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Platelet Apheresis</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Plasma Collection</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Blood Typing</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Pathogen Testing</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Emergency Distribution</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Staff Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-user-md mr-2 text-blue-400"></i> Key Staff
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="font-medium">Medical Director</div>
                                        <div class="text-sm text-gray-400">Dr. Robert Chen</div>
                                    </div>
                                    <div>
                                        <div class="font-medium">Head Nurse</div>
                                        <div class="text-sm text-gray-400">Maria Gonzalez, RN</div>
                                    </div>
                                    <div>
                                        <div class="font-medium">Lab Supervisor</div>
                                        <div class="text-sm text-gray-400">David Kim, MLS</div>
                                    </div>
                                    <div>
                                        <div class="font-medium">Donor Coordinator</div>
                                        <div class="text-sm text-gray-400">James Wilson</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ward Operator Section (Hidden by default, shown when tab clicked) -->
            <div class="hidden bg-gray-800 rounded-xl p-8 border border-gray-700 shadow-2xl shadow-blue-900/20">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-full md:w-1/3">
                        <div class="relative mb-6">
                            <img src="https://via.placeholder.com/300x200" alt="Hospital" 
                                 class="w-full rounded-xl border-4 border-blue-600/80 shadow-lg">
                            <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">ACTIVE</span>
                        </div>
                        
                        <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/30 mb-4">
                            <h3 class="text-blue-400 font-semibold mb-2 flex items-center">
                                <i class="fas fa-hospital mr-2"></i> Ward Summary
                            </h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">Beds</div>
                                    <div class="font-bold text-lg">24</div>
                                </div>
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">Current Patients</div>
                                    <div class="font-bold text-lg">18</div>
                                </div>
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">Monthly Transfusions</div>
                                    <div class="font-bold text-lg">42</div>
                                </div>
                                <div class="bg-gray-800 p-2 rounded text-center">
                                    <div class="text-xs text-gray-400">Critical Requests</div>
                                    <div class="font-bold text-lg text-red-400">3</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/30">
                            <h3 class="text-blue-400 font-semibold mb-2 flex items-center">
                                <i class="fas fa-id-badge mr-2"></i> Operator ID
                            </h3>
                            <div class="text-center p-3 bg-gray-800 rounded border border-gray-600">
                                <div class="text-xs text-gray-400 mb-1">Operator ID</div>
                                <div class="font-mono text-lg tracking-wider">WOP-8B3C1D9A</div>
                                <div class="text-xs text-gray-400 mt-2">Access Level: 3</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full md:w-2/3">
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent mb-2">Dr. Amanda Rodriguez</h1>
                        <p class="text-blue-400 mb-6">Chief Ward Operator | Cardiology Department</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Operator Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-user-tie mr-2 text-blue-400"></i> Professional Information
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Employee ID</div>
                                        <div class="font-medium">EMP-78945</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Position</div>
                                        <div class="font-medium">Chief Ward Operator</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Department</div>
                                        <div class="font-medium">Cardiology</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Hospital</div>
                                        <div class="font-medium">San Francisco General</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Phone</div>
                                        <div class="font-medium">+1 (415) 555-1234 (ext. 456)</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Email</div>
                                        <div class="font-medium">a.rodriguez@sfgeneral.org</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Ward Information -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-procedures mr-2 text-blue-400"></i> Ward Details
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Ward Number</div>
                                        <div class="font-medium">Cardiology Ward 4B</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Location</div>
                                        <div class="font-medium">4th Floor, West Wing</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Primary Blood Supplier</div>
                                        <div class="font-medium">SF Central Blood Bank</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wider">Average Monthly Usage</div>
                                        <div class="font-medium">35-50 units</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Access Privileges -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-key mr-2 text-blue-400"></i> System Access
                                </h2>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Blood Request Authorization</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Inventory Monitoring</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Patient Records</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Emergency Override</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                        <span class="font-medium">Staff Scheduling</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Recent Activity -->
                            <div class="bg-gray-700/30 p-5 rounded-xl border border-gray-600/20">
                                <h2 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700 flex items-center">
                                    <i class="fas fa-history mr-2 text-blue-400"></i> Recent Activity
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <div class="text-xs text-gray-400">Today, 09:42 AM</div>
                                        <div class="font-medium">Approved 2 units O+ for Patient #78945</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400">Yesterday, 3:15 PM</div>
                                        <div class="font-medium">Requested emergency delivery of 4 units A-</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400">Yesterday, 10:30 AM</div>
                                        <div class="font-medium">Updated inventory records</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.flex.border-b button');
            const sections = document.querySelectorAll('div[id$="Section"]');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabs.forEach(t => {
                        t.classList.remove('border-b-2', 'border-blue-500', 'text-blue-400');
                        t.classList.add('text-gray-400');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.add('border-b-2', 'border-blue-500', 'text-blue-400');
                    this.classList.remove('text-gray-400');
                    
                    // Hide all sections
                    sections.forEach(section => {
                        section.classList.add('hidden');
                    });
                    
                    // Show corresponding section
                    const sectionId = this.textContent.trim().replace(' ', '') + 'Section';
                    document.getElementById(sectionId)?.classList.remove('hidden');
                });
            });
        });
    </script>
</body>
</html>