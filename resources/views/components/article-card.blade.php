@props(['article'])

<!-- Blog post-->
<div class="card mb-4">
    <a href="/articles/{{$article->id}}"><img class="card-img-top" src="{{$article->image ? asset("/storage/" . $article->image) : asset("storage/images/default_article_image.png")}}" alt="..." /></a>
    <div class="card-body">
        <div class="small text-muted">{{ ($article->created_at) }}</div>
        <h2 class="card-title h4">{{ ($article->title) }}</h2>
        <p class="card-text">{{ ($article->excerpt) }}</p>
        <a class="btn btn-primary" href="/articles/{{$article->id}}">Read more →</a>
    </div>
</div>
