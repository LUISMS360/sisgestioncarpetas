@props(['label'=>'',])
@php
$name = $attributes->wire('model')->value();
@endphp
<div>
    <div class="mb-3">
        <label for="" class="form-label mt-2 fw-bold  @error($name) text-danger @enderror">{{$label}}</label>
        <textarea
            {{$attributes->merge(['class'=>'form-control '.($errors->has($name) ? 'is-invalid' : '' )])}}
            id="" rows="8"></textarea>
        @error($name)
        <div class="small text-danger mt-1">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>