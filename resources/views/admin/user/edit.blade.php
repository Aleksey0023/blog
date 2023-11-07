@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Пользователи</a></li>
                            <li class="breadcrumb-item active">Редактирование пользователя</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-xl-6">
                                <label class="w-100">
                                    <input type="text" class="form-control" name="name" placeholder="Имя пользователя"
                                           value="{{$user->name}}">
                                </label>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-xl-6">
                                <label class="w-100">
                                    <input type="text" class="form-control" name="email" placeholder="Email"
                                           value="{{$user->email}}">
                                </label>
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Выберете роль</label>
                                <label class="w-100">
                                    <select class="form-control" name="role">
                                        @foreach($roles as $id => $role)
                                            <option
                                                value="{{$id}}"{{$id == $user->role ? 'selected' : ''}}>{{$role}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="form-group col-xl-6">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
