@extends('layouts.admin.app')



@push('before-css')

    <!-- This page CSS -->

    <!-- chartist CSS -->

    <link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">

    <!--c3 CSS -->

    <link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">

    <!--Toaster Popup message CSS -->

    <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

    <!-- Vector CSS -->

    <link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>



    <!-- Date picker plugins css -->

    <link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"

          type="text/css"/>



    <!-- page css -->

    <link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">

@endpush



@section('content')

    <!-- ============================================================== -->

    <!-- Container fluid  -->

    <!-- ============================================================== -->

    <div class="container-fluid">

        <!-- ============================================================== -->

        <!-- Info box -->

        <!-- ============================================================== -->

        <div class="row">

            <!-- Column -->

            <div class="col-lg-12 col-md-12">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex m-b-10 no-block">

                            <h5 class="card-title m-b-0 align-self-center">Section Info</h5>

                            <div class="ml-auto text-light-blue">

                                <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12"

                                    role="tablist">

                                    <!--

                                    <li>

                                        <a href="{{url('ecommerce-add-new')}}"

                                           class="btn waves-effect waves-light btn-rounded btn-primary">Add Product</a>

                                    </li>

                                    -->

                                </ul>

                            </div>

                        </div>

                        @if($HomeInfo)

                        <div class="table-responsive m-t-10">

                            <a class="btn btn-success" href="{{url('admin/home_info/add/')}}" role="button">Add More</a>

                            <table id="myTable" class="table color-table table-bordered product-table table-hover">

                                <thead>

                                <tr>



                                   <th>#</th>

                                   <th>Image</th>

                                   <th>Title</th>

                                   <th>Action</th>

                                </tr>

                                </thead>

                                <tbody>

                                @foreach($HomeInfo as $HomeInfo_)

                                    <tr>

                                        <td>{{ $HomeInfo_->id }}</td>

                                        <td><img src="{{ asset($HomeInfo_->image) }}" class="img-responsive"></td>

                                        <td>{!! $HomeInfo_->title !!}</td>

                                        <td class="text-center">

                                            <a href="{{ url('/admin/home_info/view',$HomeInfo_->id) }}"><i class="fas fa-eye"></i></a>

                                            <a href="{{ url('/admin/home_info/edit/'.$HomeInfo_->id) }}"><i class="fas fa-edit"></i></a>

                                            <a href="{{ url('/admin/home_info/delete',$HomeInfo_->id) }}" onclick='return confirm("Confirm delete?")'><i class="fas fa-trash-alt text-danger"></i></a>





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

            <!-- Column -->

        </div>

        <!-- ============================================================== -->

        <!-- End Info box -->

        <!-- chart box two -->

        <!-- ============================================================== -->

          @include('layouts.admin.includes.templates.footer')

    </div>

@endsection



@push('js')<!-- ============================================================== -->

<!-- This page plugins -->

<!-- ============================================================== -->

<!--c3 JavaScript -->

<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>

<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>

<!--jquery knob -->

<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>

<!--Sparkline JavaScript -->

<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>

<!--Morris JavaScript -->

<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>

<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>

<!-- Popup message jquery -->

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



<!-- ============================================================== -->

<!-- Style switcher -->

<!-- ============================================================== -->

<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>

@endpush
