@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование курса</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.course.index')}}">Курсы</a></li>
                            <li class="breadcrumb-item active">Редактирование курса</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.course.update', $course->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label class="w-100">
                                    <input type="text" class="form-control" name="title" placeholder="Название курса"
                                           value="{{$course->title}}">
                                </label>
                                @error('title')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="summernote"></label><textarea id="summernote"
                                                                          name="content">{{$course->content}}</textarea>
                                @error('content')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="w-50 mb-2">
                                    @if($course->main_image == null)
                                        <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="main_image"
                                             class="w-50">
                                    @else
                                        <img src="{{asset('storage/' . ($course->main_image))}}" alt="main_image"
                                             class="w-50">
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="exampleInputFile" class="custom-file-input"
                                               name="main_image">
                                        <label class="custom-file-label">Выберете изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
