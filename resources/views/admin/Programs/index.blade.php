@extends('layouts.admin.app')
@section('title', 'Services')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-10 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Services</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                                <li>
                                    <a href="{{url('admin/services/create/')}}" class="btn waves-effect waves-light btn-rounded btn-primary">Add Services</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if($services)
                        <div class="table-responsive m-t-10">
                            <table id="myTable" class="table color-table table-bordered product-table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $key => $service)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $service->title }}</td>
                                        @if($service->home_shortDescription != null)
                                        <td><?= html_entity_decode($service->home_shortDescription) ?></td>
                                        @else
                                        <td><?= html_entity_decode($service->short_description) ?></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ url('/admin/services',$service->slug) }}"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('admin/services/'.$service->slug.'/edit/') }}"><i class="fas fa-edit"></i></a>
                                            <form style="display: inline-block;" method="POST" action="{{ url('/admin/services',$service->slug) }}">
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
