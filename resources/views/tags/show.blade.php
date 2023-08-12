@extends('layouts.app')

@section('content')

    <header class="my-4">
        <h1 class="fw-bolder">Articles tagged with <span class="badge text-bg-secondary me-1">{{$tag->title}}</span></h1>
    </header>

    <div class="col-lg-8">
        <!-- Nested row for non-featured blog posts-->
        @unless (count($tag_articles) < 1)
        <div class="row">
            <div class="col-lg-6">
                @foreach ($tag_articles->nth(2) as $article)
                <x-article-card :article="$article"/>
                @endforeach
            </div>

            <div class="col-lg-6">
                @foreach ($tag_articles->nth(2, 1) as $article)
                <x-article-card :article="$article"/>
                @endforeach
            </div>
        </div>
        @endunless

        <!-- Pagination-->
        {{ $tag_articles->appends($_GET)->links() }}
    </div>

@endsection
