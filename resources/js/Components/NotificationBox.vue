<template>
  <div
    v-if="show"
    class="fixed right-[10%] top-[100%] w-80 bg-white shadow-lg border border-gray-300 p-4 overflow-y-auto rounded-lg"
  >
    <div class="flex justify-between items-center mb-4">
      <h2 class="font-bold text-lg">Notifications</h2>
      <button @click="closeBox" class="text-gray-500 hover:text-gray-700">✖</button>
    </div>
    <ul>
      <li
        v-for="item in notifications"
        :key="item.id"
        class="border-b py-2"
      >
        <a
          :href="item.data.url"
          target="_blank"
          class="text-blue-600 hover:underline"
        >
          {{ item.data.title }}
        </a>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const notifications = ref([])
const show = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get('/notifications') // Laravel route
    notifications.value = res.data
    // console.log(notifications.value);
  } catch (error) {
    console.error('Error fetching notifications:', error)
  }
})

function closeBox() {
  show.value = false
}
</script>	
