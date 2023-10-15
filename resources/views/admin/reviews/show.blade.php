@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <a href="{{route('admin.review.edit', $review->id)}}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('admin.review.destroy', $review->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.review.index')}}">Отзывы</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Главное изображение</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="w-100 mb-2">
                                                @if($review->main_image == null)
                                                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="main_image"
                                                         class="w-100">
                                                @else
                                                    <img src="{{asset('storage/' . ($review->main_image))}}" alt="main_image"
                                                         class="w-100">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
