@extends('layout')

@section('title', $company->meta_title)
@section('meta_description', $company->meta_description)
@section('meta_keywords', $company->meta_keywords)
@section('image', $company->getImage('companies', 'logo'))

@section('content')
<!--====================================================
                         HOME
======================================================-->
<section id="home">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active slides">
                <div class="overlay"></div>
                <div class="slide-1"></div>
                <div class="hero ">
                    <section class="wow fadeInUp">
                        <h2 style="color: white">Поможем сделать <span ><a href="/services" class="typewrite" data-period="2000" data-type='[ " Окожушивание", " Теплоизоляцию", "Грунтовку и покраску"]'>
                        <span class="wrap"></span></a></span> </h2>
                        <br>
                        <h3>Качественно, недорого и в срок!</h3>
                    </section>
                    <a href="{{$company->getPriceList()}}" download><button class="btn btn-general btn-green wow fadeInUp" role="button">Скачать прайс-лист</button></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====================================================
                       PROJECTS
======================================================-->
<section id="comp-offer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6  desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                <h2>Последние проекты</h2>
                <div class="heading-border-light"></div>
                <a href="/projects"><button class="btn btn-general btn-green" role="submit">Смотреть все</button></a>
            </div>
            @foreach($latestProject as $project)
                <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.5s">
                <div class="desc-comp-offer-cont">
                    <div class="thumbnail-blogs">
                        <div class="caption">
                            <a href="{{route('project.show', $project->slug)}}">
                            <i class="fa fa-arrow-circle-o-right" style="color: black;"></i>
                            </a>
                        </div>
                        <img src="{{$project->getImage('projects', 'image_0')}}" class="img-fluid" alt="{{$project->title}}">
                    </div>
                    <h3>{{$project->title}}</h3>
                    <p class="desc">{{$project->description}}</p>
                    <a href="{{route('project.show', $project->slug)}}"><i class="fa fa-arrow-circle-o-right"></i> Посмотреть</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--====================================================
                      COMPANY
======================================================-->
<section id="story">
    <div class="container">
        {{--<div class="row title-bar">--}}
            {{--<div class="col-md-12">--}}
                {{--<h1 class="wow fadeInUp">Блок о компании</h1>--}}
                {{--<div class="heading-border"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <div class="container-fluid">
        <div class="row" >
            <div class="col-md-6" >
                <div class="story-himg" >
                    <img src="/images/image-4.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="story-desc">
                    <h3>Немного о нашей компании</h3>
                    <div class="heading-border-light"></div>
                    <p>{!! $company->content !!}</p>
                    <div class="title-but"><a href="/contact"><button class="btn btn-general btn-green" role="submit">Обратная связь</button></a></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--====================================================
                  REVIEWS
======================================================-->
{{--<div class="overlay-thought"></div>--}}
{{--<section id="thought" class="bg-parallax thought-bg">--}}
    {{--<div class="container">--}}
        {{--<div id="thought-desc" class="row title-bar title-bar-thought owl-carousel owl-theme">--}}
            {{--<div class="col-md-12 ">--}}
                {{--<div class="heading-border bg-white"></div>--}}
                {{--<p class="wow fadeInUp" data-wow-delay="0.4s">Businessbox will deliver value to all the stakeholders and will attain excellence and leadership through such delivery of value. We will strive to support the stakeholders in all activities related to us. Businessbox provide great things.</p>--}}
                {{--<h6>John doe</h6>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 thought-desc">--}}
                {{--<div class="heading-border bg-white"></div>--}}
                {{--<p class="wow fadeInUp" data-wow-delay="0.4s">Ensuring quality in Businessbox is an obsession and the high quality standards set by us are achieved through a rigorous quality assurance process. Quality assurance is performed by an independent team of trained experts for each project. </p>--}}
                {{--<h6>Tom John</h6>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

<!--====================================================
                   SERVICE-HOME
======================================================-->
<section id="service-h">
    <div class="row title-bar">
        <div class="col-md-12">
            <h1 class="wow fadeInUp">Услуги</h1>
            <div class="heading-border" style="width: 200px;"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 col-sm-6  desc-comp-offer wow fadeIn(3000)">
                <div class="blog-item">
                    <div >
                        <img src="{{$service->getImage('services', 'logo')}}" alt="{{$service->title}}" class="img-responsive">
                    </div>
                    <div class="blog-desc">
                        <h5 class="blog-title"><a href="{{route('service.show', $service->slug)}}"
                                                  tabindex="0" style="color: black">{{$service->title}}</a></h5>
                        <p>{{$service->description}}</p>
                        <div class="read-more">
                            <a href="{{route('service.show', $service->slug)}}" tabindex="0">Читать дальше...</a>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection