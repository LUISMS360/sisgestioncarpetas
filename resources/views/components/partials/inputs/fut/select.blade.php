@props(['label' => ''])

@php
    $name = $attributes->wire('model')->value();
@endphp

<div>
    <div class="input-group mb-3">
        <label class="input-group-text @error($name) border-danger text-danger @enderror">
            {{ $label }}
        </label>
        
        <select
            {{ $attributes->merge(['class' => 'form-select ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>
            <option value="" selected>Seleccione</option>
            {{ $slot }}
        </select>
    </div>

    @error($name)
        <div class="small text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>
