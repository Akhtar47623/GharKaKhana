@extends('layouts.admin.app')
@section('title','Contact Us')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Contact Us</h3>
                    <a href="{{url('admin/contact-us')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Contact Title:</th>
                                    <td>{{ $about_details->title }}</td>
                                </tr>
                                <tr>
                                    <th>Short Description:</th>
                                    <td>{{ $about_details->description }}</td>
                                </tr>
                                <tr>
                                    <th>Daily Schedule:</th>
                                    <td>{{ $about_details->text1 }}</td>
                                </tr>
                                <tr>
                                    <th>Hourly Schedule:</th>
                                    <td>{{ $about_details->text2}}</td>
                                </tr>
                                <tr>
                                    <th>Holy Days:</th>
                                    <td>{{ $about_details->text3}}</td>
                                </tr>
                               @if($about_details->image_path != null)
                                <tr>
                                    <th>Image:</th>
                                    <td><img style="width: 200px;height: 150px;" src="{{ asset($about_details->image_path) }}"></td>
                                </tr>
                                @endif
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

