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
            <h3 class="box-title m-b-0">Создание проекта</h3>
            <br>
            {!! Form::open([
                'route' => 'projects.store',
                'files'	=>	true,
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Название</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label>Выберите тип оказываемой услуги</label>
                {{Form::select('services[]',
                    $services,
                    null,
                    ['class' => 'selectpicker bs-select-hidden',
                    'data-style' => 'form-control',
                    'multiple'=>'multiple',
                    'data-placeholder'=>'Выберите услугу'])
                }}
            </div>

            <div class="form-group">
                <label class="col-md-12">Краткое описание</label>
                <div class="col-md-12">
                    <textarea type="text" name="description" class="form-control" required>
                        {{old('description')}}
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Полное описание</label>
                <div class="col-md-12">
                    <textarea type="text" name="content" class="form-control" required>
                        {{old('content')}}
                    </textarea>
                </div>
            </div>

            <br>
            <h3 style="text-align: center">Блок добавления изображений</h3>
            <br>
            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_0" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_0" name="image_0" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_1" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_1" name="image_1" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_2" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_2" name="image_2" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_3" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_3" name="image_3" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_4" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_4" name="image_4" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_5" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_5" name="image_5" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_6" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_6" name="image_6" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <div class="col col-sm-6 col-md-6">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image_7" class=" form-control-label" style="font-size: 0.8vw;">Изображение</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="file" id="image_7" name="image_7" class="btn btn-block btn-outline btn-primary">
                    </div>
                </div>
            </div>

            <h3 style="text-align: center">Блок данных, используемых для SEO-продвижения</h3>
            <br>
            <div class="form-group">
                <label for="exampleInputMetaTitle">Заголовок страницы проекта (title)</label>
                <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Не более 300 символов"
                       name="meta_title" value="{{old('meta_title')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputMetaKeywords">Ключевые слова (keywords)</label>
                <input type="text" class="form-control" id="exampleInputMetaKeywords" placeholder="Не более 300 символов"
                       name="meta_keywords" value="{{old('meta_keywords')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputMetaDescription">Ключевое описание проекта (description)</label>
                <input type="text" class="form-control" id="exampleInputMetaDescription" placeholder="Не более 300 символов"
                       name="meta_description" value="{{old('meta_description')}}">
            </div>

            </div>
            <hr style="background-color: red">

            <div>
                <button type="submit" class="btn btn-block btn-outline btn-success">
                    <span>Добавить</span>
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

