@extends('layouts.admin.app')
@section('title', 'Edit Banner Information')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Update Banner Info</h5>
                        </div>
                        <form action="{{url('/admin/banner/'.$banner_detail->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="banner_heading">Title:</label>
                                <input type="text" class="form-control" id="banner_heading" name="banner_heading" value="{{$banner_detail->banner_heading}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$banner_detail->banner_sub_title}}">
                            </div>
                            <div class="form-group">
                                <label for="sub_text">Text:</label>
                                <input type="text" class="form-control" id="sub_text" name="sub_text" value="{{$banner_detail->banner_text}}">
                            </div>
                            <div class="form-group">
                                <label for="sub_text">Button Name:</label>
                                <input type="text" class="form-control" id="button_name" name="button_name" value="{{$banner_detail->button_name}}">
                            </div>
                            <div class="form-group">
                                <label for="sub_text">Button Link:</label>
                                <input type="text" class="form-control" id="button_link" name="button_link" value="{{$banner_detail->button_link}}">
                            </div>
                            <div class="form-group">
                                <img alt="Website Logo" style="max-width: 340px;" id="input-preview" src="{{ isset($banner_detail)?asset($banner_detail->banner_image):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="banner_image" id="input-file-now" class="dropify" />
                                </div>
                            </div>
                            <button class="btn btn-success pull-center" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin.includes.templates.footer')
    </div>
@endsection
