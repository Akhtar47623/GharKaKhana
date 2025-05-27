@extends('layouts.admin.app')
@section('title','counter_content')
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
                        <h5 class="card-title m-b-0 align-self-center">counter_content</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/counter-content/'.$counter_content->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if($counter_content->title != null)
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$counter_content->title}}">
                        </div>
                        @endif
                        @if($counter_content->description != null)
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="desc" name="description" value="{{$counter_content->description}}">
                        </div>
                        @endif
                         @if($counter_content->image_path != null)
                            <div class="form-group">
                                <label for=" Image">Image:</label>
                                <img alt=" Image" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($counter_content)?asset($counter_content->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="image_path" class="dropify" />
                                </div>
                            </div>
                        @endif
                          @if($counter_content->title1 != null)
                        <div class="form-group">
                            <label for="likes">Likes:</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$counter_content->title1}}">
                        </div>
                        @endif
                        @if($counter_content->text1 != null)
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="text1" name="text1" value="{{$counter_content->text1}}">
                        </div>
                        @endif
                        @if($counter_content->image1 != null)
                            <div class="form-group">
                                <label for=" Image">Image:</label>
                                <img alt="Image" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($counter_content)?asset($counter_content->image1):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image1" id="image1" class="dropify" />
                                </div>
                            </div>
                        @endif
                        @if($counter_content->title2 != null)
                        <div class="form-group">
                            <label for="favorite">Favorite:</label>
                            <input type="text" class="form-control" id="title2" name="title2" value="{{$counter_content->title2}}">
                        </div>
                        @endif
                        @if($counter_content->text2 != null)
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="text2" name="text2" value="{{$counter_content->text2}}">
                        </div>
                        @endif
                         @if($counter_content->image2 != null)
                            <div class="form-group">
                                <label for=" Image">Image:</label>
                                <img alt="Image" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($counter_content)?asset($counter_content->image2):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image2" id="image2" class="dropify" />
                                </div>
                            </div>
                        @endif
                        @if($counter_content->title3 != null)
                        <div class="form-group">
                            <label for="users">Users:</label>
                            <input type="text" class="form-control" id="title3" name="title3" value="{{$counter_content->title3}}">
                        </div>
                        @endif
                        @if($counter_content->text3 != null)
                        <div class="form-group">
                            <label for="description">Short Description:</label>
                            <input type="text" class="form-control" id="text3" name="text3" value="{{$counter_content->title}}">
                        </div>
                        @endif
                        @if($counter_content->image3 != null)
                            <div class="form-group">
                                <label for="Image">Image:</label>
                                <img alt="Image" style="height: 100px;width:100px;" id="input-preview" src="{{ isset($counter_content)?asset($counter_content->image3):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image3" id="image3" class="dropify" />
                                </div>
                            </div>
                        @endif

                         @if($counter_content->image4 != null)
                            <div class="form-group">
                                <label for="Image">Background Image:</label>
                                <img alt="Background Image" style="height: 250px;width: 300px;" id="input-preview" src="{{ isset($counter_content)?asset($counter_content->image4):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image4" id="image4" class="dropify" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>  

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
<script type="text/javascript">
     
         new Cleave('#phone1', {
            numericOnly:true,
            // prefix:'+',
            delimiter:'-',
            blocks:[3,3,4]
        });
        new Cleave('#phone2', {
            numericOnly:true,
            // prefix:'+',
            delimiter:'-',
            blocks:[3,3,4]
        });
      </script>
@endpush