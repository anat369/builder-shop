@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Просмотр заказа</h3>
            <br>
            {!! Form::open([
                'route' => ['product-order-update', $order[0]->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Данные клиента</label>
                <div class="col-md-12">
                    <p>Имя: {{$order[0]->name}}</p>
                    <p>Почта: {{$order[0]->email}}</p>
                    <p>Телефон: {{$order[0]->phone}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Когда сделан заказ</label>
                <div class="col-md-12">
                    <p>{{$order[0]->created_at}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Комментарий</label>
                <div class="col-md-12">
                    <p>{{$order[0]->message}}</p>
                </div>
            </div>

            <div class="form-group">
                <h4 class="text-center">
                    <label class="col-md-12">Заказанные товары</label>
                </h4>
                <div class="col-md-12">
                    <?php $totalPrice = 0; ?>
                @foreach($order as $value)
                            <div class="col-md-4">
                            <p>Название товара: {{$value->title}}</p>
                            <p>Количество товара: {{$value->quantity}}</p>
                            <p>Цена одной единицы: {{$value->price}} руб.</p>
                            <p>Стоимость: {{$value->quantity * $value->price}} руб.</p>
                            <?php $totalPrice += $value->quantity * $value->price ;?>
                            </div>
                    @endforeach
                    <h5 class="text-center">Общая стоимость заказа: <b><strong>{{$totalPrice}}</strong></b> руб.</h5>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Статус заказа</label>
                <div class="col-md-12">
                    <p>{{$order[0]->status}}</p>
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