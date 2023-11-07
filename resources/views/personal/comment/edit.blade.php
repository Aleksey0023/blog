@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Редактирование комментария</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('personal.comment.index')}}">Комментарии</a></li>
                            <li class="breadcrumb-item active">Редактирование комментария</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">
                        <form action="{{route('personal.comment.update', $comment->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="w-100">
                                    <textarea class="form-control" name="message"
                                              rows="3">{{$comment->message}}</textarea>
                                </label>
                                @error('message')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
