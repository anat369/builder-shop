@extends('layout')

@section('title', 'Проекты и выполненные работы строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('meta_description', 'Проекты и выполненные работы строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('meta_keywords', 'Проекты и выполненные работы строительной компании Отец и сыновья г. Ростов-на-Дону')
@section('meta_title', 'Проекты и выполненные работы строительной компании Отец и сыновья г. Ростов-на-Дону')

@section('content')

<!--====================================================
                       NEWS
======================================================-->
<section id="comp-offer">
    <div class="container-fluid">
        <div  class="row">
            @foreach($projects as $project)
            <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.6s">
                <div class="desc-comp-offer-cont">
                    <div class="thumbnail-blogs">
                        <a href="{{route('project.show', $project->slug)}}">
                        <img src="{{$project->getImage('projects', 'image_0')}}" class="img-fluid" alt="{{$project->title}}" title="{{$project->title}}">
                        </a>
                    </div>
                    <h3>{{$project->title}}</h3>
                    <p class="desc">{{$project->description}}</p>
                    <a href="{{route('project.show', $project->slug)}}"><i class="fa fa-arrow-circle-o-right"></i>Подробнее</a>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</section>

@endsection