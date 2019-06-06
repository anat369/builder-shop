@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Просмотр заказа</h3>
            <br>
            <div class="form-group">
                <label class="col-md-12">Название услуги</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$orderService->services->title}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Имя заказчика</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$orderService->name}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Электронная почта</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$orderService->email}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Телефон</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$orderService->phone}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Комментарий</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$orderService->message}}" required>
                </div>
            </div>

            <div>
                <a href="{{route('order.services')}}">
                <button type="submit" class="btn btn-block btn-outline btn-success">
                    <span>Вернуться назад</span>
                </button>
                </a>
            </div>
        </div>
    </div>

@endsection