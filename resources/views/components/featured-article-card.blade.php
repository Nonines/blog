@props(['article'])

<!-- Featured blog post-->
<div class="card mb-4">
    <a href="{{route("articles.show", $article)}}"><img class="card-img-top" src="{{$article->image ? asset("/storage/" . $article->image) : asset("storage/images/default_article_image.png")}}" alt="..." /></a>
    <div class="card-body">
        <div class="small text-muted">{{ ($article->created_at) }}</div>
        <h2 class="card-title">{{ ($article->title) }}</h2>
        <p class="card-text">{{ ($article->excerpt) }}</p>
        <a class="btn btn-primary" href="{{route("articles.show", $article)}}">Read more →</a>
    </div>
</div>
