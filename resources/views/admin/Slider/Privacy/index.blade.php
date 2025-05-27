@extends('layouts.admin.app')
@section('title', 'Slider Management')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-10 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Slider Management</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                                <li>
                                    <a href="{{url('panel/admin/privacy-slider/create/')}}" class="btn waves-effect waves-light btn-rounded btn-primary">Add New Slider</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if($privacy_sliders)
                        <div class="table-responsive m-t-10">
                            <table id="myTable" class="table color-table table-bordered product-table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Page Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($privacy_sliders as $key => $slider)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                         <td><img src="{{ asset($slider->image_path) }}" class="img-responsive"></td>
                                        <td>{!! $slider->page_name !!}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/panel/admin/privacy-slider/'.$slider->id.'/edit/') }}"><i class="fas fa-edit"></i></a>
                                        <form style="display: inline-block;" method="POST" action="{{ url('/panel/admin/privacy-slider',$slider->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick='return confirm("Confirm delete?")' style="border: none;outline: none;padding:0;background: #fff;" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
                                        </form>
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
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
</script>
@endpush
