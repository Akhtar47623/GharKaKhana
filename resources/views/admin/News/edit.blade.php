@extends('layouts.admin.app')
@section('title','Newsletter')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"type="text/css"/>
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
                        <h5 class="card-title m-b-0 align-self-center">Update Newsletter</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/news/'.$news->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="news_title">News Issue:</label>
                            <input type="text" class="form-control" id="news_title" name="news_title" value="{{$news->title}}">
                        </div>
                        <div class="form-group">
                            <label for="news_description">News Description:</label>
                            <textarea class="form-control" id="news_description" name="news_description" rows="3">{{$news->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
                        </div>
                        <div class="form-group">
                            <label for="service">Service:</label>
                            <select id="service" name="service" class="form-control" aria-label="Default select example">
                                @foreach($services as $service)
                                <option value="{{$service->id}}" {{ ($service->id == $news->service_id) ? 'selected' : '' }}>{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="news_image">Update Image:</label>
                            <img style="max-width: 340px;" id="input-preview" src="{{ isset($news)?asset($news->news_image):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="news_image" id="input-file-now" class="dropify" />
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
<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>
<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#news_description').summernote({
            placeholder: 'Type News Details',
            tabsize: 2,
            height: 100
        });
    });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush
