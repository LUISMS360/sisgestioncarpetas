@props(['title'=>'','content'=>''])
<div class="card border-0 shadow-sm p-3 bg-white" style="border-radius: 15px;">
    <div class="d-flex align-items-center">
        <div class="flex-shrink-0">
            <div class="bg-primary bg-opacity-10 p-3 rounded-fill">
                {{$slot}}
            </div>
        </div>
        <div class="flex-grow-1 ms-3">
            <h6 class="text-uppercase fw-bold text-muted mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">
                {{$title}}
            </h6>
            <h2 class="mb-0 fw-bold" style="color: #2c3e50;">
                {{ $content }}
            </h2>
        </div>
    </div>
</div>