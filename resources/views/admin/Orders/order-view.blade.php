@extends('layouts.admin.app')
@section('title', 'Orders')
<style type="text/css">
    .status_select {
    width: 14%;
    text-align: right;
    height: 150px;
    padding: 16px 3px 10px 10px;
}
.status_select button {
    text-align: center;
    width: 137px;
    height: 32px;
}
</style>

@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Order # {{$order->order_number}}</h3>
                        <a href="{{url('/admin/order/')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right"> Back</a>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Customer Information:</h2>

                                <label for="firstname"><b>Customer Name :</b></label>
                                <span id="firstname">{{ $customer->first_name }} {{ $customer->last_name }}</span><br>

                                <label for="useremail"><b>Email :</b></label>
                                <span id="useremail">{{ $customer->email }}</span><br>

                                <label for="usercontact"><b>Contact :</b></label>
                                <span id="usercontact">{{ $customer->contact }}</span>

                            </div>
                            <div class="col-md-4">
                                <h2>Shipping Information:</h2>

                                <label for="firstname"><b>Address :</b></label>
                                <span id="firstname">{{ $order->address1 }}, {{ $order->address2 }}, {{ $order->area }}</span><br>

                                <label for="lastname"><b>City :</b></label>
                                <span id="lastname">{{ $order->city }}, {{ $order->state }}</span><br>

                                <label for="lastname"><b>Zip Code :</b></label>
                                <span id="lastname">{{ $order->zipcode }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <h2>Billing Information:</h2>

                                <label for="firstname"><b>SubTotal :</b></label>
                                <span id="firstname">${{ $order->subtotal }}</span><br>

                                <label for="firstname"><b>Total Amount :</b></label>
                                <span id="firstname">${{ $order->Total }}</span><br>

                                <label for="lastname"><b>Quantity :</b></label>
                                <span id="lastname">{{ $order->quantity }}</span><br>

                                <label for="lastname"><b>Payment Status :</b></label>
                                <span id="lastname">{{ $order->payment_status }}</span><br>
                            </div>
                        </div>
                        <br>
                        <h2 class="text-center">Order Details</h2>
                        @if($orderItems)
                            <div class="table-responsive m-t-10">
                                <table id="myTable" class="table color-table table-bordered product-table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderItems as $index => $item)
                                        <tr class="get_order_number">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>${{ $item->product_price }}</td>
                                            <td>{{ $item->product_quantity }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <div class="status_select">
                    <form method="POST" action="{{ url('/admin/order/'.$item->order_id) }}">
                        @method('put')
                        @csrf
                        <select class="form-control" id="order_status" name="order_status">
                            @foreach(\app\model\Order::$order_status as $key => $status)
                            <option {{($order->order_status == $key)? 'selected':''}} value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success btn-sm">Confirm <i class="far fa-check-circle"></i></button>
                        <input type="hidden" name="order_number" value="{{ $item->order_id }}">
                    </form>
                    </div>
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
@endpush





