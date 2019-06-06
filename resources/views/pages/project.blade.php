@extends('layout')

@section('title', $project->meta_title)
@section('meta_description', $project->meta_description)
@section('meta_keywords', $project->meta_keywords)
@section('image', $project->getImage('projects', 'image_0'))

@section('content')
<!--====================================================
                       HOME-P
======================================================-->
<div id="home-p" class="home-p pages-head2 text-center">
    <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"> {{$project->title}}</h1>
    </div><!--/end container-->
</div>

<!--====================================================
                  SINGLE-PRODUCT-P1
======================================================-->
<br>
<section id="single-product-p1">
    <div class="container">
        <div class="wrapper row">

            <div class="preview col-md-6">
                <div class="preview-pic tab-content">
                    @for($i=0; $i<5; $i++)
                        @if('/images/no-image.png' != $project->getImage('projects', 'image_' . $i ))
                            <div class="tab-pane <?php if (0 == $i) { ?>active<?php }; ?>" id="pic-<?= $i; ?>">
                                <img src="{{$project->getImage('projects', 'image_' . $i )}}" width="10%"/>
                            </div>
                        @endif
                    @endfor
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    @for($i=0; $i<5; $i++)
                        @if('/images/no-image.png' != $project->getImage('projects', 'image_' . $i ))
                            <li <?php if (0 == $i) { ?> class="active" <?php }; ?>>
                                <a data-target="#pic-<?= $i; ?>" data-toggle="tab"><img
                                            src="{{$project->getImage('projects', 'image_' . $i)}}"/></a></li>
                        @endif
                    @endfor
                </ul>
            </div>
            <div class="details col-md-6">
                <h3 class="product-title">{{$project->title}}</h3>
                {!! $project->content !!}
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</section>


@endsection