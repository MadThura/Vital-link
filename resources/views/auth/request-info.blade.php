<x-layout backgroundImage='/images/bg-blood.jpg' title="Information">
    <div class="min-h-screen flex items-center justify-center w-full h-full">
        <div
            class="w-full max-w-xl h-[90vh] overflow-y-auto scrollbar-none p-6 rounded-2xl bg-white/5 backdrop-blur-md shadow-lg hover:bg-white/15 transition-colors">

            <form action="{{ route('donor.storeComplete') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col space-y-4">
                @method('POST')
                @csrf
                {{-- Profile Picture --}}
                <x-label label="Profile picture" />
                <x-input-field type="file" name="profile_img" placeholder=""></x-input-field>
                {{-- Full Name --}}
                <x-label label="Full Name" />
                <input type="text" name="fullname"
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mt-6 outline-none focus:ring-2 cursor-not-allowed"
                    value="{{ auth()->user()->name }}" disabled />

                {{-- Gender --}}
                <div class="mb-6 p-3">
                    <label class="block mb-2 text-sm font-medium text-white">Gender</label>
                    <div class="flex gap-6">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" id="gender-male" name="gender" value="Male" required
                                class="form-radio text-red-500 focus:ring-red-400" />
                            <span class="ml-2 text-white">Male</span>
                        </label>

                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" id="gender-female" name="gender" value="Female" required
                                class="form-radio text-red-500 focus:ring-red-400" />
                            <span class="ml-2 text-white">Female</span>
                        </label>
                    </div>

                </div>

                {{-- Blood Type --}}
                <x-label label="Blood Type" />
                <select id="blood_type" name="blood_type" required
                    class="bg-white/90 text-black rounded-xl px-4 py-3 mb-1 outline-none w-full focus:ring-2 focus:ring-red-400">
                    <option value="" disabled selected>Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>

                {{-- DOB --}}
                <x-label label="Date of Birth" />
                <x-input-field type="date" name="dob" placeholder="" />

                {{-- Health Certificate --}}
                <x-label label="Health Certificate" />
                <x-input-field type="file" name="health_certificate" placeholder=""></x-input-field>

                {{-- NRC Number --}}
                <x-label label="NRC Number"></x-label>
                <div class="flex flex-wrap gap-2 mb-1" name="nrc-number">
                    <!-- State/Region Number -->
                    <select id="nrc-state" name="nrc-state" required
                        class="flex-1 min-w-[20px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>State No.</option>
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i < 10 ? '0' . $i : $i }}">{{ $i < 10 ? '0' . $i : $i }}</option>
                        @endfor
                    </select>


                    <!-- Township Abbreviation -->
                    <select id="nrc-township" name="nrc-township" required
                        class="flex-1 min-w-[60px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>Township</option>
                    </select>


                    <!-- NRC Type -->
                    <select id="nrc-type" name="nrc-type" required
                        class="flex-1 min-w-[60px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>Type</option>
                        <option value="N">N</option>
                        <option value="NA">NA</option>
                        <option value="P">P</option>
                        <option value="T">T</option>
                    </select>


                    <!-- NRC Number -->
                    <input type="text" id="nrc-number-input" name="nrc-number" maxlength="6" placeholder="123456"
                        pattern="[0-9]{6}" title="Enter 6 digit NRC number" required
                        class="flex-1 min-w-[80px] bg-white/90 text-black placeholder:text-gray-500 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400" />

                </div>
                <x-label label="NRC Front" />
                <x-input-field type="file" name="nrc_front" placeholder=""></x-input-field>
                <x-label label="NRC Back" />
                <x-input-field type="file" name="nrc_back" placeholder=""></x-input-field>
                {{-- Phone Number --}}
                <x-label label="Phone Number"></x-label>
                <x-input-field type="tel" name="phone" placeholder="Enter your phone number" />

                {{-- Address --}}
                <x-label label="Address" />
                <textarea id="address" name="address" placeholder="Enter your address" required rows="3"
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-1 outline-none focus:ring-2 focus:ring-red-400 resize-none"></textarea>

                {{-- Submit --}}
                <x-submit-button name="Confirm" />

            </form>
        </div>

    </div>
</x-layout>
<script>
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
            "WaMaNa" // Waingmaw
        ],
        "02": [
            "BaLaKha", // Bawlakhe
            "DaMaSa", // Demoso
            "HpaSaNa", // Hpasawng
            "HpaYaSa", // Hpruso
            "LaKaNa", // Loikaw
            "MaSaNa", // Mese
            "YaTaNa", // Shadaw
            "YaThaNa" // Ywarthit
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
            "WaLaMa" // Lay Myaing (Waw Lay)
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
            "TaZaNa" // Tonzang
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
            "KhaPaNa" // Khampat
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
            "KaYaYa" // Karathuri
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
            "PaTaSa" // Pyontahsar
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
            "KaHtaNa" // Kyaukhtu
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
            "ZaYaTha" // Zayarthiri
        ],
        "10": [
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
            "YaMaNa" // Ye
        ],
        "11": [
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
            "TaPaWa" // Taungpyolatwae
        ],
        "12": [
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
            "OuKaNa" // Oakkan
        ],
        "13": [
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
            "ZaYaNa" // Zayatkyi
        ],

        "14": [
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
            "ZaLaNa" // Zalun
        ]
    };

    document.getElementById("nrc-state").addEventListener("change", function() {
        const state = this.value;
        const townshipSelect = document.getElementById("nrc-township");
        townshipSelect.innerHTML = '<option value="" disabled selected>Township</option>';

        if (state && stateToTownships[state]) {
            stateToTownships[state].forEach(township => {
                const option = document.createElement("option");
                option.value = township;
                option.textContent = township;
                townshipSelect.appendChild(option);
            });
        }
    });
</script>
