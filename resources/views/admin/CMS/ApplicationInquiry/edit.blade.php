@extends('layouts.admin.app')
@section('title','Application')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
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
                        <h5 class="card-title m-b-0 align-self-center">CMS Content</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/application-content/'.$app_content->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if($app_content->title != null)
                        <div class="form-group">
                            <label for="heading">Title:</label>
                            <input type="text" class="form-control" id="heading" name="heading" value="{{$app_content->title}}">
                        </div>
                        @endif
                        @if($app_content->image1 != null)
                        <div class="form-group">
                            <label for="text1">image1:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($app_content)?asset($app_content->image1):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image1" id="image1" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($app_content->title1 != null && $app_content->text1 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title1" name="title1" value="{{$app_content->title1}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text1" name="text1" value="{{$app_content->text1}}">
                            </div>
                        </div>
                        @endif
                        @if($app_content->title1 != null && $app_content->text1 == null)
                        <div class="form-group">
                            <label for="title1">Title 1:</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$app_content->title1}}">
                        </div>
                        @endif
                        @if($app_content->text1 != null && $app_content->title1 == null)
                        <div class="form-group">
                            <label for="text1">Text:</label>
                            <input type="text" class="form-control" id="text1" name="text1" value="{{$app_content->text1}}">
                        </div>
                        @endif
                        <br>
                        @if($app_content->image2 != null)
                        <div class="form-group">
                            <label for="text1">image2:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($app_content)?asset($app_content->image2):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image2" id="image2" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($app_content->title2 != null && $app_content->text2 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title2" name="title2" value="{{$app_content->title2}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text2" name="text2" value="{{$app_content->text2}}">
                            </div>
                        </div>
                        @endif
                        @if($app_content->title2 != null && $app_content->text2 == null)
                        <div class="form-group">
                            <label for="title2">Title 2:</label>
                            <input type="text" class="form-control" id="title2" name="title2" value="{{$app_content->title2}}">
                        </div>
                        @endif
                        @if($app_content->text2 != null && $app_content->title2 == null)
                        <div class="form-group">
                            <label for="text2">Text 2:</label>
                            <input type="text" class="form-control" id="text2" name="text2" value="{{$app_content->text2}}">
                        </div>
                        @endif
                        <br>
                        @if($app_content->image3 != null)
                        <div class="form-group">
                            <label for="image3">image3:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($app_content)?asset($app_content->image3):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image3" id="image3" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($app_content->title3 != null && $app_content->text3 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title3" name="title3" value="{{$app_content->title3}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text3" name="text3" value="{{$app_content->text3}}">
                            </div>
                        </div>
                        @endif
                        @if($app_content->title3 != null && $app_content->text3 == null)
                        <div class="form-group">
                            <label for="title3">Title 3:</label>
                            <input type="text" class="form-control" id="title3" name="title3" value="{{$app_content->title3}}">
                        </div>
                        @endif
                        @if($app_content->text3 != null && $app_content->title3 == null)
                        <div class="form-group">
                            <label for="text3">Title:</label>
                            <input type="text" class="form-control" id="text3" name="text3" value="{{$app_content->text3}}">
                        </div>
                        @endif
                        @if($app_content->image4 != null)
                        <div class="form-group">
                            <label for="image3">image4:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($app_content)?asset($app_content->image4):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image4" id="image4" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($app_content->title4 != null && $app_content->text4 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title4" name="title4" value="{{$app_content->title4}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text4" name="text4" value="{{$app_content->text4}}">
                            </div>
                        </div>
                        @endif
                        @if($app_content->title4 != null && $app_content->text4 == null)
                        <div class="form-group">
                            <label for="title4">Title:</label>
                            <input type="text" class="form-control" id="title4" name="title4" value="{{$app_content->title4}}">
                        </div>
                        @endif
                        @if($app_content->text4 != null && $app_content->title4 == null)
                        <div class="form-group">
                            <label for="text4">Title:</label>
                            <input type="text" class="form-control" id="text4" name="text4" value="{{$app_content->text4}}">
                        </div>
                        @endif
                        @if($app_content->description != null)
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{$app_content->description}}</textarea>
                        </div>
                        @endif
                        @if($app_content->button1 != null)
                        <div class="form-group">
                            <label for="button1">button 1:</label>
                            <input type="text" class="form-control" id="button1" name="button1" value="{{$app_content->button1}}">
                        </div>
                        @endif
                        @if($app_content->button1link != null)
                        <div class="form-group">
                            <label for="button1link">button 1 link:</label>
                            <input type="text" class="form-control" id="button1link" name="button1link" value="{{$app_content->button1link}}">
                        </div>
                        @endif
                        @if($app_content->button2 != null)
                        <div class="form-group">
                            <label for="button2">button 2:</label>
                            <input type="text" class="form-control" id="button2" name="button2" value="{{$app_content->button2}}">
                        </div>
                        @endif
                        @if($app_content->button2link != null)
                        <div class="form-group">
                            <label for="button2link">button 2 link:</label>
                            <input type="text" class="form-control" id="button2link" name="button2link" value="{{$app_content->button2link}}">
                        </div>
                        @endif
                        @if($app_content->button3 != null)
                        <div class="form-group">
                            <label for="button3">button 3:</label>
                            <input type="text" class="form-control" id="button3" name="button3" value="{{$app_content->button3}}">
                        </div>
                        @endif
                        @if($app_content->button3link != null)
                        <div class="form-group">
                            <label for="button3link">button 3 link:</label>
                            <input type="text" class="form-control" id="button3link" name="button3link" value="{{$app_content->button3link}}">
                        </div>
                        @endif
                        @if($app_content->button4 != null)
                        <div class="form-group">
                            <label for="button4">button 4:</label>
                            <input type="text" class="form-control" id="button4" name="button4" value="{{$app_content->button4}}">
                        </div>
                        @endif
                        @if($app_content->button4link != null)
                        <div class="form-group">
                            <label for="button4link">button 4 link:</label>
                            <input type="text" class="form-control" id="button4link" name="button4link" value="{{$app_content->button4link}}">
                        </div>
                        @endif

                        @if($app_content->image_path != null)
                        <div class="form-group">
                            <label for="image3">Image:</label>
                            <img alt="" style="max-width: 340px;" id="input-preview" src="{{ isset($app_content)?asset($app_content->image_path):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image_path" id="image_path" class="dropify" />
                            </div>
                        </div>
                        @endif

                        @if($app_content->video_path != null)
                        <div class="form-group">
                            <label for="image3">Video:</label>
                            <video width="320" height="240" controls>
                                <source src="{{ isset($app_content)?asset($app_content->video_path):asset('images/upload.jpg') }}" type="video/mp4">
                                <source src="{{ isset($app_content)?asset($app_content->video_path):asset('images/upload.jpg') }}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                            <div class="upload-video">
                                <input type="file" name="video_path" id="video_path" class="dropify" />
                            </div>
                        </div>
                        @endif

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
        $('#description').summernote({
            placeholder: 'Type News Details',
            tabsize: 2,
            height: 100
        });
    });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush

