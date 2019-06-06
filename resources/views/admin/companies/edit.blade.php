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
            <h3 class="box-title m-b-0">Изменение данных фирмы</h3>
            <br>
            {!! Form::open([
                'route' => ['companies.update', $company->id],
                'files'	=>	true,
                'method' => 'put',
                'class' => 'form-horizontal',
            ]) !!}

            <div class="form-group">
                <label class="col-md-12">Название</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" value="{{$company->title}}" required>
                </div>
            </div>

            <div class="row form-group">
                <label for="logo" class=" form-control-label">Логотип</label>
                <br>
                <img src="{{$company->getImage('companies', 'logo')}}" alt="" class="img-responsive" width="200">
                <br>
                <div class="col-6 col-md-6">
                    <input type="file" id="logo" name="logo" class="btn btn-block btn-outline btn-primary">
                </div>
            </div>

            <div class="row form-group">
                <label for="price_list" class=" form-control-label">Прайс-лист компании</label>
                <br>
                <div class="col-6 col-md-6">
                    <input type="file" id="price_list" name="price_list" class="btn btn-block btn-outline btn-primary">
                </div>
                <div class="col-6 col-md-6">
                    <a href="{{$company->getPriceList()}}" class="btn btn-primary" download>Скачать старый прайс-лист</a>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-12">Краткое описание </label>
                <div class="col-md-12">
                    <textarea type="text" name="description" class="form-control" required>
                        {{$company->description}}
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Полное описание </label>
                <div class="col-md-12">
                    <textarea type="text" name="content" class="form-control" required>
                        {{$company->content}}
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Электронная почта</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="email" value="{{$company->email}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Номер телефона</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="phone" value="{{$company->phone}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Время работы</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="work_time" value="{{$company->work_time}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Адрес</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="address" value="{{$company->address}}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Инстаграмм</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="instagram" value="{{$company->instagram}}" required>
                </div>
            </div>

            <h4>Блок данных, используемых для SEO-продвижения</h4>
            <br>
            <div class="form-group">
                <label for="exampleInputMetaTitle">Заголовок страницы товара (title)</label>
                <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Не более 300 символов"
                       name="meta_title" value="{{$company->meta_title}}">
            </div>
            <div class="form-group">
                <label for="exampleInputMetaKeywords">Ключевые слова (keywords)</label>
                <input type="text" class="form-control" id="exampleInputMetaKeywords" placeholder="Не более 300 символов"
                       name="meta_keywords" value="{{$company->meta_keywords}}">
            </div>
            <div class="form-group">
                <label for="exampleInputMetaDescription">Ключевое описание товара (description)</label>
                <input type="text" class="form-control" id="exampleInputMetaDescription" placeholder="Не более 300 символов"
                       name="meta_description" value="{{$company->meta_description}}">
            </div>

            <hr style="background-color: red">

            <div>
                <button type="submit" class="btn btn-block btn-outline btn-success">
                    <span>Сохранить изменения</span>
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

@endsection

