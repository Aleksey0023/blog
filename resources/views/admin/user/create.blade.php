@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Пользователи</a></li>
                            <li class="breadcrumb-item active">Добавление пользователя</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.user.store')}}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <label class="w-100">
                                    <input type="text" class="form-control" name="name" placeholder="Имя пользователя"
                                           value="{{old('name')}}">
                                </label>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="w-100">
                                    <input type="text" class="form-control" name="email" placeholder="Email"
                                           value="{{old('email')}}">
                                </label>
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Выберете роль</label>
                                <label class="w-100">
                                    <select class="form-control" name="role">
                                        @foreach($roles as $id => $role)
                                            <option
                                                value="{{$id}}"{{$id == old('role') ? 'selected' : ''}}>{{$role}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
