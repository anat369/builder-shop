@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Просмотр и редактирование сообщения</h3>
            <br>
            {!! Form::open([
                'route' => ['categories.update', $message->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Имя отправителя</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="name" value="{{$message->name}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Почта отправителя</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="email" value="{{$message->email}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Телефон отправителя</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="phone" value="{{$message->phone}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Текст сообщения</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="message" value="{{$message->message}}" required>
                </div>
            </div>

            <hr style="background-color: red">

            <div>
                <button type="submit" class="btn btn-block btn-outline btn-success">
                    <span>Изменить</span>
                </button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection