@extends('layouts.admin.app')
@section('title', 'Help Us')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-10 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Help Us</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                                <li>
                                    <a href="{{url('admin/help-us/create/')}}" class="btn waves-effect waves-light btn-rounded btn-primary">Add</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if($help_us)
                        <div class="table-responsive m-t-10">
                            <table id="myTable" class="table color-table table-bordered product-table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($help_us as $key => $help)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $help->title }}</td>
                                        @if($help->short_description != null)
                                        <td><?= html_entity_decode($help->short_description) ?></td>
                                        @endif
                                        @if($help->status== '1')
                                        <td><span class="btn btn-outline-success" style="cursor: default;">Active</span></td>
                                        @else
                                        <td><button class="btn btn-outline-danger" style="cursor: default;">InActive</button></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ url('/admin/help-us',$help->id) }}"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('admin/help-us/'.$help->id.'/edit/') }}"><i class="fas fa-edit"></i></a>
                                            <form style="display: inline-block;" method="POST" action="{{ url('/admin/help-us',$help->id) }}">
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
<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>

<script>

    $(function () {

        $('#myTable').DataTable();
    });
</script>
@endpush
