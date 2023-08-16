@extends('layouts.admin')
@section('content')

<div>
    <h1>Articles</h1>
    <div class="d-grid gap-2 d-md-block my-5">
        <a href="/articles/create" class="btn btn-primary" role="button"
            >New article</a
        >
        <a href="/admin/articles/trash" class="btn btn-outline-danger" role="button"
            ><i class="fa fa-trash-o" aria-hidden="true"></i>
            Trash</a
        >
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Published</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_articles as $article)
                <tr>
                    <td><a href="/articles/{{$article->id}}">{{$article->title}}</a></td>
                    <td>{{$article->category->title}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>
                        <div>
                            <a href="/articles/{{$article->id}}/edit" role="button" class="btn btn-outline-secondary">Edit</a>
                            <button type="submit" form="delete-form-{{$article->id}}" class="btn btn-outline-danger">Delete</button>

                            <form id="delete-form-{{$article->id}}" action="/articles/{{$article->id}}" method="post">
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination-->
        {{ $user_articles->appends($_GET)->links() }}
    </div>
</div>

@endsection
