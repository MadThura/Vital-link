<div class="w-full max-w-xl p-6 rounded-2xl bg-white/5 backdrop-blur-md shadow-lg hover:bg-white/15 transition-colors">
    <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col">
        @csrf
        <x-input-field.full-name/>
        <x-input-field.gender/>
        <x-input-field.blood-type/>
        <x-input-field.dob/>
        <x-input-field.certificate/>
        <x-input-field.nrc/>
        <x-input-field.ph-number/>
        <x-input-field.address/>
        <x-button.submit name="Comfirm"/>
    </form>
</div>
