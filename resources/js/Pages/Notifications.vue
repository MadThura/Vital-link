<template>
  <div class="p-6">
    <h1 class="text-xl font-bold mb-4">Notifications</h1>
    
    <div v-if="notifications.length === 0">
      No notifications found.
    </div>

    <ul>
      <li v-for="noti in notifications" :key="noti.id" class="border p-3 mb-2 rounded">
        <a :href="noti.data.url" class="text-blue-500 font-medium">
          {{ noti.data.title }}
        </a>
        <small class="block text-gray-500">
          {{ new Date(noti.created_at).toLocaleString() }}
        </small>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from 'vue'

const props = defineProps({
  notifications: Array
})

const notifications = ref(props.notifications ?? [])

// Fetch notifications from backend
async function fetchNotifications() {
  try {
    const res = await fetch('/notifications') // Laravel route returning JSON
    if (!res.ok) throw new Error('Failed to fetch notifications')
    const data = await res.json()

    // Compare old and new IDs
    const oldIds = notifications.value.map(n => n.id).join(',')
    const newIds = data.map(n => n.id).join(',')

    if (oldIds !== newIds) {
      console.log('🔄 New notifications detected — reloading page')
      window.location.reload()
    } else {
      console.log('✅ No new notifications')
    }
  } catch (error) {
    console.error(error)
  }
}

let intervalId

onMounted(() => {
  intervalId = setInterval(fetchNotifications, 10000)
})

onUnmounted(() => {
  clearInterval(intervalId)
})

</script>
