@extends('admin.layout')

@section('variable_css')
    <!-- page CSS -->
    <link href="/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Изменение проекта</h3>
            <br>
            {!! Form::open([
                'route' => ['projects.update', $project->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Название</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$project->title}}" required>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label>Выберите услугу</label>
                {{Form::select('services[]',
                    $services,
                    null,
                    ['class' => 'selectpicker bs-select-hidden',
                    'data-style' => 'form-control',
                    'multiple'=>'multiple',
                    'data-placeholder'=>'Выберите категорию'])
                }}
            </div>

            <div class="form-group">
                <label class="col-md-12">Краткое описание</label>
                <div class="col-md-12">
                    <textarea type="text" name="description" class="form-control" required>
                        {{$project->description}}
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Полное описание</label>
                <div class="col-md-12">
                    <textarea type="text" name="content" class="form-control" required>
                        {{$project->content}}
                    </textarea>
                </div>
            </div>

            @for($number = 0; $number<=7; $number++)
                <div class="col col-sm-6 col-md-6">

                <div class="row form-group">
                    <div class="col col-md-3">
                    <label for="image_{{$number}}" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                <br>
                    <div class="col-6 col-md-6">

                    <img src="{{$project->getImage('projects', 'image_'.$number)}}" alt="" class="img-responsive" width="100">
                        <br>

                    </div>
                <div class="col-6 col-md-6">
                    <input type="file" id="image_{{$number}}" name="image_{{$number}}" class="btn btn-block btn-outline btn-primary">
                </div>
            </div>
                </div>
            @endfor

            <br>
            <div class="col col-sm-12 col-md-12">

            <h4 style="text-align: center">Блок данных, используемых для SEO-продвижения</h4>
            <br>
            <div class="form-group">
                <label for="exampleInputMetaTitle">Заголовок страницы проекта (title)</label>
                <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Не более 300 символов"
                       name="meta_title" value="{{$project->meta_title}}">
            </div>
            <div class="form-group">
                <label for="exampleInputMetaKeywords">Ключевые слова (keywords)</label>
                <input type="text" class="form-control" id="exampleInputMetaKeywords" placeholder="Не более 300 символов"
                       name="meta_keywords" value="{{$project->meta_keywords}}">
            </div>
            <div class="form-group">
                <label for="exampleInputMetaDescription">Ключевое описание проекта (description)</label>
                <input type="text" class="form-control" id="exampleInputMetaDescription" placeholder="Не более 300 символов"
                       name="meta_description" value="{{$project->meta_description}}">
            </div>
            </div>

            <hr style="background-color: red">

            <div>
                <button type="submit" class="btn btn-block btn-outline btn-success">
                    <span>Изменить</span>
                </button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('variable_js')
    <script src="/plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script src="/js/admin/ckeditor/ckeditor.js"></script>
    <script src="/js/admin/ckfinder/ckfinder.js"></script>
    <script>
        var editor = CKEDITOR.replace( 'content' );
    </script>
@endsection

