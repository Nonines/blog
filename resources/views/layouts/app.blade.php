<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>Blog</title>

    <!-- Favicon-->
    {{-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> --}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
@include("partials._navbar")
<x-alert/>

<!-- Page content-->
<div class="container">
    <div class="row">
        @yield('content')

        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <form action="{{route("articles.index")}}">
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" name="search" type="text" placeholder="Enter search term..."
                                   aria-label="Enter search term..." aria-describedby="button-search" required
                                   value="{{request()->get("search")}}"/>
                            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                @foreach (\App\Helpers\QueryHelper::all_categories()->nth(2) as $category)
                                    <li><a href="{{route("categories.show", $category)}}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                @foreach (\App\Helpers\QueryHelper::all_categories()->nth(2, 1) as $category)
                                    <li><a href="{{route("categories.show", $category)}}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Latest tags</div>
                <div class="card-body">
                    @foreach (\App\Helpers\QueryHelper::latest_tags() as $tag)
                        <span class="badge text-bg-secondary me-1"><a href="{{route("tags.show", $tag)}}"
                                                                      class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{$tag->title}}</a></span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include("partials._footer")

<!-- Font Awesome -->
<script src="https://use.fontawesome.com/fb907e8d54.js"></script>
</body>
</html>
