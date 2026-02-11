@props(['label' => '', 'desc' => ''])
<div class="container-fluid mt-4">
    <div class="mb-3">
        <label class="form-label">{{ $label }}</label>

        <input
            type="text"
            {{ $attributes->merge(['class' => 'form-control']) }}
            aria-describedby="helpId" />

        @if($desc)
        <small id="helpId" class="form-text text-muted">{{ $desc }}</small>
        @endif
    </div>
</div>