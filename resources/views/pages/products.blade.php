@extends('layout')

@section('variable_css')
    <link rel="stylesheet" href="/css/frontend/shop.css">
@endsection

@section('content')

<!--====================================================
                        SHOP-P1
======================================================-->
<section id="shop-p1" class="shop-p1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-p1-title">
                    <h3>Категории</h3>
                    <div class="heading-border-light"></div>
                </div>
                <div class="list-group">
                    @foreach($categories as $category)
                        <a href="{{route('category.show', $category->slug)}}"
                           class="list-group-item">{{$category->title}}</a>
                    @endforeach
                </div>
                <br>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card ">
                            <a href="{{route('product.show', $product->slug)}}"><img class="card-img-top" src="{{$product->getImage('products', 'image_0')}}" alt="{{$product->title}}"
                                title="{{$product->title}}"></a>
                            <div class="card-body text-center">
                                <div class="card-title">
                                    <a href="{{route('product.show', $product->slug)}}">{{$product->title}}</a>
                                </div>
                                <strong>{{$product->price}}</strong>
                                <div class="cart-icon text-center">
                                    <a href="#" class="add-to-cart" data-id="{{$product->id}}"><i class="fa fa-cart-plus"></i>Добавить в корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

@endsection