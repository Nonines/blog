@extends('layouts.app')

@section('content')
    @include("partials._header")

    <div class="col-lg-8">
        @unless (count($articles) < 1)
        <!-- Featured blog post here-->
        <x-featured-article-card :article="$articles[0]"/>

        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <div class="col-lg-6">
                @foreach ($articles->nth(2) as $article)
                <x-article-card :article="$article"/>
                @endforeach
            </div>

            <div class="col-lg-6">
                @foreach ($articles->nth(2, 1) as $article)
                <x-article-card :article="$article"/>
                @endforeach
            </div>
        </div>
        @endunless

        <!-- Pagination-->
        {{ $articles->appends($_GET)->links() }}
    </div>
@endsection
