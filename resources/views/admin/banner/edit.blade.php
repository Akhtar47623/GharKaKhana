@extends('layouts.admin.app')
@section('title', 'Banner')
@push('before-css')
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush
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

                            @if($banner_detail->heading != null)
                            <div class="form-group">
                                <label for="heading">Title :</label>
                                <input type="text" class="form-control" id="heading" name="heading" value="{{$banner_detail->heading}}">
                            </div>
                            @endif
                            @if($banner_detail->sub_title != null)
                            <div class="form-group">
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$banner_detail->sub_title}}">
                            </div>
                            @endif
                            @if($banner_detail->description != null)
                            <div class="form-group">
                                <label for="sub_text">Description :</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{$banner_detail->description}}</textarea>
                            </div>
                            @endif
                            @if($banner_detail->button_name != null)
                            <div class="form-group">
                                <label for="sub_text">Button Name :</label>
                                <input type="text" class="form-control" id="button_name" name="button_name" value="{{$banner_detail->button_name}}">
                            </div>
                            @endif
                            @if($banner_detail->button_link != null)
                            <div class="form-group">
                                <label for="sub_text">Button Link :</label>
                                <input type="text" class="form-control" id="button_link" name="button_link" value="{{$banner_detail->button_link}}">
                            </div>
                            @endif
                            <div class="form-group">
                                <label>Image :</label>
                                <img alt="Site Banner" style="max-width: 340px;" id="input-preview" src="{{ isset($banner_detail)?asset($banner_detail->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="banner_image" id="input-file-now" class="dropify" />
                                    @error('banner_image')
                                    <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror
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
@push('js')
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#description').summernote({
            tabsize: 2,
            height: 100
        });
    });
</script>
@endpush
