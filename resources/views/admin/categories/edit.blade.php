@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Редактирование категории</h3>
            <br>
            {!! Form::open([
                'route' => ['categories.update', $category->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Название</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$category->title}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Краткое описание</label>
                <div class="col-md-12">
                    <input type="text" name="description" class="form-control" placeholder="Краткое описание категории" value="{{$category->description}}" required>
                </div>
            </div>

            <div class="row form-group">
                    <label for="logo" class=" form-control-label">Логотип</label>
                <br>
                <img src="{{$category->getImage('categories', 'logo')}}" alt="" class="img-responsive" width="200">
                <br>
                <div class="col-6 col-md-6">
                    <input type="file" id="logo" name="logo" class="btn btn-block btn-outline btn-primary">
                </div>
            </div>

            <h4>Блок данных, используемых для SEO-продвижения</h4>
            <br>
            <div class="form-group">
                <label for="exampleInputMetaTitle">Заголовок страницы категории (title)</label>
                <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Не более 300 символов"
                       name="meta_title" value="{{$category->meta_title}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputMetaKeywords">Ключевые слова (keywords)</label>
                <input type="text" class="form-control" id="exampleInputMetaKeywords" placeholder="Не более 300 символов"
                       name="meta_keywords" value="{{$category->meta_keywords}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputMetaDescription">Ключевое описание категории (description)</label>
                <input type="text" class="form-control" id="exampleInputMetaDescription" placeholder="Не более 300 символов"
                       name="meta_description" value="{{$category->meta_description}}" required>
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