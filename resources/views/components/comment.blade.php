@props(["comments"])

@foreach ($comments as $comment)

<div class="d-flex mb-4">
    <div class="ms-3">
        <div class="fw-bold">{{$comment->name}}</div>
        {{$comment->content}}
    </div>
    <div class="flex-shrink-0">
        <a href="{{route("comments.reply", $comment)}}"><i class="fa fa-commenting" aria-hidden="true"></i>Reply</a>
    </div>
</div>

@if (count($comment->replies) > 0)
<div class="ms-5">
    <x-comment :comments="$comment->replies"/>
</div>
@endif

@endforeach
