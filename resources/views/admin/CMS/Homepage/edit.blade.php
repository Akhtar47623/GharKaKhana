@extends('layouts.admin.app')
@section('title','CMS Content')
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
                    <form action="{{url('/admin/homepage-content/'.$homepage_content->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                              <!-- info section -->
                        @if($homepage_content->page_name == 'Home Page' && $homepage_content->page_section == 'Charity Section')
                         <div class="form-group">
                            <label for="title1">Title1:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$homepage_content->title}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="desc" name="description" value="{{$homepage_content->description}}">
                        </div>
                        @if($homepage_content->image_path != null)
                            <div class="form-group">
                                <label for="Icon">Icon:</label>
                                <img alt="Icon" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="image_path" class="dropify" />
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title2">Title2:</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$homepage_content->title1}}">
                        </div>
                        <div class="form-group">
                            <label for="descriptions">Short Description:</label>
                            <input type="text" class="form-control" id="desc" name="text1" value="{{$homepage_content->text1}}">
                        </div>
                        @if($homepage_content->image1 != null)
                            <div class="form-group">
                                <label for="Icon">Icon:</label>
                                <img alt="Icon" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image1):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image1" id="image1" class="dropify" />
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title2">Title3:</label>
                            <input type="text" class="form-control" id="title2" name="title2" value="{{$homepage_content->title2}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="desc" name="text2" value="{{$homepage_content->text2}}">
                        </div>
                         @if($homepage_content->image2 != null)
                            <div class="form-group">
                                <label for="Icon">Icon:</label>
                                <img alt="Icon" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image2):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image2" id="image2" class="dropify" />
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title4">Title4:</label>
                            <input type="text" class="form-control" id="title3" name="title3" value="{{$homepage_content->title3}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="desc" name="text3" value="{{$homepage_content->text3}}">
                        </div>
                         @if($homepage_content->image3 != null)
                            <div class="form-group">
                                <label for="Icon">Icon:</label>
                                <img alt="Icon" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image3):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image3" id="image3" class="dropify" />
                                </div>
                            </div>
                        @endif

                        @endif
                        @if($homepage_content->page_name == 'Home Page' && $homepage_content->page_section == 'Services Section')
                            <div class="form-group">
                                <label for="title1">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$homepage_content->title}}">
                            </div>
                            @if($homepage_content->image_path != null)
                            <div class="form-group">
                                <label for="Image">Background Image:</label>
                                <img alt="Image" style="height: 280px;width: 300px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="image_path" class="dropify" />
                                </div>
                            </div>
                             @endif
                        @endif
                        @if($homepage_content->page_name == 'Home Page' && $homepage_content->page_section == 'Help Us Section')
                         <div class="form-group">
                                <label for="title1">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$homepage_content->title}}">
                            </div>
                        @endif
                          @if($homepage_content->page_name == 'Home Page' && $homepage_content->page_section == 'About Us Section')
                            <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$homepage_content->title}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <textarea type="text" class="form-control" id="description" name="description" value="">{{$homepage_content->description}}</textarea>
                        </div>
                        @if($homepage_content->image_path != null)
                            <div class="form-group">
                                <label for="Image">Image:</label>
                                <img alt="Image" style="height: 280px;width: 300px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="image_path" class="dropify" />
                                </div>
                            </div>
                        @endif
                        <h3>INFORMATION</h3>
                        <br>
                        @if($homepage_content->image1 != null)
                            <div class="form-group">
                                <label for="Icon">Icon:</label>
                                <img alt="Icon" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image1):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image1" id="image1" class="dropify" />
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$homepage_content->title1}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="desc" name="text1" value="{{$homepage_content->text1}}">
                        </div>
                         @if($homepage_content->image2 != null)
                            <div class="form-group">
                                <label for="Icon">Icon:</label>
                                <img alt="Icon" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image2):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image2" id="image2" class="dropify" />
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title2" name="title2" value="{{$homepage_content->title2}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="desc" name="text2" value="{{$homepage_content->text2}}">
                        </div>
                         @if($homepage_content->image3 != null)
                            <div class="form-group">
                                <label for="Icon">Icon:</label>
                                <img alt="Icon" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($homepage_content)?asset($homepage_content->image3):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image3" id="image3" class="dropify" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title3" name="title3" value="{{$homepage_content->title3}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Short Description:</label>
                                <input type="text" class="form-control" id="desc" name="text3" value="{{$homepage_content->text3}}">
                            </div>
                        @endif

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
            placeholder: 'Type Description',
            tabsize: 2,
            height: 100
        });
    });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush

