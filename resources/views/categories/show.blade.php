@extends('layouts.app')

@section('content')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">{{$category->title}}</h1>
                <p class="lead mb-0">{{$category->details}}</p>
            </div>
        </div>
    </header>

    <div class="col-lg-8">
        <!-- Nested row for non-featured blog posts-->
        @unless (count($category_articles) < 1)
        <div class="row">
            <div class="col-lg-6">
                @foreach ($category_articles->nth(2) as $article)
                <x-article-card :article="$article"/>
                @endforeach
            </div>

            <div class="col-lg-6">
                @foreach ($category_articles->nth(2, 1) as $article)
                <x-article-card :article="$article"/>
                @endforeach
            </div>
        </div>
        @endunless

        <!-- Pagination-->
        {{ $category_articles->appends($_GET)->links() }}
    </div>
@endsection
