<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="3 days" />

    <meta property="og:image" content="@yield('image')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/images/favicon.ico">

    @include('parts.css')
    @yield('variable_css')
</head>

<body id="page-top">

<!--====================================================
                         HEADER
======================================================-->

<header>

    <!-- Top Navbar  -->
    <div class="top-menubar">
        <div class="topmenu">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-inline top-contacts">
                            <li>
                                <i class="fa fa-envelope"></i> Email: <a href="mailto:{{$company->email}}">{{$company->email}}</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> Телефон: {{$company->phone}}
                            </li>
                            <li>
                                <i class="fa fa-calendar-times-o"></i> Время работы: {{$company->work_time}}
                            </li>
                            <li>
                                <a href="/viewCart"><i class="fa fa-cart-arrow-down"> Корзина (<span id="count-product-in-cart">{{$countProductsInCart}}</span>)</i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline top-data">
                            <li><a href="{{$company->instagram}}" target="_empty"><i class="fa top-social fa-instagram"></i></a></li>
                            @if(Auth::check())
                                <li><a class="log-top" href="#">| Мой профиль |</a></li>
                                <li><a class="log-top" href="/logout">Выход</a></li>
                            @else
                                <li><a href="#" class="log-top" data-toggle="modal" data-target="#login-modal">Вход / Регистрация</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
        <div class="container">
            <a class="navbar-brand smooth-scroll" href="/">
                {{--<img src="{{$company->getLogo('companies')}}" alt="logo">--}}
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-product" ><a class="nav-link smooth-scroll" href="/">Главная</a></li>
                    <li class="nav-product" >
                        <a class="nav-link smooth-scroll" href="/projects" >Проекты</a>
                    </li>
                    <li class="nav-product dropdown" >
                        <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Услуги</a>
                        <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($services as $service)
                            <a class="dropdown-item"  target="_empty" href="{{route('service.show', $service->slug)}}">{{$service->title}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-product dropdown" >
                        <a class="nav-link dropdown-toggle smooth-scroll" href="/products" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Каталог</a>
                        <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="/categories/{{$category->slug}}">{{$category->title}}</a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-product" ><a class="nav-link smooth-scroll" href="/contact">Контакты</a></li>

                    <li>
                        {{--<i class="search fa fa-search search-btn"></i>--}}
                        {{--<div class="search-open">--}}
                            {{--<div class="input-group animated fadeInUp">--}}
                                {{--<input type="text" class="form-control" placeholder="Что будем искать" aria-describedby="basic-addon2">--}}
                                {{--<span class="input-group-addon" id="basic-addon2">Поиск</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </li>
                    <li>
                        <div class="top-menubar-nav">
                            <div class="topmenu ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <ul class="list-inline top-contacts">
                                                <li>
                                                    <i class="fa fa-envelope"></i> Email: <a href="mailto:{{$company->email}}">{{$company->email}}</a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-phone"></i> Телефон: {{$company->phone}}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="list-inline top-data">
                                                <li><a href="{{$company->instagram}}" target="_empty"><i class="fa top-social fa-instagram"></i></a></li>
                                                @if(Auth::check())
                                                    <li><a class="log-top" href="#">| Мой профиль |</a></li>
                                                    <li><a class="log-top" href="/logout">Выход</a></li>
                                                @else
                                                    <li><a href="#" class="log-top" data-toggle="modal" data-target="#login-modal">Вход / Регистрация</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!--====================================================
                    LOGIN OR REGISTER
======================================================-->
<section id="login">
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </button>
                </div>
                <div id="div-forms">
                    <form id="login-form" action="/loginForm" method="post">
                        {{csrf_field()}}
                        <h3 class="text-center">Войти</h3>
                        <div class="modal-body">
                            <label for="username">Почта</label>
                            <input id="login_username" class="form-control" name="email" type="text" placeholder="Введите email" required>
                            <label for="username">Пароль</label>
                            <input id="login_password" class="form-control" name="password" type="password" placeholder="Введите пароль" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Запомнить
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <div>
                                <button type="submit" class="btn btn-general btn-white">Вход</button>
                            </div>
                            <div>
                                <button id="login_register_btn" type="button" class="btn btn-link">Зарегистрироваться</button>
                            </div>
                        </div>
                    </form>
                    <form id="register-form" style="display:none;" action="/signupForm" method="post">
                        {{csrf_field()}}
                        <h3 class="text-center">Регистрация</h3>
                        <div class="modal-body">
                            <label for="username">Имя</label>
                            <input id="register_username" name="name" class="form-control" type="text" placeholder="Введите имя" required>
                            <label for="register_email">Электронная почта</label>
                            <input id="register_email" name="email" class="form-control" type="text" placeholder="Введите email" required>
                            <label for="register_password">Пароль</label>
                            <input id="register_password" name="password" class="form-control" type="password" placeholder="Введите пароль" required>

                            <!-- Captcha -->
                            <div class="form-group">
                                <label for=""></label>
                                <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img"
                                     data-refresh-config="default">
                                <a href="#!" id="refresh"><span class=" fables-second-text-color ml-2">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="form-group">
                                <label>Введите слово с картинки</label>
                                <input class="form-control" type="text" name="captcha"/>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-general btn-white">Регистрация</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link">Войти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
            @endif
        </div>
    </div>
</div>

@include('parts.errors')

@yield('content')

<!--====================================================
                      FOOTER
======================================================-->
<footer id="footer_top">
    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="footer-copyrights">
                        <p> {{date('Y')}} г. &copy; Все права защищены.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" scrollup btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="Наверх" role="button">
        <i class="fa fa-angle-up"></i>
    </div>
</footer>

<!-- Modal Cart -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: block; text-align: center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Товар добавлен в корзину!</h4>
            </div>
            <div class="modal-body">
            <p style="text-align: center">Вы можете продолжить покупки или перейти в корзину!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="/viewCart" type="button" class="btn btn-primary">Оформить заказ</a>
            </div>
        </div>
    </div>
</div>

@include('parts.js')

<script>
    jQuery(document).ready(function ($) {
        $('.add-to-cart').click(function (el) {
            var product_id = $(this).data('id');
            var el = $(this);
            $.ajax({
                type: 'post',
                url: '/addProductInCart',
                data: {_token: "{{csrf_token()}}", product_id: product_id},
                success: function (response) {
                    // console.log(response);
                    $("#count-product-in-cart").html(response);
                    showCart();
                }
            });
            return false;
        });

        /**
         *  функция показа модального окна корзины после добавления товара
         * @param cart
         */
        function showCart(cart){
            if($.trim(cart) === '<h3>Корзина пуста</h3>'){
                $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
            }else{
                $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
            }
            $('#cart .modal-body').html(cart);
            $('#cart').modal();
        }
    })
</script>

<script>
    // заказ услуги
    jQuery(document).ready(function($) {
        $('#order_form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/order',
                data: $('#order_form').serialize(),
                success: function(data){
                    // $('.order_product').hide();
                    document.getElementById("order_product").innerHTML =
                        '<h4 style="text-align: center">'+"Корзина пуста"+'</h4>'+'<br>';
                    document.getElementById("count-product-in-cart").innerHTML ="0 товаров";
                    document.getElementById("order_form").innerHTML =
                        '<h4 style="text-align: center">'+"Спасибо за заказ, наш менеджер скоро с вами свяжется!"+'</h4>'+'<br>';
                }
            });

            return false;
        });
    });
</script>

<script>
    // отправка сообщения
    jQuery(document).ready(function($) {
        $('#contact_form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/contactForm',
                data: $('#contact_form').serialize(),
                success: function(data){
                    $('#contact_form')[0].reset();
                    $('#contact').modal();
                }
            });

            return false;
        });
    });
</script>

<script>
    // удаление товара из корзины
    jQuery(document).ready(function($) {
        $('.delete_product').click(function () {
            var product_id = $(this).data('id');
            var el = $(this);
            $.ajax({
                type: 'POST',
                url: '/deleteProductInCart',
                data: {_token: "{{ csrf_token() }}", product_id: product_id},
                success: function (response) {
                    location.reload();
                }
            });
            return false;
        });
    });

</script>

<script>
    $(document).ready(function() {

        var docHeight = $(window).height();
        var footerHeight = $('#footer_top').height();
        var footerTop = $('#footer_top').position().top + footerHeight;

        if (footerTop < docHeight)
            $('#footer_top').css('margin-top', 10+ (docHeight - footerTop) + 'px');
    });
</script>

</body>

</html>
