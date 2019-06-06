@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Создание категории</h3>
            <br>
            {!! Form::open([
                'route' => 'categories.store',
                'files'	=>	true,
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Название</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Краткое описание</label>
                <div class="col-md-12">
                    <input type="text" name="description" class="form-control" placeholder="Краткое описание категории" value="{{old('description')}}" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="logo" class=" form-control-label">Логотип</label>
                </div>
                <div class="col-6 col-md-6">
                    <input type="file" id="logo" name="logo" class="btn btn-block btn-outline btn-primary">
                </div>
            </div>

                <h4>Блок данных, используемых для SEO-продвижения</h4>
                <br>
                <div class="form-group">
                    <label for="exampleInputMetaTitle">Заголовок страницы категории (title)</label>
                    <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Не более 300 символов"
                           name="meta_title" value="{{old('meta_title')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputMetaKeywords">Ключевые слова (keywords)</label>
                    <input type="text" class="form-control" id="exampleInputMetaKeywords" placeholder="Не более 300 символов"
                           name="meta_keywords" value="{{old('meta_keywords')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputMetaDescription">Ключевое описание категории (description)</label>
                    <input type="text" class="form-control" id="exampleInputMetaDescription" placeholder="Не более 300 символов"
                           name="meta_description" value="{{old('meta_description')}}">
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