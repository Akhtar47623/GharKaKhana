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
                        <h5 class="card-title m-b-0 align-self-center">Update Order</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/order/update/'.$order_edit->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

    <div class="form-group">
        <label for="order_status">Order Status:</label>
        <select class="form-control" id="order_status" name="order_status">
            <option value="{{ $order_edit->order_status }}" selected>{{ $order_edit->order_status }}</option>
            <option value="approved" >Approved</option>
    </select>
        <!-- <input type="text" class="form-control" id="order_status" name="order_status" value="{{ $order_edit->order_status }}" > -->
    </div>
    <div class="form-group">
        <label for="order_number">Order Number:</label>
        <input type="text" class="form-control" id="order_number" name="order_number" value="{{ $order_edit->order_number }}" disabled>
    </div>
    <div class="form-group">
        <label for="quantity">Order Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $order_edit->quantity }}" disabled>
    </div>
    <div class="form-group">
        <label for="address1">Order Address 1:</label>
        <input type="text" class="form-control" id="address1" name="address1" value="{{ $order_edit->address1 }}" disabled>
    </div>
    <div class="form-group">
        <label for="address2">Order Address 2:</label>
        <input type="text" class="form-control" id="address2" name="address2" value="{{ $order_edit->address2 }}" disabled>
    </div>
    <div class="form-group">
        <label for="area">Order Area:</label>
        <input type="text" class="form-control" id="area" name="area" value="{{ $order_edit->area }}" disabled>
    </div>
    <div class="form-group">
        <label for="city">Order City:</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ $order_edit->city }}" disabled>
    </div>
    <div class="form-group">
        <label for="state">Order State:</label>
        <input type="text" class="form-control" id="state" name="state" value="{{ $order_edit->state }}" disabled>
    </div>
    <div class="form-group">
        <label for="zipcode">ZipCode:</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $order_edit->zipcode }}" disabled>
    </div>
    <div class="form-group">
        <label for="subtotal">SubTotal:</label>
        <input type="text" class="form-control" id="subtotal" name="subtotal" value="{{ $order_edit->subtotal }}" disabled>
    </div>
    <div class="form-group">
        <label for="Total">Total Amount:</label>
        <input type="text" class="form-control" id="Total" name="Total" value="{{ $order_edit->Total }}" disabled>
    </div>
    <button class="btn btn-success pull-center" type="submit">Update</button>
</form>
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
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
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
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush
