<x-layout title="Admin Dashboard">
    <div class="flex w-full h-screen text-black overflow-hidden">
        <!-- Sidebar (fixed height, scroll-independent) -->
        <x-side-bar />
        <div class="flex flex-col w-[85%] h-full">
            {{$slot}}
        </div>
    </div>
</x-layout>
