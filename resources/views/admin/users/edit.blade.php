@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Редактирование пользователя</h3>
            <br>
            {!! Form::open([
                'route' => ['users.update', $user->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Имя</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12" for="example-email">Почта</label>
                <div class="col-md-12">
                    <input type="email" id="example-email" name="email" class="form-control" placeholder="Почта" value="{{$user->email}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Пароль</label>
                <div class="col-md-12">
                    <input type="password"  name="password" class="form-control" placeholder="Пароль" required>
                </div>
            </div>

            <div class="row form-group">
                    <label for="logo" class=" form-control-label">Аватарка</label>
                <br>
                <img src="{{$user->getLogo('users')}}" alt="" class="img-responsive" width="200">
                <br>
                <div class="col-6 col-md-6">
                    <input type="file" id="logo" name="logo" class="btn btn-block btn-outline btn-primary">
                </div>
            </div>
            <hr style="background-color: red">

            <div>
                <button type="submit" class="btn btn-block btn-outline btn-success">
                    <span>Внести изменения</span>
                </button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection