@extends('layout')

@section('title', $service->title)
@section('meta_description', $service->meta_description)
@section('meta_keywords', $service->meta_keywords)
@section('meta_title', $service->meta_title)
@section('image', $service->getImage('services', 'logo'))

@section('content')

    <!--====================================================
                          NEWS DETAILS
    ======================================================-->
    <section id="single-news-p1" class="single-news-p1">
        <br>
        <div class="container">
            <div class="row">

                <!-- left news details -->
                <div class="col-md-8">
                    <div class="single-news-p1-cont">
                        <div class="single-news-img">
                            <img src="{{$service->getImage('services', 'logo')}}" alt="{{$service->title}}" title="{{$service->title}}" class="img-fluid">
                        </div>
                        <div class="single-news-desc">
                            <br>
                            <h3>{{$service->title}}</h3>
                            <hr>
                            <div class="bg-light-gray">
                                {!! $service->content !!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <a href="#">
                        <button class="btn btn-general btn-green" data-toggle="modal" data-target="#service-modal">Заказать услугу</button>
                    </a>

                </div>

                <!-- Right news details -->
                <div class="col-md-4">
                    <div class="ad-box-sn">
                        <h3 class="pb-2">Проекты</h3>
                        @foreach($service->projects->take(3) as $project)
                        <div class="card">
                            <div class="desc-comp-offer-cont">
                                <div class="thumbnail-blogs">
                                    <div class="caption">
                                        <i class="fa fa-arrow-circle-o-right"></i>
                                    </div>
                                    <img src="{{$project->getImage('projects', 'image_0')}}" class="img-fluid" alt="{{$project->title}}">
                                </div>
                                <h3>{{$project->title}}</h3>
                                <p class="desc">{{$project->description}}</p>
                                <a href="{{route('project.show', $project->slug)}}"><i class="fa fa-arrow-circle-o-right"></i> Посмотреть</a>
                                <br>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====================================================
                    ORDER SERVICE
======================================================-->
    <section id="service">
        <div class="modal fade" id="service-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="fa fa-times" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div id="div-forms">
                        <form id="order_service">
                            {{csrf_field()}}
                            @if(Auth::check())
                                <h4 class="text-center">Добавьте комментарий к заказу</h4>
                                <div class="modal-body">
                                    <input class="form-control" name="service_id" type="hidden" value="{{$service->id}}">
                                    <label for="message">Комментарий</label>
                                    <textarea id="message" class="form-control" name="message" type="text"></textarea>
                                </div>
                            @else
                            <h3 class="text-center">Заполните форму</h3>
                            <div class="modal-body">
                                <input class="form-control" name="service_id" type="hidden" value="{{$service->id}}">
                                <label for="name">Имя</label>
                                <input id="name" class="form-control" name="name" type="text" placeholder="Как вас зовут" required>
                                <br>
                                <label for="email">Почта</label>
                                <input id="email" class="form-control" name="email" type="email" placeholder="Ваша почта" required>
                                <br>
                                <label for="phone">Телефон</label>
                                <input id="phone" class="form-control" name="phone" type="text" placeholder="Ваш номер телефона" required>
                                <br>
                                <label for="password">Придумайте пароль</label>
                                <input id="password" class="form-control" name="password" type="password" placeholder="Любые 6 символов..." required>
                                <br>
                                <label for="message">Комментарий</label>
                                <textarea id="message" class="form-control" name="message" type="text"></textarea>
                            </div>
                            @endif
                            <div class="modal-footer text-center">
                                <div>
                                    <button type="submit" class="btn btn-general btn-white">Заказать</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

@endsection