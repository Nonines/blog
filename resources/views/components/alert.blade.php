@if (session()->has("message"))

<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>{{session("message")}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif (session()->has("warning"))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session("warning")}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
