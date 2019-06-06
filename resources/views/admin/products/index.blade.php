@extends('admin.layout')

@section('variable_css')
    <link href="/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')
    <!-- /row -->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
            <a href="{{route('products.create')}}">
                <button class="btn btn-block btn-outline btn-info">Добавить товар</button>
            </a>
        </div>
        <hr>
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Список товаров</h3>
                <br>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Логотип</th>
                            <th>Категория</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>
                                    <img src="{{$product->getImage('products', 'image_0')}}" alt="" width="90" style="border:2px solid dodgerblue">
                                </td>
                                <td>
                                    @foreach($product->categories as $category)
                                        <button class="fcbtn btn btn-info btn-outline btn-1e">{{$category->title}}</button>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('products.edit', $product->id)}}" title="Редактировать">
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                            <i class="ti-pencil-alt"></i></button>
                                    </a>
                                    {{Form::open([
                                    'route'=>['products.destroy', $product->id],
                                    'method'=>'delete',
                                    'style' => 'display:inline-block',
                                    'title' => 'Удалить'
                                    ])}}
                                    <button onclick="return confirm('Вы уверены, что хотите удалить товар?')" type="submit" class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                        <i class="icon-trash"></i>
                                    </button>

                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('variable_js')
    <script src="/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection