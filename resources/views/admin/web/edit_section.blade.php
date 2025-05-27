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
    <!-- SUMMERNOTES LINKS -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
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
                            <h5 class="card-title m-b-0 align-self-center">Update Section Detail</h5>
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
                            <form action="{{url('/admin/home_section/update/'.$HomeSection->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
  <div class="form-group">
    <label for="section_title">Update Title:</label>
    <input type="text" class="form-control" id="section_title" name="section_title" value="{{$HomeSection->heading}}">
  </div>
  <div class="form-group">
    <label for="description">Update Description:</label>
    <textarea class="form-control" id="description" name="description" >{{$HomeSection->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="button_name_1">Update Button Name:</label>
    <input type="text" class="form-control" id="button_name_1" name="button_name_1" value="{{$HomeSection->button1}}">
  </div>
  <div class="form-group">
    <label for="button_link_1">Update Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_1" name="button_link_1"  value="{{$HomeSection->button1link}}">
  </div>
  <div class="form-group">
    <label for="button_name_2">Update Another Button Name:</label>
    <input type="text" class="form-control" id="button_name_2" name="button_name_2"  value="{{$HomeSection->button2}}">
  </div>
  <div class="form-group">
    <label for="button_link_2">Update Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_2" name="button_link_2"  value="{{$HomeSection->button2link}}">
  </div>
  <div class="form-group">
    <label for="button_name_3">Update Another Button Name:</label>
    <input type="text" class="form-control" id="button_name_3" name="button_name_3"  value="{{$HomeSection->button3}}">
  </div>
  <div class="form-group">
    <label for="button_link_3">Update Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_3" name="button_link_3"  value="{{$HomeSection->button3link}}">
  </div>
  <div class="form-group">
    <label for="button_name_4">Update Another Button Name:</label>
    <input type="text" class="form-control" id="button_name_4" name="button_name_4"  value="{{$HomeSection->button4}}">
  </div>
  <div class="form-group">
    <label for="button_link_4">Update Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_4" name="button_link_4"  value="{{$HomeSection->button4link}}">
  </div>
  <div class="form-group">
    <img alt="Website Logo" style="max-width: 340px;" id="input-preview" src="{{ isset($HomeSection)?asset($HomeSection->image_path):asset('images/upload.jpg') }}">
            <div class="upload-photo">
              <input type="file" name="image_path" id="image_path" class="dropify" />
            </div>
    <!-- <input type="file" class="form-control" id="banner_image" name="banner_image" > -->
  </div>
  <button class="btn btn-success pull-center" type="submit">Update</button>
</form>

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
<script>
    $(document).ready(function(){
  $('#description').summernote({
    placeholder: 'Type News Details',
    tabsize: 2,
    height: 100
  });
  });

</script>

<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<!-- SUMMER NOTE SCRIPT -->
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush
