@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Banner Detail # {{$banner_detail->id}}</h3>
                        <a class="btn btn-success pull-right" href="{{ url('/admin/banner') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $banner_detail->id }}</td>
                            </tr>
                            <tr><th> Banner Title </th>
                            <td> {!! $banner_detail->banner_heading !!} </td>
                            </tr>
                            </tr>
                            <tr><th> Banner Image </th>
                            <td><img src="{{ asset($banner_detail->banner_image) }}" class="img-responsive"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.includes.templates.footer')
</div>
@endsection