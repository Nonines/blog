@extends('layouts.app')

@section('content')

    <header class="my-4">
        <h1 class="fw-bolder">Tags</h1>
    </header>

    <div class="col-lg-8">
        <ul class="list-group mb-5">
            @foreach ($tags as $tag)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">
                    <a href="/tags/{{$tag->id}}">{{$tag->title}}</a>
                </div>
              </div>
              <span class="badge bg-primary rounded-pill">{{count($tag->articles)}}</span>
            </li>
            @endforeach
        </ul>

        <!-- Pagination-->
        {{ $tags->appends($_GET)->links() }}
    </div>

@endsection
