<div class="max-w-sm relative">
    <input type="file" id="{{ $filename }}" name="{{ $filename }}" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
    <label for="{{ $filename }}"
        class="flex items-center gap-2 px-4 py-2 bg-white rounded-md border border-gray-300 hover:border-indigo-400 group transition-all duration-200">
        <!-- Upload icon with hover effect -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>

        <!-- Text with hover effect -->
        <span class="text-sm font-medium text-gray-700 group-hover:text-indigo-600">Choose file</span>

        <!-- File name display -->
        <span id="file-name-{{ $filename }}" class="ml-auto text-sm text-gray-500 truncate max-w-[120px] group-hover:text-indigo-500">No file</span>
    </label>
</div>

<script>
    document.getElementById('{{ $filename }}').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'No file';
        document.getElementById('file-name-{{ $filename }}').textContent = fileName;
    });
</script>