<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ панель</title>
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
             width="60">
    </div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-between">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item d-flex pr-0 flex-column align-items-end">
                <form action="{{route('main.index')}}" method="GET">
                    <input class="btn btn-primary mr-2 my-2 btn-sm" type="submit" value="Перейти на сайт">
                </form>
                <form action="{{route('personal.main.index')}}" method="GET">
                    <input class="btn btn-primary mr-2 btn-sm" type="submit" value="Личный кабинет">
                </form>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input class="btn btn-primary mr-2 my-2 btn-sm" type="submit" value="Выйти из аккаунта">
                </form>
            </li>
        </ul>
    </nav>

    @include('admin.includes.sidebar')
    @yield('content')

    <footer class="main-footer">
        <strong>My Blog</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<style>
    .custom-file-input:lang(en) ~ .custom-file-label::after {
        content: "...";
    }
</style>
</body>
</html>
