@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">

        <div class="white-box">
            <h3 class="box-title m-b-0">Просмотр заказа</h3>
            <br>
            {!! Form::open([
                'route' => ['service-order-update', $order->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Данные клиента</label>
                <div class="col-md-12">
                    <p>Имя: {{$order->name}}</p>
                    <p>Почта: {{$order->email}}</p>
                    <p>Телефон: {{$order->phone}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Когда сделан заказ</label>
                <div class="col-md-12">
                    <p>{{$order->created_at}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Комментарий</label>
                <div class="col-md-12">
                    <p>{{$order->message}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Заказанная услуга</label>
                <div class="col-md-12">
                    <p>{{$order->title}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Статус заказа</label>
                <div class="col-md-12">
                    <p>{{$order->status}}</p>
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