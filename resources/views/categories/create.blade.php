@extends('layouts.admin')
@section('content')

<div>
    <h1>Create New Category</h1>
</div>

<form action="/categories/store" method="POST">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Unique name for the category" required value="{{old("title")}}">

        @error("title")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="details" class="form-label">Details</label>
        <input type="text" class="form-control" name="details" id="details" placeholder="Short info" required value="{{old("details")}}">

        @error("details")
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
