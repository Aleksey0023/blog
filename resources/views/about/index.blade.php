@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Обо мне</h1>
            <section class="edica-about-vision pt-0">
                <div class="row">
                    <div class="col-md-6 pb-3 pb-md-0 mb-4 mb-md-0" data-aos="fade-right" data-aos-delay="200">
                        <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="vision"
                             class="img-fluid">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <p class="vision-text my-text" data-aos="fade-left">Lorem ipsum, or lipsum as it is sometimes known, is
                            dummy text used in laying out printed graphic or web designs. The passage is at attributed
                            to an unknown typesetters in 1the 5th century who is thought scrambled with all parts of
                            Cicero’s De. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying
                            out printed graphic or web designs</p>
                    </div>
                </div>
            </section>
            <section class="edica-about-goal py-5 mb-5">
                <div class="row flex-row-reverse">
                    <div class="col-md-6 pb-3 pb-md-0 mb-4 mb-md-0" data-aos="fade-left" data-aos-delay="200">
                        <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="vision"
                             class="img-fluid">
                    </div>
                    <div class="col-md-6 mb-md-0 d-flex flex-column justify-content-center" data-aos="fade-right">
                        <p class="goal-text my-text">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in
                            laying out printed graphic or web designs. The passage is at attributed to an unknown
                            typesetters in 1the 5th century who is thought scrambled with all parts of Cicero’s De.
                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed
                            graphic or web designs</p>
                    </div>
                </div>
            </section>
            <section class="featured-posts-section">
                <div class="row">
                    <div class="col-md-6 mb-5" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6 mb-5" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6 mb-5" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6 mb-5" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post" class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
