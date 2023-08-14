<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <script src="https://use.fontawesome.com/fb907e8d54.js"></script>


        <title>Blog Home - Start Bootstrap Template</title>

        <!-- Favicon-->
        {{-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> --}}

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="d-flex flex-column min-vh-100">
        @include("partials._navbar")

        <!-- Page content-->
        <div class="container">
            <div class="row">
                @yield('content')

                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <form action="/articles">
                        <div class="card mb-4">
                            <div class="card-header">Search</div>
                            <div class="card-body">
                                <div class="input-group">
                                    <input class="form-control" name="search" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" required value="{{request()->get("search")}}"/>
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
                                        @foreach ($all_categories->nth(2) as $category)
                                        <li><a href="/categories/{{$category->id}}">{{$category->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($all_categories->nth(2, 1) as $category)
                                        <li><a href="/categories/{{$category->id}}">{{$category->title}}</a></li>
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
                            @foreach ($latest_tags as $tag)
                            <span class="badge text-bg-secondary me-1"><a href="/tags/{{$tag->id}}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{$tag->title}}</a></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include("partials._footer")
    </body>
</html>
