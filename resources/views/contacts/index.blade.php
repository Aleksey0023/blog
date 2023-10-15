@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Контакты</h1>
            <section class="edica-landing-section edica-landing-about pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 d-flex flex-wrap align-items-end align-content-center" data-aos="fade-up-right">
                            <p>Lorem ipsum dolor sit amet, consectetur adipng elit, sed do eiusmod tempor incididunt ut labore aliqua. Ut enim que minim veniam, quis nostrud exercitation.</p>
                            <ul class="landing-about-list">
                                <li>Lorem ipsum dolor sit amet, consectetur adipng elit</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipng elit</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipng elit</li>
                            </ul>
                        </div>
                        <div class="col-md-6" data-aos="fade-up-left">
                            <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="contacts" class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
