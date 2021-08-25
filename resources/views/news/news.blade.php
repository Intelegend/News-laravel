@include('layout.header')

<header>
    @include('layout.nav')
</header>
<br>
<main class="container-fluid">
    <div class="bg-light p-5 rounded">
        <h1>Все новости</h1>
        <p>Новости для отдельного города
        <form method="get" action="/news">
            <select class="form-select" aria-label="Default select example" name="country" id="country">
                @foreach($countrys as $country)
                @if($country->town == $town)
                <option selected value="{{$country->town}}">{{$country->town}}</option>
                @else
                <option value="{{$country->town}}">{{$country->town}}</option>
                @endif
                @endforeach
            </select>
            <br>
            <input class="btn btn-outline-success" type="submit" value="Подтвердить выбор">
        </form>
        </p>
        <div class="row justify-content-right">
            @foreach($news as $new)
            <div class="col-sm-4 d-flex align-items-stretch">
                <div class="card-columns-fluid">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$new->img}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$new->heading}}</h5>
                            <a href="news/id/{{$new->id}}" class="btn btn-primary">Открыть полную статью</a>
                            <h6>Тэги: {{$new->tags}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@include('layout.footer')