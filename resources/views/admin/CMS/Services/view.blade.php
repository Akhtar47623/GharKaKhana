@extends('layouts.admin.app')
@section('title','Services')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Services</h3>
                    <a href="{{url('admin/services-content')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Title:</th>
                                    <td>{{ $services->title }}</td>
                                </tr>
                                <tr>
                                    @if($services->title1 !=null)
                                    <th>Title2:</th>
                                    <td>{{ $services->title1 }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Image:</th>
                                    <td><img width="340px" height="320px" src="{{ asset($services->image_path) }}"></td>
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

