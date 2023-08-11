@extends('layouts.app')

@section('content')

<div class="d-flex my-4">
    <div class="ms-3">
        <div class="fw-bold">{{$comment->name}}</div>
        {{$comment->content}}
    </div>
</div>
<div class="col-lg-8 mb-5">
    <form method="POST" action="/comments" class="mb-5">
        @csrf
        <input type="hidden" name="article_id" value="{{$article_id}}">
        <input type="hidden" name="parent_id" value="{{$comment->id}}">

        <textarea name="content" class="form-control mb-2" rows="3" placeholder="Write your response here" required>{{old("content")}}</textarea>
        @error("content")
        <p class="mt-1 text-warning">{{$message}}</p>
        @enderror

        <input type="text" name="name" class="form-control mb-2" rows="3" placeholder="Your name" required value="{{old("name")}}">
        @error("name")
        <p class="mt-1 text-warning">{{$message}}</p>
        @enderror

        <button class="btn btn-primary" type="submit">Reply</button>
        <a class="btn btn-secondary" href="/articles/{{$article_id}}">Back</a>
    </form>
</div>
@endsection
