<div class="w-[35%] flex items-center justify-center p-6">
    <div
        class="bg-white/10 backdrop-blur-md rounded-2xl p-8 w-full max-w-md shadow-lg hover:bg-white/15 transition-colors">
        <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf   
            <x-input-field.email/>
            <x-input-field.psw id="password" placeholder="Enter your password"/>
            <x-button.submit name="Submit"/>
            <!-- Already have account -->
            <p class="text-center text-sm mt-4 text-gray-400">Don't have an account?
                <a href="{{ route('register') }}"
                    class="text-gray-400 hover:text-red-400 transition-colors underline">Register</a>
            </p>
        </form>
    </div>
</div>
