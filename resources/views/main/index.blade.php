@extends('layouts.home')
@section('content')
    <section class="menu-inner">
        <div class="container pl-0 pr-2">
            <header class="edica-header">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent justify-content-end pl-0 pr-0">
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                            data-target="#edicaMainNav"
                            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="edicaMainNav">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-right pl-0" href="{{route('main.index')}}" style="color: white">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right pl-3" href="{{route('post.index')}}" style="color: white">Блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right pl-3" href="{{route('course.index')}}" style="color: white">Курсы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right pl-3" href="{{route('review.index')}}" style="color: white">Отзывы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right pl-3" href="{{route('about.index')}}" style="color: white">Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right pl-3" href="{{route('gallery.index')}}" style="color: white">Галерея</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-right pl-3" href="{{route('contact.index')}}" style="color: white">Контакты</a>
                            </li>
                        </ul>
                        @guest()
                            <div class="pr-0 d-flex flex-column align-items-end">
                                <form action="{{route('login')}}" method="GET">
                                    <input class="btn btn-primary my-2 btn-sm" type="submit" value="Войти">
                                </form>
                                <form action="{{route('register')}}" method="GET">
                                    <input class="btn btn-primary btn-sm" type="submit" value="Регистрация">
                                </form>
                            </div>
                        @endguest
                        @auth()
                            @if(auth()->user()->role == 'Админ')
                                <div class="pr-0 d-flex flex-column align-items-end">
                                    <form action="{{route('admin.main.index')}}" method="GET">
                                        <input class="btn btn-primary my-2 btn-sm" type="submit" value="Админ">
                                    </form>
                                    <form action="{{route('personal.main.index')}}" method="GET">
                                        <input class="btn btn-primary btn-sm" type="submit" value="Личный кабинет">
                                    </form>
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <input class="btn btn-primary my-2 btn-sm" type="submit" value="Выйти">
                                    </form>
                                </div>
                            @else
                                <div class="pr-0 d-flex flex-column align-items-end">
                                    <form action="{{route('personal.main.index')}}" method="GET">
                                        <input class="btn btn-primary my-2 btn-sm" type="submit" value="Личный кабинет">
                                    </form>
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <input class="btn btn-primary btn-sm" type="submit" value="Выйти">
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </nav>
                <a class="d-flex justify-content-center mt-5" href="{{route('main.index')}}">
                    <img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                <div class="d-flex flex-column align-items-center goal-text my-text2 mt-2">
                    <p class="home-info">BUIVALENKO ANASTASIYA</p>
                    <p class="text-center mt-3 mb-5 pb-5 home-info2">Английский <br> для Ваших целей</p>
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
                        <p class="text-center">В группе и индивидуально, в какой бы точке мира Вы ни находились и в
                            комфортное для Вас время. Современные учебники, интерактивные игры, множество аудио и видео.
                            Индивидуальный подход и коммуникативная методика.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-5 goal-text my-text" data-aos="fade-up">
                    <div class="text-logo2">
                        <img src="{{asset('assets/images/logo2.png')}}" alt="">
                        <p class="my-title3 text-center pb-3">Личная программа обучения</p>
                        <p class="text-center">Скорее научиться говорить, чтобы быть готовым к переезду? OK! Больше
                            разговорных фраз для общения в путешествиях или лексики для работы? Сделаем и это. Let's
                            start!</p>
                    </div>
                </div>
                <div class="col-lg-4 my-5 goal-text my-text" data-aos="fade-up">
                    <div class="text-logo2">
                        <img src="{{asset('assets/images/logo2.png')}}" alt="">
                        <p class="my-title3 text-center pb-3">Курс по временам</p>
                        <p class="text-center">На интерактивной платформе для уровней ниже (А2+В1) и выше среднего
                            (В2+С1), который можно выполнять в своём темпе. Примеры из фильмов, сериалов и книг, правила
                            с понятными и доступными объяснениями, а также более сотни заданий. Старт в январе!</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div
                    class="col-lg-6 what-expect goal-text my-text align-items-center flex-column justify-content-center"
                    data-aos="fade-right">
                    <p class="my-title3 mt-3">Что ждёт Вас на уроках?</p>
                    <ul class="list pl-0">
                        <li class="mark"><b>то, ради чего мы и учим английский:</b> упор на говорение и большое
                            количество разговорных заданий
                        </li>
                        <li class="mark"><b>скучно точно не будет:</b> работа с отрывками из песен и фильмов,
                            актуальными, интересными видео с youtube и лексикой из них
                        </li>
                        <li class="mark"><b>качественные системные знания:</b> изучая определенную тему, проходим новую
                            лексику и грамматику, которые постепенно складываются в общую картину языка; выполняем все
                            виды работы (говорение, аудирование, чтение и письмо)
                        </li>
                        <li class="mark"><b>соответствие занятий Вашим целям:</b> имеете проблемы с пониманием речи на
                            слух - уделяем больше внимания аудированию; чувствуете недостаток словарного запаса -
                            тренируем вокабуляр и вводим его в речь, изучаем профессиональный английский (при
                            необходимости)
                        </li>
                        <li class="mark"><b>комфортная и приятная атмосфера:</b> уверена, что на пути достижения
                            результата необязательно быть «строгой училкой», ругающей за невыполнение домашних заданий.
                            Занятия должны приносить удовольствие, иначе долго не продержаться
                        </li>
                        <li class="mark"><b>актуальные и разнообразные материалы:</b> современные аутентичные учебники
                            издательства Oxford, взятые за основу; интерактивные игры и материалы с таких ресурсов как
                            wordwall, learningapps, google docs.
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 picture-what-expect my-5 d-flex justify-content-center my-col" data-aos="fade" data-aos-delay="300">
                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="whatExpect" class="max-width-85">
                </div>
            </div>
        </div>
    </main>
@endsection
