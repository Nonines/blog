@extends('layouts.admin')
@section('content')

<div>
    <h1>All Tags</h1>
    <div class="d-grid gap-2 d-md-block my-5">
        <form action="{{route("tags.store")}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Unique name for the category" required value="{{old("title")}}">

                @error("title")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create New Tag</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">No. of articles</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td><a href="{{route("tags.show", $tag)}}">{{$tag->title}}</a></td>
                    <td>{{count($tag->articles)}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td>
                        <div>
                            <button type="submit" form="delete-form-{{$tag->id}}" class="btn btn-outline-danger">Delete</button>

                            <form id="delete-form-{{$tag->id}}" action="{{route("tags.destroy", $tag)}}" method="post">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination-->
        {{ $tags->appends($_GET)->links() }}
    </div>
</div>

@endsection
