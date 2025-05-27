@extends('layouts.admin.app')
@section('title', 'Services')
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
                        <h5 class="card-title m-b-0 align-self-center">Update Services</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/services/'.$services->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $services->title }}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="slug">Slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $services->slug }}">
                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                         <div class="form-group">
                            <label for="short_description">Short Description:</label>
                            <textarea type="text" class="form-control" id="short_description" name="short_description"  value="{{ 
                            $services->short_description }}">{{$services->short_description }}</textarea>
                            @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="long_description">Long Description:</label>
                            <textarea class="form-control" id="long_description" name="long_description" rows="3">{{ $services->long_description }}</textarea>
                            @error('long_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <img style="max-width: 340px; height: 250px;" id="input-preview" src="{{ isset($services)?asset($services->image_path):asset('services_images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image_path" id="input-file-now" class="dropify" /></br>
                                @error('image_path')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                         <div class="form-group">
                             <label for="occupation">Status:</label>
                              @if($services->status == 0)
                              <select class="form-control" aria-label="Default select example" name="status">
                                <option value="0" selected class="form-control">Inactive</option>
                                <option value="1" class="form-control">Active</option>
                              </select>
                              @elseif($services->status == 1)
                              <select class="form-control" aria-label="Default select example" name="status">
                                <option value="1" selected class="form-control">Active</option>
                                <option value="0" class="form-control">InActive</option>
                              </select>
                               @endif
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

             $(".btn-add-more").click(function(){ 
          var html = $(".clone").html();
          $(".img_div").after(html);
      });
 
      $("body").on("click",".btn-remove",function(){ 
          $(this).parents(".control-group").remove();
      });
  $('#long_description').summernote({
    placeholder: 'Type Services Detail ....',
    tabsize: 2,
    height: 100
  });
  $('#short_description').summernote({
    placeholder: 'Type hear ....',
    tabsize: 2,
    height: 100
  });
  });
    $('#title').on('keyup',function(e) {
    $.get('{{ route('service_slug') }}', 
      { 'title': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });

</script>
<!--  -->
<!-- slug scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- endslug scripts -->
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush
    