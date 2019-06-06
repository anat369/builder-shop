<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Меню</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li> <a href="/admin" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu">Главная</span></a>
            </li>
            <li> <a href="{{route('companies.index')}}" class="waves-effect"><i  class="mdi mdi-account-card-details fa-fw"></i> <span class="hide-menu">Данные о компании</span></a> </li>
            <li>
                <a href="#" class="waves-effect"><i class="mdi mdi-square-inc-cash fa-fw"></i>
                    <span class="hide-menu">Заказы</span>
                    @if(0 != $countNewOrderServices or 0 != $countNewOrderProducts)
                        <span class="label label-rouded label-danger pull-right pulsate">
                        New!
                    </span>
                    @endif
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="{{route('product-orders.index')}}"><i class="ti-wallet"></i>
                            <span class="hide-menu">Заказы товара </span>
                            <span class="label label-rouded label-danger pull-right">{{$countNewOrderProducts}}
                            </span>
                        </a>
                    </li>
                    <li><a href="{{route('service-orders.index')}}"><i class="ti-email"></i>
                            <span class="hide-menu">Заказы услуг</span>
                            <span class="label label-rouded label-danger pull-right">{{$countNewOrderServices}}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li> <a href="{{route('users.index')}}" class="waves-effect"><i  class="mdi mdi-account-edit fa-fw"></i> <span class="hide-menu">Пользователи</span></a> </li>
            <li>
                <a href="{{route('messages.index')}}" class="waves-effect"><i  class="mdi mdi-contact-mail fa-fw"></i>
                    <span class="hide-menu">Сообщения</span>
                    <span class="label label-rouded label-primary pull-right">{{$countNewMessages}}</span>
                </a>
            </li>
            <li>
                <a href="#" class="waves-effect"><i  class="mdi mdi-deskphone fa-fw"></i>
                    <span class="hide-menu">Услуги<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="{{route('services.index')}}"><i class="ti-wallet"></i> <span class="hide-menu">Все услуги</span></a></li>
                    <li><a href="{{route('services.create')}}"><i class="ti-email"></i> <span class="hide-menu">Добавить новую</span></a></li>
                </ul>
            </li>
            <li> <a href="{{route('projects.index')}}" class="waves-effect"><i  class="mdi mdi-food-fork-drink fa-fw"></i> <span class="hide-menu">Проекты</span></a> </li>
            <li> <a href="{{route('categories.index')}}" class="waves-effect"><i  class="mdi mdi-notification-clear-all fa-fw"></i> <span class="hide-menu">Категории</span></a> </li>
            <li> <a href="{{route('products.index')}}" class="waves-effect"><i  class="mdi mdi-television-guide fa-fw"></i> <span class="hide-menu">Товары</span></a> </li>
        </ul>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->