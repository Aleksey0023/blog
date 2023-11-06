<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог | Английский для ваших целей</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container pl-0 pr-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-white justify-content-end pl-0 pr-0">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-right pl-0" href="{{route('main.index')}}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-right pl-3" href="{{route('post.index')}}">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-right pl-3" href="{{route('course.index')}}">Курсы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-right pl-3" href="{{route('review.index')}}">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-right pl-3" href="{{route('about.index')}}">Обо мне</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-right pl-3" href="{{route('gallery.index')}}">Галерея</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-right pl-3" href="{{route('contact.index')}}">Контакты</a>
                    </li>
                </ul>
                @guest()
                    <div class="pr-0 d-flex flex-column align-items-end">
                        <form action="{{route('login')}}" method="GET">
                            <input class="btn btn-primary my-2 btn-sm" type="submit" value="Войти">
                        </form>
                        <form action="{{route('register')}}" method="GET" >
                            <input class="btn btn-primary btn-sm" type="submit" value="Регистрация">
                        </form>
                    </div>
                @endguest
                @auth()
                    @if(auth()->user()->role == 'Админ')
                        <div class="pr-0 d-flex flex-column align-items-end">
                            <form action="{{route('admin.main.index')}}" method="GET" class="mb-0">
                                <input class="btn btn-primary my-2 btn-sm" type="submit" value="Админ">
                            </form>
                            <form action="{{route('personal.main.index')}}" method="GET" class="mb-0">
                                <input class="btn btn-primary btn-sm" type="submit" value="Личный кабинет">
                            </form>
                            <form action="{{route('logout')}}" method="POST" class="mb-0">
                                @csrf
                                <input class="btn btn-primary my-2 btn-sm" type="submit" value="Выйти">
                            </form>
                        </div>
                    @else
                        <div class="pr-0 d-flex flex-column align-items-end">
                            <form action="{{route('personal.main.index')}}" method="GET" class="mb-0">
                                <input class="btn btn-primary my-2 btn-sm" type="submit" value="Личный кабинет">
                            </form>
                            <form action="{{route('logout')}}" method="POST" class="mb-0">
                                @csrf
                                <input class="btn btn-primary btn-sm" type="submit" value="Выйти">
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </nav>
    </div>
</header>

@yield('content')

<footer class="edica-footer mt-5" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area pb-0 justify-content-center">
            <div class="text-center">
                <a href="{{route('main.index')}}" class="footer-brand-wrapper">
                    <img src="{{asset('assets/images/logo.png')}}" alt="logo">
                </a>
                <p class="contact-details">@BUIVALENKOANASTASIYA<br> Английский для ваших целей</p>
                <div class="my-2 mx-2">
                    <a href="https://t.me/buivalenkoanastasiya"><img src="{{asset('assets/images/telegram.png')}}"
                                                                 alt="telegram" class="mr-2"></a>
                    <a href="https://vk.com/club210918350"><img src="{{asset('assets/images/vk.png')}}" alt="vk" class="mr-2"></a>
                    <a href="tel:+79138994710"><img src="{{asset('assets/images/call.png')}}" alt="call"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
