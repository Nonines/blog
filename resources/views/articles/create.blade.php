@extends('layouts.admin')
@section('content')

<div>
    <h1>Create New Article</h1>
</div>

<form action="{{route("articles.store")}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title of your post" required value="{{old("title")}}">

        @error("title")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="Short intro" required value="{{old("excerpt")}}">

        @error("excerpt")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3" placeholder="Article content" required>{{old("content")}}</textarea>

        @error("content")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" aria-label="" id="category" name="category_id">
            <option selected>Select a category</option>

            @foreach (\App\Helpers\QueryHelper::all_categories() as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>

        @error("category_id")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select class="js-example-basic-multiple form-select" id="tags" name="tags[]" multiple="multiple">
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>

        @error("tags")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Featured image</label>
        <input class="form-control" type="file" id="formFile" name="image">

        @error("image")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="caption" class="form-label">Image caption</label>
        <input type="text" class="form-control" name="caption" id="caption" placeholder="Short caption for the featured image" value="{{old("caption")}}">

        @error("caption")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Post</button>
</form>

@endsection
