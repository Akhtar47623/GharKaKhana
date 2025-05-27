@extends('layouts.admin.app')
@section('title','Testimonial')
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
                        <h5 class="card-title m-b-0 align-self-center">Testimonial   </h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/testimonial-content/'.$testimonial_details->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if($testimonial_details->title != null)
                        <div class="form-group">
                            <label for="heading">Title:</label>
                            <input type="text" class="form-control" id="heading" name="heading" value="{{$testimonial_details->title}}">
                        </div>
                        @endif
                        @if($testimonial_details->image1 != null)
                        <div class="form-group">
                            <label for="text1">image1:</label>
                            <img alt="Website Logo" id="input-preview" src="{{ isset($testimonial_details)?asset($testimonial_details->image1):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image1" id="image1" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($testimonial_details->title1 != null && $testimonial_details->text1 != null)
                        <div class="form-group">
                            <label for="text1">Form Title:</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$testimonial_details->title1}}">
                        </div>
                        <div class="form-group">
                            <label for="text1">Short Description:</label>
                            <input type="text" class="form-control" id="text1" name="text1" value="{{$testimonial_details->text1}}">
                        </div>
                        @endif
                        @if($testimonial_details->title1 != null && $testimonial_details->text1 == null)
                        <div class="form-group">
                            <label for="title1">Title 1:</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$testimonial_details->title1}}">
                        </div>
                        @endif
                        @if($testimonial_details->text1 != null && $testimonial_details->title1 == null)
                        <div class="form-group">
                            <label for="text1">Text:</label>
                            <input type="text" class="form-control" id="text1" name="text1" value="{{$testimonial_details->text1}}">
                        </div>
                        @endif
                        <br>
                        @if($testimonial_details->image2 != null)
                        <div class="form-group">
                            <label for="text1">image2:</label>
                            <img alt="Website Logo" id="input-preview" src="{{ isset($testimonial_details)?asset($testimonial_details->image2):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image2" id="image2" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($testimonial_details->title2 != null && $testimonial_details->text2 != null)
                        <div class="form-group">
                            <label for="text1">Info Title:</label>
                                <input type="text" class="form-control" id="title2" name="title2" value="{{$testimonial_details->title2}}">
                            </div>
                            <div class="form-group">
                            <label for="text1">Short Description:</label>
                                <input type="text" class="form-control" id="text2" name="text2" value="{{$testimonial_details->text2}}">
                            </div>
                        @endif
                        @if($testimonial_details->title2 != null && $testimonial_details->text2 == null)
                        <div class="form-group">
                            <label for="title2">Title 2:</label>
                            <input type="text" class="form-control" id="title2" name="title2" value="{{$testimonial_details->title2}}">
                        </div>
                        @endif
                        @if($testimonial_details->text2 != null && $testimonial_details->title2 == null)
                        <div class="form-group">
                            <label for="text2">Text 2:</label>
                            <input type="text" class="form-control" id="text2" name="text2" value="{{$testimonial_details->text2}}">
                        </div>
                        @endif
                        <br>
                        @if($testimonial_details->image3 != null)
                        <div class="form-group">
                            <label for="image3">image3:</label>
                            <img alt="Website Logo" id="input-preview" src="{{ isset($testimonial_details)?asset($testimonial_details->image3):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image3" id="image3" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($testimonial_details->title3 != null && $testimonial_details->text3 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title3" name="title3" value="{{$testimonial_details->title3}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text3" name="text3" value="{{$testimonial_details->text3}}">
                            </div>
                        </div>
                        @endif
                        @if($testimonial_details->title3 != null && $testimonial_details->text3 == null)
                        <div class="form-group">
                            <label for="title3">Title 3:</label>
                            <input type="text" class="form-control" id="title3" name="title3" value="{{$testimonial_details->title3}}">
                        </div>
                        @endif
                        @if($testimonial_details->text3 != null && $testimonial_details->title3 == null)
                        <div class="form-group">
                            <label for="text3">Title:</label>
                            <input type="text" class="form-control" id="text3" name="text3" value="{{$testimonial_details->text3}}">
                        </div>
                        @endif
                        @if($testimonial_details->image4 != null)
                        <div class="form-group">
                            <label for="image3">image4:</label>
                            <img alt="Website Logo" id="input-preview" src="{{ isset($testimonial_details)?asset($testimonial_details->image4):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image4" id="image4" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($testimonial_details->title4 != null && $testimonial_details->text4 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title4" name="title4" value="{{$testimonial_details->title4}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text4" name="text4" value="{{$testimonial_details->text4}}">
                            </div>
                        </div>
                        @endif
                        @if($testimonial_details->title4 != null && $testimonial_details->text4 == null)
                        <div class="form-group">
                            <label for="title4">Title:</label>
                            <input type="text" class="form-control" id="title4" name="title4" value="{{$testimonial_details->title4}}">
                        </div>
                        @endif
                        @if($testimonial_details->text4 != null && $testimonial_details->title4 == null)
                        <div class="form-group">
                            <label for="text4">Title:</label>
                            <input type="text" class="form-control" id="text4" name="text4" value="{{$testimonial_details->text4}}">
                        </div>
                        @endif
                        @if($testimonial_details->description != null)
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{$testimonial_details->description}}</textarea>
                        </div>
                        @endif
                        @if($testimonial_details->button1 != null)
                        <div class="form-group">
                            <label for="button1">button 1:</label>
                            <input type="text" class="form-control" id="button1" name="button1" value="{{$testimonial_details->button1}}">
                        </div>
                        @endif
                        @if($testimonial_details->button1link != null)
                        <div class="form-group">
                            <label for="button1link">button 1 link:</label>
                            <input type="text" class="form-control" id="button1link" name="button1link" value="{{$testimonial_details->button1link}}">
                        </div>
                        @endif
                        @if($testimonial_details->button2 != null)
                        <div class="form-group">
                            <label for="button2">button 2:</label>
                            <input type="text" class="form-control" id="button2" name="button2" value="{{$testimonial_details->button2}}">
                        </div>
                        @endif
                        @if($testimonial_details->button2link != null)
                        <div class="form-group">
                            <label for="button2link">button 2 link:</label>
                            <input type="text" class="form-control" id="button2link" name="button2link" value="{{$testimonial_details->button2link}}">
                        </div>
                        @endif
                        @if($testimonial_details->button3 != null)
                        <div class="form-group">
                            <label for="button3">button 3:</label>
                            <input type="text" class="form-control" id="button3" name="button3" value="{{$testimonial_details->button3}}">
                        </div>
                        @endif
                        @if($testimonial_details->button3link != null)
                        <div class="form-group">
                            <label for="button3link">button 3 link:</label>
                            <input type="text" class="form-control" id="button3link" name="button3link" value="{{$testimonial_details->button3link}}">
                        </div>
                        @endif
                        @if($testimonial_details->button4 != null)
                        <div class="form-group">
                            <label for="button4">button 4:</label>
                            <input type="text" class="form-control" id="button4" name="button4" value="{{$testimonial_details->button4}}">
                        </div>
                        @endif
                        @if($testimonial_details->button4link != null)
                        <div class="form-group">
                            <label for="button4link">button 4 link:</label>
                            <input type="text" class="form-control" id="button4link" name="button4link" value="{{$testimonial_details->button4link}}">
                        </div>
                        @endif

                        @if($testimonial_details->image_path != null)
                        <div class="form-group">
                            <label for="image3">Main Image:</label>
                            <img alt="Website Logo" id="input-preview" src="{{ isset($testimonial_details)?asset($testimonial_details->image_path):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image_path" id="image_path" class="dropify" />
                            </div>
                        </div>
                        @endif

                        @if($testimonial_details->video_path != null)
                        <div class="form-group">
                            <label for="image3">Video:</label>
                            <video width="320" height="240" controls>
                                <source src="{{ isset($testimonial_details)?asset($testimonial_details->video_path):asset('images/upload.jpg') }}" type="video/mp4">
                                <source src="{{ isset($testimonial_details)?asset($testimonial_details->video_path):asset('images/upload.jpg') }}" type="video/ogg">
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
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>c
<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#description').summernote({
            placeholder: 'Describe here ...',
            tabsize: 2,
            height: 100
        });
    });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush

