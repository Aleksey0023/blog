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

@yield('content')

<footer class="edica-footer mt-5" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area pb-0 justify-content-center">
            <div class="text-center">
                <a href="{{route('main.index')}}" class="footer-brand-wrapper">
                    <img src="{{asset('assets/images/logo.png')}}" alt="logo">
                </a>
                <p class="contact-details mb-3">@BUIVALENKOANASTASIYA</p>
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
