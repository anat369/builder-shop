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
        <hr>
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Список заказов по товарам</h3>
                <br>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Кто заказал</th>
                            <th>Когда заказал</th>
                            <th>Комментарий к заказу</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <pre>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    Имя: {{$order->name}}
                                    <br>
                                    Почта: {{$order->email}}
                                    <br>
                                    Телефон:
                                    @if(0 == $order->phone)
                                        нет
                                    @else
                                        {{$order->phone}}
                                    @endif
                                    <br>
                                </td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->message}}</td>
                                <td>
                                    @if(0 == $order->status)
                                        Новый
                                    @else
                                        В обработке
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product-order-edit', $order->id)}}" title="Смотреть">
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                            <i class="ti-pencil-alt"></i></button>
                                    </a>

                                    {{Form::open([
                                    'route'=>['product-order.destroy', $order->id],
                                    'method'=>'delete',
                                    'style' => 'display:inline-block',
                                    'title' => 'Удалить'
                                    ])}}
                                    <button onclick="return confirm('Вы уверены, что хотите удалить этот заказ?')" type="submit" class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
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