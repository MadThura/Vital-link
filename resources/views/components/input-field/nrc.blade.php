<!-- NRC Number -->
<label for="nrc-number" class="block mb-2 text-sm font-medium text-white">NRC Number</label>
<div class="flex flex-wrap gap-2 mb-6" id="nrc-number">
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
        <option value="BA">BA</option>
        <option value="MA">MA</option>
        <option value="TH">TH</option>
        <option value="YGN">YGN</option>
        <!-- Add more as needed -->
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
    <input type="text" id="nrc-number-input" name="nrc-number" maxlength="6" placeholder="123456" pattern="[0-9]{6}"
        title="Enter 6 digit NRC number" required
        class="flex-1 min-w-[80px] bg-white/90 text-black placeholder:text-gray-500 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400" />
</div>
