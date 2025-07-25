@props(['type', 'id', 'placeholder', 'name'])

<x-layout backgroundImage='/images/bg-blood.jpg' title="Register">
    <!-- Left Pane -->
    <x-left-pane />
    <!-- Right Pane -->
    <div class="w-[35%] flex items-center justify-center p-6">
        <div
            class="bg-white/10 backdrop-blur-md rounded-2xl p-8 w-full max-w-md shadow-lg hover:bg-white/15 transition-colors">
            <form action="/request-info" method="GET" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <x-input-field type="text" id="email" placeholder="Enter your email"/>
                <x-input-field type="password" id="password" placeholder="Enter new password" />
                <x-input-field type="password" id="password_comfirmation" placeholder="Comfirm password" />

                <x-submit-button name="Submit" />
          
                <p class="text-center text-sm mt-4 text-gray-400">Already have an account?
                    <a href="{{ route('login') }}"
                        class="text-gray-400 hover:text-red-400 transition-colors underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>
