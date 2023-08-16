@extends('layouts.admin')
@section('content')

<div>
    <h1>All Categories</h1>
    <div class="d-grid gap-2 d-md-block my-5">
        <a href="/categories/create" class="btn btn-primary" role="button"
            >New category</a
        >
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Details</th>
                    <th scope="col">No. of articles</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_categories as $category)
                <tr>
                    <td><a href="/categories/{{$category->id}}">{{$category->title}}</a></td>
                    <td>{{$category->details}}</td>
                    <td>{{count($category->articles)}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <div>
                            <button type="submit" form="delete-form-{{$category->id}}" class="btn btn-outline-danger">Delete</button>

                            <form id="delete-form-{{$category->id}}" action="/categories/{{$category->id}}" method="post">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
