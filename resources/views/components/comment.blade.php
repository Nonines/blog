@props(["comments"])

@foreach ($comments as $comment)

<div class="d-flex mb-4">
    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
    <div class="ms-3">
        <div class="fw-bold">{{$comment->name}}</div>
        {{$comment->content}}
    </div>
</div>

@endforeach
