@props(['type' => 'text', 'id', 'name', 'placeholder', 'label', 'value' => ''])

<div class="mb-6">
    @if(isset($label))
        <x-label :label="$label" />
    @endif
    
    <input 
        type="{{ $type }}" 
        id="{{ $id }}" 
        name="{{ $name}}" 
        placeholder="{{ $placeholder ?? '' }}" 
        value="{{ $value ?? ''}}"
        {{ $attributes->merge(['class' => 'bg-white/90 text-black rounded-xl px-4 py-3 outline-none w-full focus:ring-2 focus:ring-red-400']) }}
    >
    
    @error($name)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>