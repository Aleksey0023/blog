@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Курсы</h1>
            <section class="featured-posts-section">
                <div class="row justify-content-center">
                    @foreach($courses as $course)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper" onclick="openCourse('{{ route('course.show', $course->id) }}')">
                                @if($course->main_image == null)
                                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post">
                                @else
                                    <img src="{{asset('storage/' . $course->main_image)}}" alt="blog post">
                                @endif
                            </div>
                            <a href="{{route('course.show', $course->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$course->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="mx-auto" style="margin-top: -100px">
                        {{$courses->links()}}
                    </div>
                </div>
            </section>
        </div>
    </main>

<script>
    function openCourse(url) {
        window.location.href = url;
    }
</script>
@endsection
