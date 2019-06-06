@extends('admin.layout')

@section('content')
    @include('admin.parts.errors')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Редактирование услуги</h3>
            <br>
            {!! Form::open([
                'route' => ['services.update', $service->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}
            <div class="form-group">
                <label class="col-md-12">Название</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$service->title}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Краткое описание</label>
                <div class="col-md-12">
                    <input type="text" name="description" class="form-control" placeholder="Краткое описание услуги" value="{{$service->description}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Полное описание</label>
                <div class="col-md-12">
                    <textarea type="text" name="content" class="form-control" required>
                        {{$service->content}}
                    </textarea>
                </div>
            </div>


            <div class="row form-group">
                <label for="logo" class=" form-control-label">Логотип</label>
                <br>
                <img src="{{$service->getImage('services', 'logo')}}" alt="" class="img-responsive" width="200">
                <br>
                <div class="col-6 col-md-6">
                    <input type="file" id="logo" name="logo" class="btn btn-block btn-outline btn-primary">
                </div>
            </div>

            <h4>Блок данных, используемых для SEO-продвижения</h4>
            <br>
            <div class="form-group">
                <label for="exampleInputMetaTitle">Заголовок страницы услуги (title)</label>
                <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Не более 300 символов"
                       name="meta_title" value="{{$service->meta_title}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputMetaKeywords">Ключевые слова (keywords)</label>
                <input type="text" class="form-control" id="exampleInputMetaKeywords" placeholder="Не более 300 символов"
                       name="meta_keywords" value="{{$service->meta_keywords}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputMetaDescription">Ключевое описание услуги (description)</label>
                <input type="text" class="form-control" id="exampleInputMetaDescription" placeholder="Не более 300 символов"
                       name="meta_description" value="{{$service->meta_description}}" required>
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
    <script src="/js/admin/ckeditor/ckeditor.js"></script>
    <script src="/js/admin/ckfinder/ckfinder.js"></script>
    <script>
        var editor = CKEDITOR.replace( 'content' );
    </script>
@endsection