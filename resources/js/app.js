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

let lastUnreadCount = 0;
const audio = new Audio("/sounds/notification.mp3"); // file in public/sounds/

// Function to fetch notifications
async function updateNotifications() {
    try {
        const res = await axios.get("/notifications");
        const unreadCount = res.data.filter((n) => !n.read_at).length;

        if (unreadCount > lastUnreadCount) {
            audio
                .play()
                .catch((err) => console.warn("Audio play blocked:", err));
        }

        lastUnreadCount = unreadCount; // update memory

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
// request info

const stateToTownships = {
    "01": [
        "BaMaNa", // Bhamo
        "KhaHpaNa", // Chipwi
        "DaHpaYa", // Dawthponeyan
        "HaPaNa", // Hopin
        "HpaKaNa", // Hpakant
        "AhGaYa", // Injangyang
        "KaMaTa", // Kamaing
        "KaPaTa", // Kan Paik Ti
        "KhaLaHpa", // Khaunglanhpu
        "LaGaNa", // Lwegel
        "MaKhaBa", // Machanbaw
        "MaSaNa", // Mansi
        "MaKaTa", // Mogaung
        "MaNyaNa", // Mohnyin
        "MaMaNa", // Momauk
        "MaKaNa", // Myitkyina
        "MaLaNa", // Myo Hla
        "NaMaNa", // Nawngmun
        "PaWaNa", // Pang War
        "PaNaDa", // Pannandin
        "PaTaAh", // Puta-O
        "SaDaNa", // Sadung
        "YaBaYa", // Shin Bway Yang
        "YaKaNa", // Shwegu
        "SaBaNa", // Sinbo
        "SaPaYa", // Sumprabum
        "TaNaNa", // Tanai
        "TaSaLa", // Tsawlaw
        "WaMaNa", // Waingmaw
    ],
    "02": [
        "BaLaKha", // Bawlakhe
        "DaMaSa", // Demoso
        "HpaSaNa", // Hpasawng
        "HpaYaSa", // Hpruso
        "LaKaNa", // Loikaw
        "MaSaNa", // Mese
        "YaTaNa", // Shadaw
        "YaThaNa", // Ywarthit
    ],
    "03": [
        "BaGaLa", // Baw Ga Li
        "LaBaNa", // Hlaingbwe
        "BaAhNa", // Hpa-An
        "HpaPaNa", // Hpapun
        "BaThaSa", // Hpayarthonesu
        "KaMaMa", // Kamarmaung
        "KaKaYa", // Kawkareik
        "KaDaNa", // Kyaikdon
        "KaSaKa", // Kyainseikgyi
        "KaDaTa", // Kyondoe
        "LaThaNa", // Leik Tho
        "MaWaTa", // Myawaddy
        "PaKaNa", // Paingkyon
        "YaYaTha", // Shan Ywar Thit
        "SaKaLa", // Su Ka Li
        "ThaTaNa", // Thandaung
        "ThaTaKa", // Thandaunggyi
        "WaLaMa", // Lay Myaing (Waw Lay)
    ],
    "04": [
        "KaKhaNa", // Cikha
        "HpaLaNa", // Falam
        "HaKhaNa", // Hakha
        "KaPaLa", // Kanpetlet
        "MaTaPa", // Matupi
        "MaTaNa", // Mindat
        "PaLaWa", // Paletwa
        "YaZaNa", // Rezua
        "YaKhaDa", // Rihkhawdar
        "SaMaNa", // Samee
        "TaTaNa", // Tedim
        "HtaTaLa", // Thantlang
        "TaZaNa", // Tonzang
    ],
    "05": [
        "AhYaTa", // Ayadaw
        "BaMaNa", // Banmauk
        "BaTaLa", // Budalin
        "KhaOuTa", // Chaung-U
        "KhaTaNa", // Hkamti
        "HaMaLa", // Homalin
        "AhTaNa", // Indaw
        "KaLaHta", // Kale
        "KaLaWa", // Kalewa
        "KaBaLa", // Kanbalu
        "KaNaNa", // Kani
        "KaThaNa", // Katha
        "KaLaTa", // Kawlin
        "KhaOuNa", // Khin-U
        "KaLaNa", // Kyunhla
        "LaHaNa", // Lahe
        "LaYaNa", // Layshi
        "MaLaNa", // Mawlaik
        "MaKaNa", // Mingin
        "MaYaNa", // Monywa
        "MaMaNa", // Myaung
        "MaMaTa", // Myinmu
        "NaYaNa", // Nanyun
        "NgaZaNa", // Ngazun
        "PaLaNa", // Pale
        "HpaPaNa", // Paungbyin
        "PaLaBa", // Pinlebu
        "SaKaNa", // Sagaing
        "SaLaKa", // Salingyi
        "YaBaNa", // Shwebo
        "DaPaYa", // Tabayin
        "TaMaNa", // Tamu
        "TaSaNa", // Taze
        "HtaKhaNa", // Tigyaing
        "WaLaNa", // Wetleet
        "WaThaNa", // Wuntho
        "YaOuNa", // Ye-U
        "YaMaPa", // Yinmabin
        "KaMaNa", // Kyaukmyaung
        "KhaPaNa", // Khampat
    ],
    "06": [
        "BaPaNa", // Bokpyin
        "HtaWaNa", // Dawei
        "KaLaAh", // Kaleinaung
        "KaThaNa", // Kawthoung
        "KaSaNa", // Kyunsu
        "LaLaNa", // Launglon
        "MaMaNa", // Myeik
        "PaLaNa", // Palaw
        "TaThaYa", // Tanintharyi
        "ThaYaKha", // Thayetchaung
        "YaHpaNa", // Yepyu
        "KhaMaNa", // Khamaukgyi
        "MaTaNa", // Myittar
        "PaLaTa", // Palauk
        "KaYaYa", // Karathuri
    ],
    "07": [
        "DaOuNa", // Daik-U
        "KaPaKa", // Gyobingauk
        "KaWaNa", // Kawa
        "KaKaNa", // Kyaukkyi
        "KaTaKha", // Kyauktaga
        "LaPaTa", // Letpadan
        "MaLaNa", // Minhla
        "MaNyaNa", // Monyo
        "NaTaLa", // Nattalin
        "NyaLaPa", // Nyaunglebin
        "AhHpaNa", // Okpho
        "AhTaNa", // Oktwin
        "PaTaNa", // Padaung
        "PaKhaTa", // Pauk Kaung
        "PaKhaNa", // Bago
        "PaTaTa", // Paungde
        "PaNaKa", // Penwegone
        "HpaMaNa", // Phyu
        "PaMaNa", // Pyay
        "YaTaNa", // Shwedaung
        "YaKaNa", // Shwegyin
        "HtaTaPa", // Tantabin
        "TaNgaNa", // Taungoo
        "ThaNaPa", // Thanatpin
        "ThaWaTa", // Thayarwady
        "ThaKaNa", // Thegon
        "ThaSaNa", // Thonze
        "WaMaNa", // Waw
        "YaTaYa", // Yedashe
        "ZaKaNa", // Zigon
        "PaTaSa", // Pyontahsar
    ],
    "08": [
        "AhLaNa", // Aunglan
        "KhaMaNa", // Chauk
        "GaGaNa", // Gangaw
        "KaMaNa", // Kamma
        "MaKaNa", // Magwe
        "MaBaNa", // Minbu (Sagu)
        "MaTaNa", // Mindon
        "MaLaNa", // Minhla
        "MaMaNa", // Myaing
        "MaHtaNa", // Myayhtae
        "MaThaNa", // Myothit
        "NaMaNa", // Natmauk
        "NgaHpaNa", // Ngape
        "PaKhaKa", // Pakokku
        "PaMaNa", // Pauk
        "PaHpaNa", // Pwintbyu
        "SaLaNa", // Salin
        "SaMaNa", // Saw
        "SaHpaNa", // Seikphyu
        "SaTaYa", // Sidoktaya
        "SaPaWa", // Sinbaungwe
        "TaTaKa", // Taungdwingyi
        "ThaYaNa", // Thayet
        "HtaLaNa", // Tilin
        "YaNaKha", // Yenangyaung
        "YaSaKa", // Yesagyo
        "KaHtaNa", // Kyaukhtu
    ],
    "09": [
        "AhMaYa", // Amarapura
        "AhMaZa", // Aungmyaythazan
        "KhaAhZa", // Chanayethazan
        "KhaMaSa", // Chanmyathazi
        "KaPaTa", // Kyukpadaung
        "KaSaNa", // Kyaukse
        "MaTaYa", // Madaya
        "MaHaMa", // Mahaaungmyay
        "MaLaNa", // Mahlaing
        "MaHtaLa", // Meiktila
        "MaKaNa", // Mogoke
        "MaKhaNa", // Myingyan
        "MaThaNa", // Myittha
        "NaHtaKa", // Natogyi
        "NgaThaYa", // Ngathayouk
        "NgaZaNa", // Ngazun
        "NyaOuNa", // Nyaung-U
        "PaThaKa", // Patheingyi
        "PaBaNa", // Pyawbwe
        "PaKaKha", // Pyigyitagon
        "PaOuLa", // Pyinoolwin
        "SaKaNa", // Singu
        "SaKaTa", // Sintgaing
        "ThaPaKa", // Tabeikkyin
        "TaTaOu", // Tada-U
        "TaThaNa", // Taungtha
        "ThaSaNa", // Thazi
        "WaTaNa", // Wundwin
        "YaMaTha", // Yemathin
        "TaKaTa", // Tagaung
        "MaMaNa", // Maymyo
        "DaKhaTha", // Dekhinathiri
        "LaWaNa", // Lewe
        "OuTaTha", // Ottarathiri
        "PaBaTha", // Popathiri
        "PaMaNa", // Pyinmana
        "TaKaNa", // Tatkon
        "ZaBaTha", // Zabuthiri
        "ZaYaTha", // Zayarthiri
    ],
    10: [
        "BaLaNa", // Billin
        "KhaSaNa", // Chaungzon
        "KhaZaNa", // Khawzar
        "KaMaYa", // Kyaikmaraw
        "KaHtaNa", // Kyaikto
        "LaMaNa", // Lamine
        "MaLaMa", // Mawlamyine
        "MaDaNa", // Mudon
        "PaMaNa", // Paung
        "ThaHpaYa", // Thanbyuzayat
        "ThaHtaNa", // Thaton
        "YaMaNa", // Ye
    ],
    11: [
        "AhMaNa", // Ann
        "BaThaTa", // Buthidaung
        "GaMaNa", // Gwa
        "KaHpaNa", // Kyaukpyu
        "KaTaNa", // Kyauktaw
        "MaAhTa", // Maei
        "MaTaNa", // Maungdaw
        "MaPaNa", // Minbya
        "MaAhNa", // Munaung
        "MaOuNa", // Myauk-U
        "MaPaTa", // Myebon
        "PaTaNa", // Pauktaw
        "PaNaTa", // Ponnagyun
        "YaBaNa", // Ramree
        "YaThaTa", // Rathedaung
        "SaTaNa", // Sittwe
        "ThaTaNa", // Thandwe
        "TaKaNa", // Toungup
        "KaTaLa", // Kyeintali
        "TaPaWa", // Taungpyolatwae
    ],
    12: [
        "AhLaNa", // Ahlone
        "BaHaNa", // Bahan
        "BaTaHta", // Botahtaung
        "KaKaKa", // Cocokyun
        "DaGaYa", // Dagon East
        "DaGaMa", // Dagon North
        "DaGaSa", // Dagon Seikkan
        "DaGaTa", // Dagon South
        "DaGaNa", // Dagon
        "DaLaNa", // Dala
        "DaPaNa", // Dawbon
        "LaThaYa", // Hlaingtharya
        "LaMaNa", // Hlaing
        "LaKaNa", // Hlegu
        "MaBaNa", // Hmawbi
        "HtaTaPa", // Htantabin
        "AhSaNa", // Insein
        "KaMaYa", // Kamayut
        "KaMaNa", // Kawhmu
        "KhaYaNa", // Kayan
        "KaKhaKa", // Kungyangon
        "KaTaTa", // KyauktaDa
        "KaTaNa", // Kyauktan
        "KaMaTa", // Kyimyindaing
        "LaMaTa", // Lanmadaw
        "LaThaNa", // Latha
        "MaYaKa", // Mayangone
        "MaGaDa", // Mingaladon
        "MaGaTa", // Mingalartaungnyunt
        "OuKaMa", // North Okkalapa
        "PaBaTa", // Pabedan
        "PaZaTa", // Pazundaung
        "SaKhaNa", // Sanchaung
        "SaKaKha", // Seikgyikanaungto
        "SaKaNa", // Seikkan
        "YaPaTha", // Shwepyithar
        "OuKaTa", // South Okkalapa
        "TaTaHta", // Tada
        "TaKaNa", // Taikkyi
        "TaMaNa", // Tamwe
        "ThaKaTa", // Thaketa
        "ThaLaNa", // Thanlyin
        "ThaGaKa", // Thingangkuun
        "ThaKhaNa", // Thongwa
        "TaTaNa", // Twantay
        "YaKaNa", // Yankin
        "OuKaNa", // Oakkan
    ],
    13: [
        "AhMaNa", // Aikmu
        "AhLaNa", // Aungban
        "AhYaTa", // Ayethaya
        "BaHpaNa", // Bawlake
        "BaMaNa", // Bhamo (likely duplication, sometimes appears in border zones)
        "BaNaNa", // Banhin
        "BaThaNa", // Bawsaing
        "DaNaNa", // Danu Self-Administered Zone
        "HaMaNa", // Hopang
        "HaPaNa", // Hsihseng
        "HaTaNa", // Hseni
        "KaHaNa", // Kehsi
        "KaLaNa", // Kalaw
        "KaPaNa", // Kengtung
        "KaTaNa", // Kunhing
        "KaTaKa", // Kyaukme
        "KhaSaNa", // Khaunglanhpu (border overlap noted in some documents)
        "LaKaNa", // Langkho
        "LaYaNa", // Laukkaing
        "LaBaNa", // Lawksawk
        "MaAuNa", // Maingkaing
        "MaHpaNa", // Maingpyin
        "MaTaNa", // Matman
        "MaHtaNa", // Monghsat
        "MaYaNa", // Mongyai
        "MaKaNa", // Mongkhet
        "MaSaNa", // Mawkmai
        "MaLaNa", // Muse
        "MaNaNa", // Namhsan
        "MaTaPa", // Namkham
        "NaKaNa", // Namsang
        "NaTaNa", // Namtit
        "PaHpaNa", // Panglong
        "PaLaNa", // Pangsang
        "PaPaNa", // Pindaya
        "PaTaNa", // Pinlaung
        "SaKaNa", // Sakangyi
        "SaLaNa", // Salween
        "SaMaNa", // Shan Ywar Thit (may appear again as shared zone)
        "TaTaNa", // Taunggyi
        "TaKaNa", // Tachileik
        "TaLaNa", // Tangyan
        "ThaPaNa", // Thibaw
        "ThaTaNa", // Theinni
        "WaLaNa", // Wanmaw
        "YaKaNa", // Yaksawk
        "YaTaNa", // Ywangan
        "ZaYaNa", // Zayatkyi
    ],

    14: [
        "DaBaYa", // Dedaye
        "AiMaNa", // Einme
        "HaKyaKa", // Haigyi Island
        "HtaTaNa", // Hinthada
        "AnGaPa", // Ingapu
        "KaKhaNa", // Kangyidaunt
        "KyaLaNa", // Kyaiklat
        "KyaNaNa", // Kyangin
        "KaKaNa", // Kyaunggon
        "KaPaNa", // Kyonpyaw
        "LaBaTa", // Labutta
        "LaMaNa", // Lemeyethna
        "MaAuNa", // Maubin
        "MaMaKa", // Mawlamyinegyun
        "MaAhNa", // Myanaung
        "MaMaNa", // Myaungmya
        "NgaPaTa", // Ngapudaw
        "NgaThaKa", // Ngathaingchaung
        "NyaBaNa", // Ngayokekaung
        "NgaSaNa", // Ngewsaung
        "NgaThaNa", // Ngwesaung
        "NyaTaNa", // Nyaungdon
        "PaTaNa", // Pantanaw
        "PaThaNa", // Pathein
        "PaPaNa", // Pyapon
        "PyiSaNa", // Pyinsalu
        "ThaYaNa", // Shwethaungyan
        "ThaBaNa", // Thabaung
        "WaKaNa", // Wakema
        "YaKaNa", // Yegyi
        "ZaLaNa", // Zalun
    ],
};
const existingTownship = "{{ old('nrc-township', $nrc_township ?? '') }}";

function populateTownships(state) {
    const townshipSelect = document.getElementById("nrc-township");
    townshipSelect.innerHTML =
        '<option value="" disabled>Select township</option>';

    if (state && stateToTownships[state]) {
        stateToTownships[state].forEach((township) => {
            const option = document.createElement("option");
            option.value = township;
            option.textContent = township;
            if (township === existingTownship) {
                option.selected = true;
            }
            townshipSelect.appendChild(option);
        });
    }
}

document.getElementById("nrc-state").addEventListener("change", function () {
    populateTownships(this.value);
});

window.addEventListener("DOMContentLoaded", () => {
    const stateSelect = document.getElementById("nrc-state");
    if (stateSelect.value) {
        populateTownships(stateSelect.value);
    }
});
// Function to handle file previews
const profilePicInput = document.getElementById("profile_img");
const profilePreview = document.getElementById("profile-preview");

profilePicInput.addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            profilePreview.style.backgroundImage = `url(${event.target.result})`;
            profilePreview.innerHTML = "";
        };
        reader.readAsDataURL(file);
    }
});

// Function to handle file previews
function setupFilePreview(inputId, previewId, placeholderId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    const placeholder = document.getElementById(placeholderId);

    input.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) {
            // Clear previous preview
            preview.style.backgroundImage = "none";
            preview.innerHTML = "";

            // Check if file is an image
            if (file.type.match("image.*")) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    preview.style.backgroundImage = `url(${event.target.result})`;
                    preview.classList.remove("hidden");
                    placeholder.classList.add("hidden");
                };
                reader.readAsDataURL(file);
            } else if (file.type === "application/pdf") {
                // For PDF files, show a PDF icon
                preview.innerHTML = `
                        <div class="flex flex-col items-center justify-center h-full">
                            <i class="fas fa-file-pdf text-5xl text-accent mb-2"></i>
                            <p class="text-sm font-medium text-gray-200">${file.name}</p>
                        </div>
                    `;
                preview.classList.remove("hidden");
                placeholder.classList.add("hidden");
            } else {
                // For other file types (shouldn't happen with accept attribute)
                preview.innerHTML = `
                        <div class="flex flex-col items-center justify-center h-full">
                            <i class="fas fa-file text-5xl text-accent mb-2"></i>
                            <p class="text-sm font-medium text-gray-200">${file.name}</p>
                        </div>
                    `;
                preview.classList.remove("hidden");
                placeholder.classList.add("hidden");
            }
        }
    });
}

// Set up previews for all file inputs
setupFilePreview("nrc-front", "nrc-front-preview", "nrc-front-placeholder");
setupFilePreview("nrc-back", "nrc-back-preview", "nrc-back-placeholder");
setupFilePreview(
    "health-certificate",
    "health-cert-preview",
    "health-cert-placeholder"
);
