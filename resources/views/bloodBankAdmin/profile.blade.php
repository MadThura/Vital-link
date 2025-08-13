<x-admin-layout>
<div class="min-h-screen bg-gray-900 text-gray-100 overflow-auto">

  <!-- Main Content -->
  <main class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Profile Card -->
      <div class="w-full lg:w-1/3">
        <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700">
          <!-- Profile Header -->
          <div class="bg-gradient-to-r from-red-900 to-red-800 p-6 text-center">
            <div class="relative mx-auto w-24 h-24">
              <img src="https://randomuser.me/api/portraits/women/45.jpg" 
                   class="w-full h-full rounded-full border-4 border-white/20">
              <div class="absolute -bottom-1 right-1 bg-green-500 rounded-full p-1 border-2 border-gray-800">
                <i class="fas fa-check text-xs text-white"></i>
              </div>
            </div>
            <h2 class="text-xl font-bold mt-4">Dr. Sarah Johnson</h2>
            <p class="text-red-300">Blood Bank Administrator</p>
            <div class="mt-3 flex justify-center space-x-2">
              <span class="bg-red-900/50 text-red-300 px-2 py-1 rounded-full text-xs">Verified</span>
              <span class="bg-gray-700 text-gray-300 px-2 py-1 rounded-full text-xs">Level 4 Access</span>
            </div>
          </div>
          
          <!-- Profile Details -->
          <div class="p-6">
            <div class="space-y-5">
              <div class="flex items-start">
                <div class="bg-gray-700 p-2 rounded-lg mr-3">
                  <i class="fas fa-id-card text-red-400"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-400">Staff ID</p>
                  <p class="font-medium">BB-ADM-0428</p>
                </div>
              </div>
              
              <div class="flex items-start">
                <div class="bg-gray-700 p-2 rounded-lg mr-3">
                  <i class="fas fa-envelope text-red-400"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-400">Email</p>
                  <p class="font-medium">s.johnson@bloodbank.org</p>
                </div>
              </div>
              
              <div class="flex items-start">
                <div class="bg-gray-700 p-2 rounded-lg mr-3">
                  <i class="fas fa-phone text-red-400"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-400">Phone</p>
                  <p class="font-medium">+1 (555) 123-4567</p>
                </div>
              </div>
              
              <div class="flex items-start">
                <div class="bg-gray-700 p-2 rounded-lg mr-3">
                  <i class="fas fa-hospital text-red-400"></i>
                </div>
                <div>
                  <p class="text-sm text-gray-400">Blood Center</p>
                  <p class="font-medium">City Central Blood Bank</p>
                  <p class="text-sm text-gray-400">123 Medical Center Dr</p>
                </div>
              </div>
              
              <div class="pt-4 border-t border-gray-700">
                <h3 class="text-sm font-semibold text-gray-400 mb-3">ACCESS PERMISSIONS</h3>
                <div class="flex flex-wrap gap-2">
                  <span class="bg-gray-700 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                    <i class="fas fa-check-circle mr-1"></i> Donor Management
                  </span>
                  <span class="bg-gray-700 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                    <i class="fas fa-check-circle mr-1"></i> Inventory Control
                  </span>
                  <span class="bg-gray-700 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                    <i class="fas fa-check-circle mr-1"></i> Staff Administration
                  </span>
                  <span class="bg-gray-700 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                    <i class="fas fa-check-circle mr-1"></i> Reports
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="mt-6 bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700">
          <h3 class="font-semibold text-lg mb-4 flex items-center">
            <i class="fas fa-chart-line text-red-400 mr-2"></i>
            Quick Stats
          </h3>
          <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-700/50 p-3 rounded-lg">
              <p class="text-sm text-gray-400">Donations Managed</p>
              <p class="text-2xl font-bold">1,842</p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg">
              <p class="text-sm text-gray-400">Staff Supervised</p>
              <p class="text-2xl font-bold">24</p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg">
              <p class="text-sm text-gray-400">Current Inventory</p>
              <p class="text-2xl font-bold">586</p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg">
              <p class="text-sm text-gray-400">Active Campaigns</p>
              <p class="text-2xl font-bold">3</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Main Content Area -->
      <div class="w-full lg:w-2/3">
        <!-- Activity Section -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6 mb-6 border border-gray-700">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold flex items-center">
              <i class="fas fa-history text-red-400 mr-2"></i>
              Recent Activity
            </h2>
            <button class="text-red-400 hover:text-red-300 text-sm font-medium">
              View All <i class="fas fa-arrow-right ml-1"></i>
            </button>
          </div>
          
          <div class="space-y-4">
            <div class="flex items-start p-3 hover:bg-gray-700/50 rounded-lg transition">
              <div class="bg-red-900/30 p-2 rounded-lg mr-3 mt-1">
                <i class="fas fa-user-plus text-red-400"></i>
              </div>
              <div class="flex-1">
                <p class="font-medium">Added new staff member</p>
                <p class="text-sm text-gray-400">Dr. Michael Chen was added to the system with phlebotomist privileges</p>
                <p class="text-xs text-gray-500 mt-1">Today, 10:45 AM</p>
              </div>
            </div>
            
            <div class="flex items-start p-3 hover:bg-gray-700/50 rounded-lg transition">
              <div class="bg-green-900/30 p-2 rounded-lg mr-3 mt-1">
                <i class="fas fa-tint text-green-400"></i>
              </div>
              <div class="flex-1">
                <p class="font-medium">Updated blood inventory</p>
                <p class="text-sm text-gray-400">Added 15 units of O+ blood from community drive</p>
                <p class="text-xs text-gray-500 mt-1">Yesterday, 3:22 PM</p>
              </div>
            </div>
            
            <div class="flex items-start p-3 hover:bg-gray-700/50 rounded-lg transition">
              <div class="bg-blue-900/30 p-2 rounded-lg mr-3 mt-1">
                <i class="fas fa-calendar-check text-blue-400"></i>
              </div>
              <div class="flex-1">
                <p class="font-medium">Scheduled blood drive</p>
                <p class="text-sm text-gray-400">Community blood drive at City Hall on June 15th</p>
                <p class="text-xs text-gray-500 mt-1">2 days ago</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Blood Inventory -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6 mb-6 border border-gray-700">
          <h2 class="text-xl font-bold mb-6 flex items-center">
            <i class="fas fa-warehouse text-red-400 mr-2"></i>
            Blood Inventory Summary
          </h2>
          
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-red-500">
              <p class="text-sm text-gray-400">O+</p>
              <p class="text-2xl font-bold">42 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-blue-500">
              <p class="text-sm text-gray-400">A+</p>
              <p class="text-2xl font-bold">35 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-purple-500">
              <p class="text-sm text-gray-400">B+</p>
              <p class="text-2xl font-bold">28 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-green-500">
              <p class="text-sm text-gray-400">AB+</p>
              <p class="text-2xl font-bold">15 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-red-500">
              <p class="text-sm text-gray-400">O-</p>
              <p class="text-2xl font-bold">42 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-blue-500">
              <p class="text-sm text-gray-400">A-</p>
              <p class="text-2xl font-bold">35 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-purple-500">
              <p class="text-sm text-gray-400">B-</p>
              <p class="text-2xl font-bold">28 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
            <div class="bg-gray-700/50 p-3 rounded-lg border-l-4 border-green-500">
              <p class="text-sm text-gray-400">AB-</p>
              <p class="text-2xl font-bold">15 <span class="text-sm font-normal text-gray-400">units</span></p>
            </div>
          </div>
          
          <div class="flex justify-between items-center">
            <p class="text-sm text-gray-500">Last updated: Today, 11:30 AM</p>
            <button class="text-red-400 hover:text-red-300 text-sm font-medium flex items-center">
              <i class="fas fa-sync-alt mr-1"></i> Refresh
            </button>
          </div>
        </div>
        
        <!-- Upcoming Appointments -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700">
          <h2 class="text-xl font-bold mb-6 flex items-center">
            <i class="fas fa-calendar-alt text-red-400 mr-2"></i>
            Today's Appointments
          </h2>
          
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
              <thead>
                <tr>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Donor</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Time</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Type</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-700">
                <tr class="hover:bg-gray-700/50">
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <img class="w-8 h-8 rounded-full mr-2" src="https://randomuser.me/api/portraits/men/32.jpg">
                      <div>
                        <p class="font-medium">John Smith</p>
                        <p class="text-xs text-gray-400">DNR-8472</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <p>10:30 AM</p>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full bg-red-900/30 text-red-400">O+</span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full bg-green-900/30 text-green-400">Confirmed</span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <button class="text-blue-400 hover:text-blue-300 mr-2">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button class="text-red-400 hover:text-red-300">
                      <i class="fas fa-times"></i>
                    </button>
                  </td>
                </tr>
                <!-- More rows would go here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
</x-admin-layout>