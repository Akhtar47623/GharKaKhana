@extends('layouts.admin.app')

@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-10 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Add Section</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12"
                                role="tablist">
                            </ul>
                        </div>
                    </div>

                    <form action="{{url('/admin/home_section/store/')}}" method="POST" enctype="multipart/form-data">
                        @csrf
  <div class="form-group">
    <label for="section_title">Title:</label>
    <input type="text" class="form-control" id="section_title" name="section_title" required>
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" id="description" name="description" required></textarea>
  </div>
  <div class="form-group">
    <label for="button_name_1">Button Name:</label>
    <input type="text" class="form-control" id="button_name_1" name="button_name_1" required>
  </div>
  <div class="form-group">
    <label for="button_link_1">Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_1" name="button_link_1" required>
  </div>
  <div class="form-group">
    <label for="button_name_2">Another Button Name:</label>
    <input type="text" class="form-control" id="button_name_2" name="button_name_2" required>
  </div>
  <div class="form-group">
    <label for="button_link_2">Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_2" name="button_link_2" required>
  </div>
  <div class="form-group">
    <label for="button_name_3">Another Button Name:</label>
    <input type="text" class="form-control" id="button_name_3" name="button_name_3" required>
  </div>
  <div class="form-group">
    <label for="button_link_3">Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_3" name="button_link_3" required>
  </div>
  <div class="form-group">
    <label for="button_name_4">Another Button Name:</label>
    <input type="text" class="form-control" id="button_name_4" name="button_name_4" required>
  </div>
  <div class="form-group">
    <label for="button_link_4">Link Of The Above Button:</label>
    <input type="text" class="form-control" id="button_link_4" name="button_link_4" required>
  </div>
  <div class="form-group">
    <label for="image_path">Add Image(icon):</label>
    <input type="file" class="form-control" id="image_path" name="image_path" >
  </div>
  <button class="btn btn-success pull-center" type="submit">Add</button>
</form>

                </div>
            </div>
        </div>
    </div>

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
    placeholder: 'Edit Healer Details',
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
