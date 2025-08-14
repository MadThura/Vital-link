<template>
  <div
    v-if="show"
    class="fixed right-[10%] top-[100%] w-96 bg-gray-900 shadow-2xl border border-gray-700 p-4 overflow-y-auto rounded-2xl text-gray-300"
  >
    <!-- Header -->
    <div class="flex justify-between items-center mb-4 pb-2 border-b border-gray-700">
      <h2 class="flex items-center font-semibold text-lg text-cyan-400">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.2c-3.3 0-9.8 1.7-9.8 5v2.7h19.6v-2.7c0-3.3-6.5-5-9.8-5z"/></svg>
        Access Permissions
      </h2>
      <button @click="closeBox" class="text-gray-500 hover:text-gray-300">✖</button>
    </div>

    <!-- Notification list -->
    <ul class="space-y-4">
      <li
        v-for="item in notifications"
        :key="item.id"
        class="p-3 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors duration-200"
      >
        <div class="flex justify-between items-start">
          <div class="flex items-center gap-3">
            <!-- <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center text-white font-bold">
              {{ item.data.initials }}
            </div> -->
            <div>
              <a
                :href="item.data.url"
                target="_blank"
                class="text-cyan-400 font-semibold hover:underline"
              >
                {{ item.data.title }}
              </a>
              <div class="text-gray-400 text-sm">
                <div><span class="uppercase text-gray-500">Hospital:</span> {{ item.data.hospital }}</div>
                <div><span class="uppercase text-gray-500">Ward:</span> {{ item.data.ward }}</div>
                <div><span class="uppercase text-gray-500">Position:</span> {{ item.data.position }}</div>
                <div><span class="uppercase text-gray-500">Email:</span> {{ item.data.email }}</div>
              </div>
            </div>
          </div>
          <div class="text-gray-400 text-xs">
            {{ formatTimestamp(item.created_at) }}
          </div>
        </div>
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

