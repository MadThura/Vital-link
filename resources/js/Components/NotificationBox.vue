<template>
  <div
    v-if="show"
    class="fixed right-[18%] top-[100%] w-80 bg-white dark:bg-gray-800 shadow-xl border border-gray-200 dark:border-gray-700 p-4 overflow-y-auto rounded-lg"
  >
    <div class="flex justify-between items-center mb-4">
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        <h2 class="font-bold text-lg text-gray-800 dark:text-gray-100">New Blog Post</h2>
      </div>
      <button 
        @click="closeBox" 
        class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
    <ul class="space-y-3 max-h-40 overflow-auto scrollbar-none">
      <li
        v-for="item in notifications"
        :key="item.id"
        class="group py-2 px-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors"
      >
        <a
          :href="item.data.url"
          target="_blank"
          class="flex items-start gap-3"
        >
          <div class="flex-shrink-0 mt-1">
            <div class="h-2 w-2 bg-red-500 rounded-full"></div>
          </div>
          <div>

            <p class="text-sm font-medium text-gray-900 dark:text-gray-100 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
              {{ item.data.title }}
            </p>
            <p class="text-xs font-medium text-gray-900 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
              {{ item.data.intro }}
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Published by Super Admin</p>
          </div>
        </a>
      </li>
    </ul>

    <!-- Footer -->
    <div class="mt-4 text-center">
      <a href="#" class="text-cyan-400 text-sm hover:underline flex items-center justify-center gap-1">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
        Access History
      </a>
    </div>
  </div>
</template>



<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from 'vue'
import axios from 'axios'

const notifications = ref([])
const show = ref(true)
let refreshInterval = null

async function fetchNotifications() {
  try {
    const res = await axios.get('/notifications') // Laravel route
    notifications.value = res.data
  } catch (error) {
    console.error('Error fetching notifications:', error)
  }
}

function closeBox() {
  show.value = false
}

// Format ISO timestamp to "Today, HH:mm" or "MM/DD/YYYY, HH:mm"
function formatTimestamp(isoString) {
  const date = new Date(isoString)
  const now = new Date()

  const isToday =
    date.getFullYear() === now.getFullYear() &&
    date.getMonth() === now.getMonth() &&
    date.getDate() === now.getDate()

  const timeFormatter = new Intl.DateTimeFormat(undefined, {
    hour: '2-digit',
    minute: '2-digit'
  })

  return `${isToday ? 'Today' : date.toLocaleDateString()}, ${timeFormatter.format(date)}`
}

onMounted(() => {
  fetchNotifications() // initial load

  // Watch for changes in "show"
  watch(show, (isVisible) => {
    if (isVisible) {
      // start refreshing every 10s
      refreshInterval = setInterval(fetchNotifications, 10000)
    } else {
      // stop refreshing
      clearInterval(refreshInterval)
      refreshInterval = null
    }
  }, { immediate: true })
})

onBeforeUnmount(() => {
  // cleanup
  if (refreshInterval) clearInterval(refreshInterval)
})
</script>

