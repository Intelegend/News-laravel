<html lang="en">
@include('layout.header')
@include('layout.nav')

<body>
    <div class="card mb-3">
        <img src="{{$news->img}}" class="card-img-top" alt="..." style="width:50rem">
        <div class="card-body">
            <h5 class="card-title">
                <h1>{{$news->heading}}</h1>
            </h5>
            <p class="card-text">
            <h5>{{$news->descriptions}}</h5>
            </p>
            <p class="card-text"><small class="text-muted">
                    <h6>{{$news->text}}</h6>
                </small></p>
            <h6>Тэги: {{$news->tags}}</h6>
        </div>
    </div>

</body>
<main class="container-fluid">
    <div class="bg-light p-5 rounded">
        <h3>Похожие новости</h3>
        <div class="row justify-content-right">
            @foreach($tags as $tag)
            @if($tag->tags == $news->tags)
            @if($tag->id != $news->id)
            <div class="col-sm-4 d-flex align-items-stretch">
                <div class="card-columns-fluid">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$tag->img}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$tag->heading}}</h5>
                            <a href="news/id/{{$tag->id}}" class="btn btn-primary">Открыть полную статью</a>
                            <h6>Тэги: {{$tag->tags}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>
</main>
@include('layout.footer')