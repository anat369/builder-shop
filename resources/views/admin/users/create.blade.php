@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Создание пользователя</h3>
            <br>
            {!! Form::open([
                'route' => 'users.store',
                'files'	=>	true,
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                    <label class="col-md-12">Имя</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="example-email">Почта</label>
                    <div class="col-md-12">
                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Почта" value="{{old('email')}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Пароль</label>
                    <div class="col-md-12">
                        <input type="password"  name="password" class="form-control" value="{{old('password')}}" placeholder="Пароль" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="logo" class=" form-control-label">Аватарка</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="logo" name="logo" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
                <hr style="background-color: red">

                <div>
                    <button type="submit" class="btn btn-block btn-outline btn-success">
                        <span>Добавить</span>
                    </button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>

    @endsection