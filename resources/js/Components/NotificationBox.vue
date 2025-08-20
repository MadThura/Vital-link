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
          'px-4 py-2 font-medium text-sm transition-colors',
          activeTab === tab.key
            ? 'border-b-2 border-red-500 text-red-600 dark:text-red-400'
            : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200'
        ]">
          {{ tab.label }}
        </button>
      </nav>

      <!-- Notification Lists -->
      <div class="max-h-60 overflow-auto scrollbar-none">
        <ul class="space-y-3" v-if="activeTab === 'blogs'">
          <li v-for="item in filteredNotifications('blogs')" :key="item.id"
            class="group py-2 px-3 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">
            <a :href="item.data.url" target="_blank" class="flex items-start gap-3">
              <div class="flex-shrink-0 mt-1">
                <div class="h-2 w-2 bg-red-500 rounded-full"></div>
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
        </ul>

        <ul class="space-y-3" v-if="activeTab === 'requests'">
          <li v-for="item in filteredNotifications('requests')" :key="item.id"
            class="group py-2 px-3 rounded-lg transition-colors">
            <!-- ✅ Approved -->
            <div v-if="item.type === 'App\\Notifications\\DonationRequestApproved'"
              class="p-3 border border-green-200 dark:border-green-700 rounded-lg bg-green-50 dark:bg-green-900/20">
              <p class="text-sm text-green-600 dark:text-green-400 font-semibold">✅ {{ item.data.blood_bank_name }}</p>
              <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Scheduled Date: <span class="font-medium">{{ item.data.date }}</span>
              </p>
              <!-- <p class="text-xs text-gray-500 dark:text-gray-400">{{ item.data.note }}</p> -->
              <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-2">{{ formatTimestamp(item.created_at) }}</p>
            </div>

            <!-- ❌ Rejected -->
            <div v-else-if="item.type === 'App\\Notifications\\DonationRequestRejected'"
              class="p-3 border border-red-200 dark:border-red-700 rounded-lg bg-red-50 dark:bg-red-900/20">
              <p class="text-sm text-red-600 dark:text-red-400 font-semibold">❌ {{ item.data.blood_bank_name }}</p>
              <!-- <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Reason: {{ item.data.reason }}</p> -->
              <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-2">{{ formatTimestamp(item.created_at) }}</p>
            </div>
          </li>
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

  // Filter function for tabs
  function filteredNotifications(tabKey) {
    if (tabKey === 'blogs') {
      // Only blog notifications from backend
      return notifications.value.filter(
        n => n.type === 'App\\Notifications\\NewBlogUploaded'
      )
    }
    if (tabKey === 'requests') {
  
      return notifications.value.filter(
        n => n.type === 'App\\Notifications\\DonationRequestApproved' || n.type==='App\\Notifications\\DonationRequestRejected',
      )  
    }
    return []
  }

  // Fetch notifications from Laravel backend
  async function fetchNotifications() {
    try {
      const res = await axios.get('/notifications') // backend returns blogs
      notifications.value = res.data;
    } catch (error) {
      console.error('Error fetching notifications:', error)
    }
  }

  function closeBox() {
    show.value = false
  }

  // Format ISO timestamp
  function formatTimestamp(isoString) {
    const date = new Date(isoString)
    const now = new Date()
    const isToday = date.getFullYear() === now.getFullYear() &&
      date.getMonth() === now.getMonth() &&
      date.getDate() === now.getDate()
    const timeFormatter = new Intl.DateTimeFormat(undefined, { hour: '2-digit', minute: '2-digit' })
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

