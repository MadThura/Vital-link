<template>
  <div v-if="show"
    class="fixed right-[18%] top-[100%] w-96 bg-white dark:bg-gray-800 shadow-xl border border-gray-200 dark:border-gray-700 p-4 overflow-hidden rounded-lg">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <h2 class="font-bold text-lg text-gray-800 dark:text-gray-100">Notifications</h2>
      <button @click="closeBox"
        class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <!-- Navbar Tabs -->
    <nav class="flex mb-4 border-b border-gray-200 dark:border-gray-700">
      <button v-for="tab in tabs" :key="tab.key" @click="activeTab = tab.key" :class="[
        'px-4 py-2 font-medium text-sm flex items-center gap-2 transition-colors',
        activeTab === tab.key
          ? 'border-b-2 border-red-500 text-red-600 dark:text-red-400'
          : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200'
      ]">
        {{ tab.label }}
        <span v-if="unreadCount(tab.key) > 0"
          class="bg-red-500 text-white text-[10px] font-semibold px-2 py-0.5 rounded-full dark:bg-red-400 dark:text-gray-900">
          {{ unreadCount(tab.key) }}
        </span>
      </button>
    </nav>

    <!-- Mark all as read -->
    <div v-if="filteredNotifications(activeTab).length > 0" class="flex justify-end mb-2">
      <button @click="markAllAsRead" class="text-xs text-blue-500 dark:text-blue-400 hover:underline">
        Mark all as read
      </button>
    </div>

    <!-- Notification Lists -->
    <div class="max-h-60 overflow-auto scrollbar-none">
      <!-- Blogs Tab -->
      <ul class="space-y-3" v-if="activeTab === 'blogs'">
        <template v-if="filteredNotifications('blogs').length > 0">
          <li v-for="item in filteredNotifications('blogs')" :key="item.id" @click="markAsRead(item)"
            class="group py-2 px-3 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
            <a :href="item.data.url" class="flex items-start gap-3">
              <div class="flex-shrink-0 mt-1">
                <div class="h-2 w-2 rounded-full" :class="item.read_at ? 'bg-gray-400' : 'bg-red-500'"></div>
              </div>
              <div>
                <p
                  class="text-sm font-medium text-gray-900 dark:text-gray-100 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
                  {{ item.data.title }}
                </p>
                <p
                  class="text-xs text-gray-900 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
                  {{ item.data.intro }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Published by Super Admin</p>
                <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-1">{{ formatTimestamp(item.created_at) }}</p>
              </div>
            </a>
          </li>
        </template>
        <template v-else>
          <li class="text-center py-6 text-gray-400 dark:text-gray-500">No notifications found.</li>
        </template>
      </ul>

      <!-- Requests Tab -->
      <ul class="space-y-3" v-if="activeTab === 'requests'">
        <template v-if="filteredNotifications('requests').length > 0">
          <li v-for="item in filteredNotifications('requests')" :key="item.id" @click="markAsRead(item)"
            class="group py-2 px-3 rounded-lg transition-colors cursor-pointer">

            <!-- ✅ Approved -->
            <a v-if="item.type === 'App\\Notifications\\DonationRequestApproved'"
              :href="`/notifications/${item.id}/approve`"
              class="block p-3 border border-green-200 dark:border-green-700 rounded-lg bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/40 transition-colors">
              <p class="text-sm text-green-600 dark:text-green-400 font-semibold">
                ✅ Approved By {{ item.data.blood_bank_name }}
              </p>
              <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Scheduled Date: <span class="font-medium">{{ item.data.date }}</span>
              </p>
              <div class="flex items-center justify-between mt-2">
                <p class="text-[11px] text-gray-400 dark:text-gray-500">{{ formatTimestamp(item.created_at) }}</p>
                <button class="flex items-center gap-1 text-emerald-600 dark:text-emerald-400 font-semibold text-sm 
                  bg-emerald-50 dark:bg-emerald-900/20 hover:bg-emerald-100 dark:hover:bg-emerald-800/40 
                  px-2 py-1 rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105">
                  <i class="fas fa-qrcode"></i>
                  <span>Get QR Code</span>
                </button>
              </div>
            </a>

            <!-- ❌ Rejected -->
            <div v-else-if="item.type === 'App\\Notifications\\DonationRequestRejected'"
              class="p-3 border border-red-200 dark:border-red-700 rounded-lg bg-red-50 dark:bg-red-900/20">
              <p class="text-sm text-red-600 dark:text-red-400 font-semibold">
                ❌ Rejected by {{ item.data.blood_bank_name }}
              </p>
              <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-2">{{ formatTimestamp(item.created_at) }}</p>
            </div>

            <!-- 🎉 Donation Completed -->
            <a v-else-if="item.type === 'App\\Notifications\\DonationCompleted'" href="#"
              class="block p-4 border border-blue-200 dark:border-blue-700 rounded-xl bg-blue-50 dark:bg-blue-900/20 shadow-sm hover:shadow-md transition-shadow duration-200 hover:bg-blue-100 dark:hover:bg-blue-800/30">
              <div class="flex items-center gap-3">
                <div class="flex-1">
                  <p class="text-sm font-semibold text-blue-700 dark:text-blue-300">
                    🎉 Donation Completed
                  </p>
                  <p class="text-xs text-gray-600 dark:text-gray-400 mt-0.5">
                    <span class="font-medium">{{ item.data.donor_name }}</span> donated
                    <span class="font-semibold">{{ item.data.donation.units }} unit(s)</span> at
                    <span class="font-medium">{{ item.data.donation.blood_bank.name }}</span>
                  </p>
                  <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-1">
                    {{ formatTimestamp(item.data.donation.donation_date) }}
                  </p>
                </div>
              </div>
              <div class="mt-3 flex justify-end">
                <button type="button" class="flex items-center gap-1 text-blue-600 dark:text-blue-400 font-semibold text-sm 
           bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-800/40
           px-3 py-1.5 rounded-lg shadow-sm">
                  <i class="fas fa-eye"></i>
                  <span>Check Your Email</span>
                </button>
              </div>
            </a>

            <!-- New Donor Approved -->
            <div v-else-if="item.type === 'App\\Notifications\\NewDonorApproved'"
              class="p-3 border border-green-200 dark:border-green-700 rounded-lg bg-green-50 dark:bg-green-900/20">
              <p class="text-sm text-green-600 dark:text-green-400 font-semibold">
                ✅ Your donor registration was approved by {{ item.data.blood_bank_name }}
              </p>
              <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-2">{{ formatTimestamp(item.created_at) }}</p>
            </div>
          </li>
        </template>
        <template v-else>
          <li class="text-center py-6 text-gray-400 dark:text-gray-500">No notifications found.</li>
        </template>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from 'vue'
import axios from 'axios'

const notifications = ref([])
const show = ref(true)
const activeTab = ref('blogs')
let refreshInterval = null

const tabs = [
  { key: 'blogs', label: 'New Blogs' },
  { key: 'requests', label: 'Requests' },
]

// Filter notifications by tab
function filteredNotifications(tabKey) {
  if (tabKey === 'blogs') {
    return notifications.value.filter(n =>
      n.type === 'App\\Notifications\\NewBlogUploaded'
    )
  }
  if (tabKey === 'requests') {
    return notifications.value.filter(n =>
      n.type === 'App\\Notifications\\DonationRequestApproved' ||
      n.type === 'App\\Notifications\\DonationRequestRejected' ||
      n.type === 'App\\Notifications\\DonationCompleted' ||
      n.type === 'App\\Notifications\\NewDonorApproved' ||
      n.type === 'App\\Notifications\\NewDonorRejected'
    )
  }
  return []
}

// Unread counter for each tab
function unreadCount(tabKey) {
  return filteredNotifications(tabKey).filter(n => !n.read_at).length
}

// Fetch notifications from backend
async function fetchNotifications() {
  try {
    const res = await axios.get('/notifications')
    notifications.value = res.data
    console.log(notifications.value[1]);
  } catch (error) {
    console.error('Error fetching notifications:', error)
  }
}

// Mark one as read
async function markAsRead(notification) {
  if (notification.read_at) return
  try {
    await axios.post(`/notifications/${notification.id}/read`)
    notification.read_at = new Date().toISOString()
  } catch (error) {
    console.error('Error marking as read:', error)
  }
}

// Mark all as read
async function markAllAsRead() {
  try {
    let test = await axios.post('/notifications/read-all');
    console.log(test.value);
    notifications.value = notifications.value.map(n => ({
      ...n,
      read_at: new Date().toISOString()
    }))
  } catch (error) {
    console.error('Error marking all as read:', error)
  }
}

function closeBox() {
  show.value = false
}

// Format timestamp
function formatTimestamp(isoString) {
  const date = new Date(isoString)
  const now = new Date()
  const isToday = date.toDateString() === now.toDateString()
  const timeFormatter = new Intl.DateTimeFormat(undefined, {
    hour: '2-digit',
    minute: '2-digit'
  })
  return `${isToday ? 'Today' : date.toLocaleDateString()}, ${timeFormatter.format(date)}`
}

onMounted(() => {
  fetchNotifications()
  watch(show, (isVisible) => {
    if (isVisible) {
      refreshInterval = setInterval(fetchNotifications, 10000)
    } else {
      clearInterval(refreshInterval)
      refreshInterval = null
    }
  }, { immediate: true })
})

onBeforeUnmount(() => {
  if (refreshInterval) clearInterval(refreshInterval)
})
</script>
<!-- {"type":"App\\Notifications\\NewDonorApproved","donor":{"id":7,"user_id":11,"blood_bank_id":null,"donor_code":"DNR-2025-TNUFKL","profile_img":"donors\/profiles\/hPSpRo9b25G3RqdwpDLKxRJqR9RjFMD5Z8GdJqgC.jpg","gender":"Female","dob":"1987-10-08","nrc":"01\/KhaLaHpa(N)975123","phone":"+1 (955) 874-1102","address":"Et id numquam suscip","blood_type":"AB-","donation_count":0,"last_donation_at":null,"cooldown_until":null,"health_certificate":"donors\/health_certificates\/L9QqQQ0DHNRrpMUwkOxqmQeyuVyzIiFbhwRwEOjV.jpg","nrc_front":"donors\/nrc\/SuZSQ2YgRd6qGgF2mu7fIJuCFbp5p2puTRLbmVYL.jpg","nrc_back":"donors\/nrc\/xI90S3ngp3wvyLcb6EUfjM3d4i8a89rgwawyqF28.jpg","status":"approved","rejection_errors":null,"created_at":"2025-08-25T14:32:30.000000Z","updated_at":"2025-08-25T14:32:43.000000Z","user":{"id":11,"name":"Erin Cooley","email":"pyma@mailinator.com","email_verified_at":"2025-08-25T14:31:59.000000Z","role":"donor","status":"active","created_at":"2025-08-25T14:31:38.000000Z","updated_at":"2025-08-25T14:32:43.000000Z"}}} -->