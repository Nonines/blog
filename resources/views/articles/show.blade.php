@extends('layouts.app')

@section('content')

<!-- Post header-->
<header class="mb-4 pt-5">
    <!-- Post title-->
    <h1 class="fw-bolder mb-1">{{$article->title}}</h1>
    <!-- Post meta content-->
    <div class="text-muted fst-italic mb-2">Posted on {{$article->created_at}} by {{$article->author->name}}</div>
    <!-- Post categories-->
    <a class="badge bg-secondary text-decoration-none link-light" href="/categories/{{$article->category ? $article->category->id : ""}}">{{$article->category ? $article->category->title : ""}}</a>
    {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> --}}
</header>
<div class="col-lg-8">
    <!-- Post content-->
    <article>
        <!-- Preview image figure-->
        <figure class="mb-4"><img class="img-fluid rounded" src="{{$article->image ? asset("/storage/" . $article->image) : asset("storage/images/default_article_image.png")}}" alt="..." /></figure>
        <!-- Post content-->
        <section class="mb-1">
            <h2 class="fw-bolder mb-4 mt-5">{{$article->excerpt}}</h2>
            <p class="fs-5 mb-4">{{$article->content}}</p>
        </section>
        <!-- Tags -->
        <section class="mb-4">
            Tags:
            @foreach ($article->tags as $tag)
            <span class="badge text-bg-secondary me-1"><a href="/tags/{{$tag->id}}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{$tag->title}}</a></span>
            @endforeach
        </section>
    </article>

    <!-- Comments section-->
    <section class="mb-5">
        <div class="card bg-light">
            <div class="card-body">
                <!-- Comment form-->
                <form method="POST" action="/comments" class="mb-4">
                    @csrf
                    <input type="hidden" name="article_id" value="{{$article->id}}">

                    <textarea name="content" class="form-control mb-2" rows="3" placeholder="Join the discussion and leave a comment!" required>{{old("content")}}</textarea>
                    @error("content")
                    <p class="mt-1 text-warning">{{$message}}</p>
                    @enderror

                    <input type="text" name="name" class="form-control mb-2" rows="3" placeholder="Your name" required value="{{old("name")}}">
                    @error("name")
                    <p class="mt-1 text-warning">{{$message}}</p>
                    @enderror

                    <button class="btn btn-primary" id="button-comment" type="submit">Comment</button>
                </form>

                <x-comment :comments="$article->comments" />
            </div>
        </div>
    </section>
</div>

@endsection
