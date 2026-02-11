@props(['label' => '', 'radio' => ''])

@php
$name = $attributes->wire('model')->value();
// Creamos un ID único para que el click en el texto active el radio
$id = $radio . '-' . Str::slug($label);
@endphp

<div class="d-inline-block">
    <div class="form-check">
        <input
            type="radio"
            id="{{ $id }}"
            name="{{ $radio }}"
            {{ $attributes->merge(['class' => 'form-check-input ' . ($errors->has($name) ? 'is-invalid' : '')]) }} />
        <label for="{{ $id }}" class="form-check-label fw-bold @error($name) text-danger @enderror">
            {{ $label }}
        </label>
        @error($name)
        <div class="small text-danger mt-1">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>