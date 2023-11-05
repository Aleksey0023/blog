@extends('layouts.home')
@section('content')
    <section class="menu-inner">
        <div class="container">
            <header class="edica-header">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent justify-content-end">
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                            data-target="#edicaMainNav"
                            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="edicaMainNav">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-right" href="{{route('main.index')}}" style="color: white">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right" href="{{route('post.index')}}" style="color: white">Блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right" href="{{route('course.index')}}" style="color: white">Курсы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right" href="{{route('review.index')}}" style="color: white">Отзывы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right" href="{{route('about.index')}}" style="color: white">Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right" href="{{route('contact.index')}}" style="color: white">Контакты</a>
                            </li>
                        </ul>
                        @guest()
                            <form action="{{route('login')}}" method="GET" class="text-right">
                                <input class="btn btn-primary mr-2 btn-sm" type="submit" value="Войти">
                            </form>
                            <form action="{{route('register')}}" method="GET" class="text-right">
                                <input class="btn btn-primary my-2 mr-2 btn-sm" type="submit" value="Регистрация">
                            </form>
                        @endguest
                        @auth()
                            @if(auth()->user()->role == 'Админ')
                                <form action="{{route('admin.main.index')}}" method="GET" class="text-right">
                                    <input class="btn btn-primary my-2 mr-2 btn-sm" type="submit" value="Админ">
                                </form>
                                <form action="{{route('personal.main.index')}}" method="GET" class="text-right">
                                    <input class="btn btn-primary mr-2 btn-sm" type="submit" value="Личный кабинет">
                                </form>
                                <form action="{{route('logout')}}" method="POST" class="text-right">
                                    @csrf
                                    <input class="btn btn-primary my-2 mr-2 btn-sm" type="submit" value="Выйти">
                                </form>
                            @else
                                <form action="{{route('personal.main.index')}}" method="GET" class="text-right">
                                    <input class="btn btn-primary my-2 mr-2 btn-sm" type="submit"
                                           value="Личный кабинет">
                                </form>
                                <form action="{{route('logout')}}" method="POST" class="text-right">
                                    @csrf
                                    <input class="btn btn-primary mr-2 btn-sm" type="submit" value="Выйти">
                                </form>
                            @endif
                        @endauth
                    </div>
                </nav>
                <a class="d-flex justify-content-center mt-5" href="{{route('main.index')}}">
                    <img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                <div class="d-flex flex-column align-items-center goal-text my-text2 mt-2">
                    <p class="home-info">@KHOMIKANASTASIYA</p>
                    <p class="text-center mt-3 mb-5 pb-5 home-info2">Английский <br> для ваших целей</p>
                </div>
            </header>
        </div>
    </section>
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 my-5 goal-text my-text" data-aos="fade-up">
                    <div class="text-logo2">
                        <img src="{{asset('assets/images/logo2.png')}}" alt="">
                        <p class="my-title3 text-center pb-3">Уроки английского онлайн</p>
                        <p class="text-center">В группе и индивидуально, в какой бы точке мира Вы не находились и в
                            комфортное для Вас время. Современные учебники, интерактивные игры, множество аудио и видео.
                            Индивидуальный подход и коммуникативная методика.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-5 goal-text my-text" data-aos="fade-up">
                    <div class="text-logo2">
                        <img src="{{asset('assets/images/logo2.png')}}" alt="">
                        <p class="my-title3 text-center pb-3">Личная программа обучения</p>
                        <p class="text-center">Скорее научиться говорить, чтобы быть готовым к переезду? OK! Больше
                            разговорных фраз для общения в путешествиях или лексики для экзамена? Сделаем и это. Let's
                            start!</p>
                    </div>
                </div>
                <div class="col-lg-4 my-5 goal-text my-text" data-aos="fade-up">
                    <div class="text-logo2">
                        <img src="{{asset('assets/images/logo2.png')}}" alt="">
                        <p class="my-title3 text-center pb-3">Speaking club</p>
                        <p class="text-center">С единомышленниками за чашкой чая и просмотром любимых фильмов - что
                            может быть лучше? Занятие построено в формате обсуждений и диалогов с множеством актуальной
                            лексики. Вы точно влюбитесь в английский :)</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div
                    class="col-lg-6 what-expect goal-text my-text align-items-center flex-column justify-content-center"
                    data-aos="fade-right">
                    <p class="my-title3">Что ждёт Вас на уроках?</p>
                    <ul class="list pl-0">
                        <li class="mark">современные аутентичные учебники, взятые за основу</li>
                        <li class="mark">интерактивные игры и материалы с таких ресурсов как wordwall, learningapps,
                            lyricstraining, google docs
                        </li>
                        <li class="mark">коммуникативная методика и множество разговорных заданий</li>
                    </ul>
                </div>
                <div class="col-lg-6 picture-what-expect my-5 d-flex justify-content-center" data-aos="fade-left">
                    <img src="{{asset('assets/images/whatExpect.png')}}" alt="">
                </div>
            </div>
        </div>
    </main>
@endsection
