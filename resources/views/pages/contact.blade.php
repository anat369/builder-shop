@extends('layout')

@section('title', 'Контакты строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('meta_description', $company->meta_description)
@section('meta_keywords', $company->meta_keywords)
@section('meta_title', $company->meta_title)
@section('image', $company->getImage('companies', 'logo'))

@section('content')

<!--====================================================
                       HOME-P
======================================================-->
<div id="home-p" class="home-p pages-head4 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s">Контакты</h1>
    </div><!--/end container-->
</div>

<!--====================================================
                        CONTACT-P1
======================================================-->
<section id="contact-p1" class="contact-p1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact-p1-cont">
                    <h3>Напишите или позвоните нам!</h3>
                    <div class="heading-border-light"></div>
                    <p>Если вы хотите заказать услугу или у вас есть предложение по работе - отправьте сообщение!</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-p1-cont2">
                    <address class="address-details-f">
                       Адрес: {{$company->address}} <br>
                        Телефон: {{$company->phone}}<br>
                        Почта: <a href="mailto:{{$company->email}}" class="">{{$company->email}}</a>
                    </address>
                    <h5>Социальные сети:</h5>
                    <ul class="list-inline social-icon-f top-data">
                        <li><a href="{{$company->instagram}}" target="_empty"><i class="fa top-social fa-instagram" style="height: 35px; width:35px; line-height: 35px;"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====================================================
                        CONTACT-P2
======================================================-->
<section class="contact-p2" id="contact-p2">
    <div class="container">
        <form id="contact_form">
            {{csrf_field()}}
            <div class="row con-form">
                <div class="col-md-4">
                    <input type="text" name="name" placeholder="Имя" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" name="email" placeholder="Почта" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" name="phone" placeholder="Телефон" class="form-control">
                </div>
                <div class="col-md-12">
                    <textarea name="message"></textarea>
                </div>
                <div class="col-md-12 sub-but">
                    <button type="submit" class="btn btn-general btn-white">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!--====================================================
                       MAP
======================================================-->
<section id="contact-add">
    <div id="map">
        <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1414.7181188086315!2d39.
            65738705268684!3d47.22680872652028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
            1!3m3!1m2!1s0x40e3b8c3a7c91be5%3A0xc7e2e9ea923ddf54!2z0JvQtdGB0L7Qv9Cw0YDQutC-0LLQsNGPINGD0LsuLCAxLCDQoNC-
            0YHRgtC-0LIt0L3QsC3QlNC-0L3Rgywg0KDQvtGB0YLQvtCy0YHQutCw0Y8g0L7QsdC7LiwgMzQ0MDAx
            !5e0!3m2!1sru!2sru!4v1559585149974!5m2!1sru!2sru"
                    width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>        </div>
    </div>
</section>

<!-- Modal Contact Form -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <br>
            <div class="modal-header" style="display: block; text-align: center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ваше сообщение отправлено, спасибо!</h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@endsection