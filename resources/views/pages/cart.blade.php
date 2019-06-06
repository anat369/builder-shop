@extends('layout')

@section('title', 'Страница покупок сайта строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('meta_description', 'Страница покупок сайта строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('meta_keywords', 'Страница покупок сайта строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('meta_title', 'Страница покупок сайта строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('content')

    <!--====================================================
                        CART
======================================================-->

    <section id="cart" class="cart">
        <div class="container">
            @if(Session::get('products'))
            <table id="order_product" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:50%">Товар</th>
                    <th style="width:10%">Цена</th>
                    <th style="width:8%">Количество</th>
                    <th style="width:22%" class="text-center">Сумма</th>
                    <th style="width:10%">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs">
                                <img src="{{$product->getImage('products', 'image_0')}}" alt="{{$product->title}}" class="img-responsive" width="100%"/>
                            </div>
                            <div class="col-sm-10 prod-desc">
                                <a href="{{route('product.show', $product->slug)}}">
                                <h6 class="nomargin">{{$product->title}}</h6>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{$product->price}}</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="{{$product->count}}">
                    </td>
                    <td data-th="Subtotal" class="text-center">{{$product->count*$product->price}} руб.</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        <a class="delete_product" href="#" data-id="{{$product->id}}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td><a href="/products" class="btn btn-general btn-white"><i class="fa fa-angle-left"></i>Вернуться в магазин</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Общая сумма: {{$totalPrice}}</strong></td>
                    <td>
                        <a href="#" class="btn btn-general btn-green" data-toggle="modal" data-target="#order_registration">
                            Оформить заказ <i class="fa fa-angle-right"></i>
                        </a>
                    </td>
                </tr>
                </tfoot>
            </table>
                @else
                <br>
                <h4 style="text-align: center">Корзина пуста</h4>
                <br>
            @endif
        </div>
    </section>

    <!-- Modal Order Registration -->

    <div class="modal fade" id="order_registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </button>
                </div>
                <div id="div-forms">
                    <form id="order_form" action="/order" method="post">
                        {{csrf_field()}}
                        <h3 class="text-center">Оформление заказа</h3>
                        <div class="modal-body">
                            @if(!Auth::check())
                                <label for="name">Имя</label>
                                <input id="name" name="name" class="form-control" type="text" placeholder="Введите имя"
                                       required>
                                <br>
                                <label for="email">Электронная почта</label>
                                <input id="email" name="email" class="form-control" type="email"
                                       placeholder="Введите email" required>
                                <br>
                                <label for="phone">Телефон</label>
                                <input id="phone" name="phone" class="form-control" type="text"
                                       placeholder="Введите телефон" required>
                                <br>
                                <label for="password">Придумайте пароль</label>
                                <input id="password" name="password" class="form-control" type="password"
                                       placeholder="Любые символы не меньше 6 штук" required>
                                <br>
                            @endif
                                <label for="message">Оставьте комментарий</label>
                                <textarea id="message" name="message" class="form-control" type="text" placeholder=". . ."
                                          required></textarea>
                                <br>
                        </div>
                        <div class="modal-footer text-center">
                            <div>
                                <input type="submit" class="btn btn-white" value="Оформить">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection