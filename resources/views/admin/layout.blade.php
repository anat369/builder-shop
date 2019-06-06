<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Админ панель сайта</title>
    <!-- Bootstrap Core CSS -->

    @include('admin.parts.css')

    @yield('variable_css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">

    @include('admin.parts.navbar')

    @include('admin.parts.sidebar')


    <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Админ панель</h4></div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                @yield('content')

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> {{date('Y')}} г. &copy; Все права защищены</footer>
        </div>
        <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@include('admin.parts.js')

@yield('variable_js')

</body>

</html>
