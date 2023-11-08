@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title my-title" data-aos="fade-up" style="font-size: 40px;">{{$course->title}}</h1>
            <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
                @if($course->main_image == null)
                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="featured image" class="max-width-65">
                @else
                    <img src="{{asset('storage/' . $course->main_image)}}" alt="featured image" class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                @endif
            </section>
            <section class="post-content" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <p class="my-text">{!! $course->content !!}</p>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
