<input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mt-6 outline-none focus:ring-2 focus:ring-red-400" />
    @error($name)
            <p class="text-white-500 text-sm">{{ $message }}</p>
    @enderror
