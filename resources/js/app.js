import "./bootstrap";
import { createApp } from "vue";
import NotificationBox from "./Components/NotificationBox.vue";

document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("openNotificationBtn");
    btn?.addEventListener("click", () => {
        const mountPoint = document.getElementById("notification-box");
        createApp(NotificationBox).mount("#notification-box");
    });
});

const res = await axios.get("/me");
const userRole = res.data.role;
if (userRole === "donor") {
    let notiBadge = document.getElementById("notificationCount");
    let pollingInterval;

    let lastUnreadCount = parseInt(
        localStorage.getItem("lastUnreadCount") || "0"
    );
    const audio = new Audio("/sounds/notification.mp3"); // file in public/sounds/

    // Function to fetch notifications
    async function updateNotifications() {
        try {
            const res = await axios.get("/notifications");
            const unreadCount = res.data.filter((n) => !n.read_at).length;

            // Play sound only if count increased
            if (unreadCount > lastUnreadCount) {
                audio
                    .play()
                    .catch((err) => console.warn("Audio play blocked:", err));
            }

            // Save current count to memory + storage
            lastUnreadCount = unreadCount;
            localStorage.setItem("lastUnreadCount", unreadCount);

            // Update badge
            if (unreadCount > 0) {
                notiBadge.textContent = unreadCount;
                notiBadge.style.display = "inline-block";
            } else {
                notiBadge.style.display = "none";
            }
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
    //show and hide psw
}

document.querySelectorAll(".password-field .toggle-password").forEach((btn) => {
    btn.addEventListener("click", () => {
        const wrapper = btn.closest(".password-field");
        const input = wrapper.querySelector("input");
        const icon = btn.querySelector("i");
        const show = input.type === "password";

        input.type = show ? "text" : "password";
        icon.classList.toggle("fa-eye-slash", !show);
        icon.classList.toggle("fa-eye", show);
    });
});


