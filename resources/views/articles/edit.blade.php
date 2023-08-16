@extends('layouts.admin')
@section('content')

<div>
    <h1>Edit Article</h1>
</div>

<form action="/articles/{{$article->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title of your post" required value="{{$article->title}}">

        @error("title")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="Short intro" required value="{{$article->excerpt}}">

        @error("excerpt")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3" placeholder="Article content" required>{{$article->content}}</textarea>

        @error("content")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" aria-label="" id="category" name="category_id">
            <option>Select a category</option>

            @foreach ($all_categories as $category)
            <option {{$article->category->id === $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->title}}</option>
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

                @if (in_array($tag->id, $article_tags_ids))
                <option selected value="{{$tag->id}}">{{$tag->title}}</option>
                @else
                <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endif

            @endforeach
        </select>

        @error("tags")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Featured image</label>
        <input class="form-control" type="file" id="formFile" name="image">
        <img src="{{$article->image ? asset("/storage/" . $article->image) : asset("storage/images/default_article_image.png")}}" class="img-thumbnail" alt="...">

        @error("image")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="caption" class="form-label">Image caption</label>
        <input type="text" class="form-control" name="caption" id="caption" placeholder="Short caption for the featured image" value="{{$article->caption}}">

        @error("caption")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
