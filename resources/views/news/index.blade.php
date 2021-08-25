@extends('layout')

@section('content')
<br>
<div class="row justify-content-right">
    @foreach($news as $new)
    @if($new->favorites == 1)
    <div class="col-sm-4 d-flex align-items-stretch">
        <div class="card-columns-fluid">
            <div class="card" style="width: 18rem;">
                <img src="{{$new->img}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$new->heading}}</h5>
                    <a href="news/id/{{$new->id}}" class="btn btn-primary">Открыть полную статью</a>
                    <h6>Тэги: {{$new->tags}}</h6>
                    @if(Auth::check())
                    <form class="d-flex" method="get" action="{{route('favoriteAdd')}}">
                        <input type="hidden" name="favoriteAdd" id="favoriteAdd" value="{{$new->id}}">
                        <button class="btn btn-outline-success" type="submit">Добавить в избранное</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endsection