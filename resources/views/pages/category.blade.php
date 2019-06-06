@extends('layout')

@section('title', $category->meta_title)
@section('meta_description', $category->meta_description)
@section('meta_keywords', $category->meta_keywords)
@section('meta_title', $category->meta_title)
@section('image', $category->getImage('categories', 'logo'))

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

                    <div class="shop-p1-title">
                        <h3>Top Sellers</h3>
                        <div class="heading-border-light"></div>
                    </div>
                    <ul class="list-unstyled top-seller">
                        <li>
                            <img class="img-fluid" src="/images/shop/shop-item-1.jpg" alt="">
                            <h6>Tshirt sort Style</h6>
                            <p>$15.34</p>
                        </li>
                        <li>
                            <img class="img-fluid" src="/images/shop/shop-item-4.jpg" alt="">
                            <h6>Tshirt sort Style</h6>
                            <p>$23.56</p>
                        </li>
                        <li>
                            <img class="img-fluid" src="/images/shop/shop-item-2.jpg" alt="">
                            <h6>Tshirt sort Style</h6>
                            <p>$45.23</p>
                        </li>
                    </ul>
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
                                            <a href="#" class="add-to-cart" data-id="{{$product->id}}"><i class="fa fa-cart-plus"></i> Добавить в корзину</a>
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