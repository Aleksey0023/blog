<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог | Английский для ваших целей</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('post.index')}}"><img src="{{asset('assets/images/logo.png')}}"
                                                                        alt="logo"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('course.index')}}">Курсы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('review.index')}}">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Обо мне</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Галерея</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>
                @guest()
                    <form action="{{route('login')}}" method="GET">
                        <input class="btn btn-primary mr-2 btn-sm" type="submit" value="Войти">
                    </form>
                    <form action="{{route('register')}}" method="GET">
                        <input class="btn btn-primary my-2 btn-sm" type="submit" value="Регистрация">
                    </form>
                @endguest
                @auth()
                    @if(auth()->user()->role == 0)
                        <form action="{{route('admin.main.index')}}" method="GET">
                            <input class="btn btn-primary my-2 mr-2 btn-sm" type="submit" value="Админ">
                        </form>
                        <form action="{{route('personal.main.index')}}" method="GET">
                            <input class="btn btn-primary mr-2 btn-sm" type="submit" value="Личный кабинет">
                        </form>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input class="btn btn-primary my-2 btn-sm" type="submit" value="Выйти">
                        </form>
                    @else
                        <form action="{{route('personal.main.index')}}" method="GET">
                            <input class="btn btn-primary mr-2 btn-sm" type="submit" value="Личный кабинет">
                        </form>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input class="btn btn-primary my-2 btn-sm" type="submit" value="Выйти">
                        </form>
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
                <a href="{{route('post.index')}}" class="footer-brand-wrapper">
                    <img src="{{asset('assets/images/logo.png')}}" alt="logo">
                </a>
                <p class="contact-details">@KHOMIKANASTASIYA<br> Английский для ваших целей<br> +7 913 899 47 10</p>
                <nav class="footer-social-links">
                    <a href="https://t.me/khomikanastasiya"><img src="{{asset('assets/images/telegram.png')}}"
                                                                 alt="telegram"></a>
                    <a href="https://vk.com/club210918350"><img src="{{asset('assets/images/vk.png')}}" alt="vk"></a>
                    <a href="tel:+79138994710"><img src="{{asset('assets/images/call.png')}}" alt="call"></a>
                </nav>
            </div>
        </div>
        <div class="footer-bottom-content justify-content-center">
            <p class="mb-0">© MyBlog • 2023</p>
        </div>
    </div>
</footer>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>
</html>
