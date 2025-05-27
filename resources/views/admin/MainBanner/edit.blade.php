@extends('layouts.admin.app')
@section('title', 'Main Banner')
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
                        <form action="{{url('/admin/main-banner/'.$banner->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            @if($banner->title != null)
                            <div class="form-group">
                                <label for="title">Title :</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$banner->title}}">
                            </div>
                            @endif
                            @if($banner->sub_title != null)
                            <div class="form-group">
                                <label for="sub_title">Sub Title :</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$banner->sub_title}}">
                            </div>
                            @endif
                            @if($banner->banner_description != null)
                            <div class="form-group">
                                <label for="sub_text">Banner Description :</label>
                                <textarea class="form-control" id="banner_description" name="banner_description" rows="2">{{$banner-> banner_description}}</textarea>
                            </div>
                            @endif
                            @if($banner->button_name != null)
                            <div class="form-group">
                                <label for="sub_text">Button Name :</label>
                                <input type="text" class="form-control" id="button_name" name="button_name" value="{{$banner->button_name}}">
                            </div>
                            @endif
                            @if($banner->button_link != null)
                            <div class="form-group">
                                <label for="sub_text">Button Link :</label>
                                <input type="text" class="form-control" id="button_link" name="button_link" value="{{$banner->button_link}}">
                            </div>
                            @endif
                            <div class="form-group">
                                <label>Image :</label>
                                <img alt="Main Banner" style="width:340px;" id="input-preview" src="{{ isset($banner)?asset($banner->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image" id="image" class="dropify" />
                                    @error('image')
                                    <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                             <!--  <div class="form-group">
                                 <label for="occupation">Status:</label>
                                  @if($banner->status == 0)
                                  <select class="form-select form-control" aria-label="Default select example" name="status" >
                                    <option value="0" selected class="form-control">Inactive</option>
                                    <option value="1" class="form-control">Active</option>
                                  </select>
                                  @elseif($banner->status == 1)
                                  <select class="form-control" aria-label="Default select example" name="status">
                                    <option value="1" selected class="form-control">Active</option>
                                    <option value="0" class="form-control">InActive</option>
                                  </select>
                                   @endif
                                </div> -->
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
