@extends('layouts.admin.app')
@section('title', 'Orders')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">

@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-10 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Orders Detail</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">

                            </ul>
                        </div>
                    </div>

                    @if($order_display)
                    <div class="table-responsive m-t-10">
                        <!-- <a class="btn btn-success" href="{{url('admin/order/add/')}}" role="button">Add FAQ</a> -->

                        <table id="myTable" class="table color-table table-bordered product-table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Quantity</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($order_display as $key=>$order_detail)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order_detail->order_number }}</td>
                                    <td>{{ $order_detail->quantity }}</td>
                                    <td>{{ $order_detail->payment_status }}</td>
                                    <td>{{ $order_detail->status() }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/order/invoice/'.$order_detail->id) }}" target="_blank"><i class="fas fa-file"></i></a>

                                        <a href="{{ url('/admin/order/'.$order_detail->id) }}"><i class="fas fa-eye"></i></a>

                                        <form style="display: inline-block;" method="POST" action="{{ url('/admin/order',$order_detail->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick='return confirm("Confirm delete?")' style="border: none;outline: none;padding:0;background: #fff;" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
                                        </form>

                                        <!-- <a href="{{ route('order.destroy', $order_detail->id) }}" onclick='return confirm("Confirm delete?")'><i class="fas fa-trash-alt text-danger"></i></a> -->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.includes.templates.footer')
</div>

@endsection



@push('js')
<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>

<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>

<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>

<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>

<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>

<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>

<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>

<script>
    $(function () {
        $('#myTable').DataTable();
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [

            [2, 'asc']

            ],
            "displayLength": 18,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            }
            else {
                table.order([2, 'asc']).draw();
            }
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('.order_status').change(function(){
        var value = $(this).val();

        // var order_number = $(this).closest('tr');
        var row = $("selected td:nth-child(2)").html();
        console.log(row);
    })
</script>

<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>

@endpush
