@include('layout.header')

<header>
    @include('layout.nav')
</header>

<body class="d-flex flex-column h-100">


    <main class="container-fluid">
        <div class="bg-light p-5 rounded">
            <h1>Главная страница новостей</h1>
            @yield('content')
        </div>
    </main>

    @include('layout.footer')