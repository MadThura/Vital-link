<x-layout title="{{ auth()->user()->role === 'blood_bank_admin' ? 'BloodBank Dashboard' : 'SuperAdmin Dashboard' }}">

    <div class="flex w-full h-screen text-black overflow-hidden">
        <x-side-bar/>
        <div class="flex flex-col w-[84%] h-full">
            <x-header/>
            {{ $slot }}
        </div>
    </div>
</x-layout>
