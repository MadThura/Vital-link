 <div x-show="updateDialog" x-cloak x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center p-4">

     <div @click.away="updateDialog = false" x-show="updateDialog" x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="bg-gray-800 rounded-xl shadow-2xl w-full max-w-md border border-cyan-400/20 overflow-hidden">

         <!-- Header with profile -->
         <div class="p-6 pb-0">
             <div class="flex justify-between items-start">
                 <div class="flex items-center space-x-4">
                     <div class="relative">
                         <img src=""
                             class="w-14 h-14 rounded-full border-2 border-cyan-400/50 object-cover shadow">
                         <div class="absolute -bottom-1 -right-1 bg-cyan-600 rounded-full p-1 border-2 border-gray-800">
                             <i class="fa-solid fa-droplet text-white text-xs"></i>
                         </div>
                     </div>
                     <div>
                         <h3 class="text-lg font-semibold text-white"></h3>
                         <div class="flex items-center space-x-2 mt-1">
                             <span class="px-2 py-0.5 bg-cyan-900/30 text-cyan-300 text-xs font-medium rounded-full">
                             </span>
                             <span class="text-gray-400 text-xs"></span>
                         </div>
                     </div>
                 </div>
                 <button @click="updateDialog = false"
                     class="text-gray-400 hover:text-cyan-300 p-1 rounded-full hover:bg-gray-700/50 transition-colors">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
         </div>

         <!-- Content -->
         <div class="p-6 space-y-5">
             <!-- Units input -->
             <div class="space-y-2">
                 <label class="block text-sm font-medium text-cyan-300 text-left">Units to collect</label>
                 <div class="relative">
                     <input x-model="units" type="number" min="1" max="10"
                         class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2.5 text-white focus:ring-1 focus:ring-cyan-500 focus:border-transparent transition-all">
                 </div>
             </div>

             <!-- NEW NOTE BOX -->
             <div class="space-y-2">
                 <label class="block text-sm font-medium text-cyan-300 text-left">Notes</label>
                 <textarea x-model="note"
                     class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2.5 text-white 
                                    focus:ring-1 focus:ring-cyan-500 focus:border-transparent transition-all
                                    min-h-[80px] text-sm"
                     placeholder="Any special instructions or observations..."></textarea>
             </div>

             <!-- Donor stats -->
             <div class="flex justify-between gap-2">
                 <div class="bg-gray-700/40 p-2 rounded-lg text-center flex-1">
                     <p class="text-gray-400 text-xs">Donations</p>
                     <p class="text-cyan-300 font-medium">12</p>
                 </div>
                 <div class="bg-gray-700/40 p-2 rounded-lg text-center flex-1">
                     <p class="text-gray-400 text-xs">Eligible</p>
                     <p class="text-emerald-300 font-medium">Yes</p>
                 </div>
             </div>

             <!-- Additional info -->
             <div class="bg-gray-700/30 p-3 rounded-lg border border-gray-600/30">
                 <h4 class="text-sm font-medium text-cyan-300 mb-2">Additional Information</h4>
                 <div class="text-xs text-gray-300 space-y-1">
                     <p class="flex items-center"><i class="fas fa-venus-mars text-gray-400 mr-2 w-4"></i> Female, 32
                         years</p>
                     <p class="flex items-center"><i class="fas fa-weight text-gray-400 mr-2 w-4"></i> 58 kg</p>
                     <p class="flex items-center"><i class="fas fa-heartbeat text-gray-400 mr-2 w-4"></i> Normal pulse
                     </p>
                 </div>
             </div>
         </div>

         <!-- Footer buttons -->
         <div class="px-6 pb-6 pt-2">
             <div class="flex justify-end space-x-3">
                 <button @click="updateDialog = false"
                     class="px-4 py-2 text-gray-300 hover:text-white text-sm font-medium transition-colors">
                     Cancel
                 </button>
                 <button
                     class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg text-sm font-medium shadow-md hover:shadow-cyan-500/20 transition-all">
                     Confirm Donation
                 </button>
             </div>
         </div>
     </div>
 </div>
