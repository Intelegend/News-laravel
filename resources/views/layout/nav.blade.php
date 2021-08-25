        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Новости</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/news">Все новости</a>
                        </li>
                    </ul>
                    @if (!Auth::check())
                    <a href="/login" class="btn btn-info me-2">Войти</a>
                    @else
                    <p class="text-info me-2">{{Auth::user()->name}}</p>
                    <br>
                    <a href="/favorite" class="btn btn-info me-2">Перейти в избранное</a>
                    @endif
                    <form class="d-flex" method="get" action="{{route('search')}}">
                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search" name="search" id="search">
                        <button class="btn btn-outline-success" type="submit">Найти</button>
                    </form>
                </div>
            </div>
        </nav>