@extends('layout')

@section('content')

    <!--====================================================
                  SINGLE-PRODUCT-P1
======================================================-->
    <section id="single-product-p1">
        <br>s
        <div class="container">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="{{$product->getImage('products', 'image_1')}}" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{$product->getImage('products', 'image_1')}}" /></a></li>
                    </ul>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->title}}</h3>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">Цена: <span>{{$product->price}} руб.</span></h4>
                    <div class="action">
                        <a href="#" class="add-to-cart" data-id="{{$product->id}}">
                            <div class="title-but">
                                <button class="btn btn-general btn-white">
                                    <i class="fa fa-cart-plus"></i> Добавить в корзину
                                </button>
                            </div>
                        </a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </section>




@endsection