@extends('admin.layout')

@section('variable_css')
    <!-- chartist CSS -->
    <link href="/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="/plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
@endsection

@section('content')

            <!-- .row -->
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Пользователи</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-people text-info"></i></li>
                            <li class="text-right"><span class="counter">{{$countUsers}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Проекты</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-folder text-purple"></i></li>
                            <li class="text-right"><span class="counter">{{$countProjects}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Услуги</h3>
                        <ul class="list-inline two-part">
                            <li><i class="ti-wallet text-success"></i></li>
                            <li class="text-right"><span class="">{{$countServices}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Товары</h3>
                        <ul class="list-inline two-part">
                            <li><i class="glyphicon glyphicon-briefcase text-success"></i></li>
                            <li class="text-right"><span class="">{{$countProducts}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Заказы</h3>
                        <ul class="list-inline two-part">
                            <li><i class="glyphicon glyphicon-shopping-cart text-success"></i></li>
                            <li class="text-right">
                                <span class="">
                                    {{$countOrders}}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Сообщения</h3>
                        <ul class="list-inline two-part">
                            <li><i class="glyphicon glyphicon-envelope text-success"></i></li>
                            <li class="text-right"><span class="">{{$countMessages}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>

@endsection

@section('variable_js')
    <!-- Vector map JavaScript -->
    <script src="/plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/plugins/bower_components/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/plugins/bower_components/vectormap/jquery-jvectormap-in-mill.js"></script>
    <script src="/plugins/bower_components/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <!-- chartist chart -->
    <script src="/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- sparkline chart JavaScript -->
    <script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="/js/admin/dashboard3.js"></script>
@endsection