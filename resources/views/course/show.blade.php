@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$course->title}}</h1>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                @if($course->main_image == null)
                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="featured image" class="w-100">
                @else
                    <img src="{{asset('storage/' . $course->main_image)}}" alt="featured image" class="w-100">
                @endif
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $course->content !!}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
