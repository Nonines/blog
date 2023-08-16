@extends('layouts.admin')
@section('content')

<div>
    <h1>Trashed Articles</h1>
    <div class="d-grid gap-2 d-md-block my-5">
        <a href="/articles/create" class="btn btn-primary" role="button"
            >New article</a
        >
        <a href="/admin/articles/" class="btn btn-outline-primary" role="button"
            >Published Articles</a
        >
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Deleted</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trashed_articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category->title}}</td>
                    <td>{{$article->deleted_at}}</td>
                    <td>
                        <div>
                            <button type="submit" form="restore-form-{{$article->id}}" class="btn btn-outline-primary">Restore</button>

                            <button type="submit" form="destroy-form-{{$article->id}}" class="btn btn-outline-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Permanently delete</button>

                            <form id="restore-form-{{$article->id}}" action="/articles/{{$article->id}}/restore" method="post">
                                @csrf
                            </form>

                            <form id="destroy-form-{{$article->id}}" action="/articles/{{$article->id}}" method="post">
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
        {{ $trashed_articles->appends($_GET)->links() }}
    </div>
</div>

@endsection
