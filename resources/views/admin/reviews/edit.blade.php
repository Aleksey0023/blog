@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Редактирование отзыва</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.review.index')}}">Отзывы</a></li>
                            <li class="breadcrumb-item active">Редактирование отзыва</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-4">
                        <form action="{{route('admin.review.update', $review->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="mb-2">
                                    @if($review->main_image == null)
                                        <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="main_image"
                                             class="w-50">
                                    @else
                                        <img src="{{asset('storage/' . ($review->main_image))}}" alt="main_image"
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
