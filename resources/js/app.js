import "./bootstrap";
import { createApp } from "vue";
import NotificationBox from "./Components/NotificationBox.vue";

document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("openNotificationBtn");
    btn?.addEventListener("click", () => {
        const mountPoint = document.getElementById("notification-box");
        // if (mountPoint.style.display === "none") {
        //     mountPoint.style.display = "block";
        //     createApp(NotificationBox).mount("#notification-box");
        // }
        createApp(NotificationBox).mount("#notification-box");
    });
});

let notiBadge = document.getElementById("notificationCount");
let pollingInterval;

// Function to fetch notifications
async function updateNotifications() {
    try {
        const res = await axios.get("/notifications");
        let unreadCount = res.data.filter((n) => !n.read_at).length;
        notiBadge.innerHTML = unreadCount;
    } catch (error) {
        console.error("Error fetching notifications:", error);
    }
}

// Start polling every 5 seconds
function startPolling() {
    updateNotifications(); // fetch immediately
    pollingInterval = setInterval(updateNotifications, 5000);
}

// Stop polling
function stopPolling() {
    clearInterval(pollingInterval);
}

// Listen for tab visibility changes
document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
        stopPolling(); // pause when tab is inactive
    } else {
        startPolling(); // resume when tab is active
    }
});

// Initialize
startPolling();
