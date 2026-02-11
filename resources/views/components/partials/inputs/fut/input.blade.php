@props(['label'=>'','desc'=>''])
@php
$name = $attributes->wire('model')->value();
@endphp
<div>
    <div class="mb-3">
        <div class="row">
            <div class="col-sm-3">
                @if($label)
                <label for="{{ $name }}" class="form-label mt-2 fw-bold @error($name) text-danger @enderror">{{$label}}</label>
                @endif
            </div>
            <div class="col-sm-9">
                <input
                    id="{{ $name }}"
                    type="text"
                    {{$attributes->merge(['class'=>'form-control '.($errors->has($name) ? 'is-invalid': '')])}} />
                @if($desc)
                <small id="helpId" class="form-text text-muted">{{$desc}}</small>
                @endif
            </div>
        </div>
        @error($name)
        <div class="small text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
</div>