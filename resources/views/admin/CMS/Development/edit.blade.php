@extends('layouts.admin.app')
@section('title','Development_content')
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
                    <form action="{{url('/admin/development-content/'.$development_content->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        @if($development_content->page_name =='Development' && $development_content->page_section =='Info Section' )
                            @if($development_content->title != null)
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$development_content->title}}">
                            </div>
                            @endif
                            @if($development_content->description != null)
                            <div class="form-group">
                                <label for="description">Short Description:</label>
                                <textarea type="text" class="form-control" id="description" name="description" value="">{{$development_content->description}}</textarea>
                            </div>
                            @endif
                           
                        @endif
                         @if($development_content->page_name =='Development' && $development_content->page_section =='Children Section' )
                            @if($development_content->title != null)
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$development_content->title}}">
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="description">Tags:</label>
                                <!-- <select  type="text" class="js-example-tokenizer form-control" multiple="multiple" name="description[]" value=" {{(is_array(old('description[]'))) }}">
                                </select> -->
                                <select class="dynamic-option-create-multiple form-control" style="width: 100%;"  multiple="multiple" name="development[]" value="" placeholder="Tags">
                                     @foreach($development as $tags)
                                        <option selected>{{$tags->description}}</option>
                                    @endforeach
                                </select>
                                @error('description')
                                <p class="error-message">**{{ $message }}</p>
                                @enderror
                            </div>
                             @if($development_content->image1 != null)
                            <div class="form-group">
                                <label for="image">Icon:</label>
                                <img alt="Background Image" id="input-preview" style="height: 100px;width: 100px;" src="{{ isset($development_content)?asset($development_content->image1):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image1" id="image1" class="dropify" />
                                </div>
                            </div>
                            @endif
                        @endif
                         @if($development_content->page_name =='Development' && $development_content->page_section =='Women Section' )
                            @if($development_content->title != null)
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$development_content->title}}">
                            </div>
                            @endif
                            
                            <div class="form-group">
                                <label for="description">Tags:</label>
                                <select class="dynamic-option-create-multiple form-control" style="width: 100%;"  multiple="multiple" name="development[]" value=""  placeholder="Tags">
                                @foreach($development as $tags)
                                    <option selected>{{$tags->description}}</option>
                                @endforeach
                                </select>
                            </div>
                             @if($development_content->image1 != null)
                            <div class="form-group">
                                <label for="image">Icon:</label>
                                <img alt="Background Image" id="input-preview" style="height: 100px;width: 100px;" src="{{ isset($development_content)?asset($development_content->image1):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image1" id="image1" class="dropify" />
                                </div>
                            </div>
                            @endif
                        @endif
                         @if($development_content->page_name =='Development' && $development_content->page_section =='Youth Section' )
                            @if($development_content->title != null)
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$development_content->title}}">
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="description">Tags:</label>
                                <select class="dynamic-option-create-multiple form-control" style="width: 100%;"  multiple="multiple" name="development[]" value=""  placeholder="Tags">
                                     @foreach($development as $tags)
                                        <option selected>{{$tags->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                             @if($development_content->image1 != null)
                            <div class="form-group">
                                <label for="image">Icon:</label>
                                <img alt="Background Image" id="input-preview" style="height: 100px;width: 100px;" src="{{ isset($development_content)?asset($development_content->image1):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image1" id="image1" class="dropify" />
                                </div>
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
            placeholder: 'Type News Details',
            tabsize: 2,
            height: 100
        });
        $("select.dynamic-option-create-multiple").select2({
    tags: true,
    multiple: true,
  })
    });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush

