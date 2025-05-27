@extends('layouts.admin.app')
@section('title', 'Help Us')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">

<!-- multiple images preview -->
 <meta charset="UTF-8">
    <meta http-equiv="content-language" content="en"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description"
          content="Image-Uploader is a simple jQuery Drag & Drop Image Uploader plugin made to be used in forms, withot AJAX."/>
    <meta name="keywords" content="image, upload, uploader, image-uploader, jquery, gallery, file, form, static"/>
    <meta name="author" content="Christian Bayer"/>
    <meta name="copyright" content="© 2019 - Christian Bayer"/>
    <meta property="og:url" content="https://christianbayer.github.io/image-uploader/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Image-Uploader"/>
    <meta property="og:description" content="Image-Uploader is a simple jQuery Drag & Drop Image Uploader plugin made to be used in forms, withot AJAX."/>
    <meta property="og:image" content="https://github.githubassets.com/images/modules/logos_page/GitHub-Logo.png"/>


<!-- multiple images preview -->
<style type="text/css">



</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-10 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Add</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    

                    <form action="{{url('/admin/help-us')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title"  placeholder="Title"  value="{{old('title')}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="slug">Slug:</label>
                          <input type="text" class="form-control" id="slug" value="{{ old('slug') }}" name="slug" placeholder="slug">
                          @error('slug')
                          <p class="error-message">**{{ $message }}</p>
                          @enderror
                        </div>
                       <div class="form-group">
                            <label for="short_description">Short Description </label>
                            <input type="text" class="form-control" id="desc" name="short_description"  placeholder="Short Description" value="{{old('short_description')}}">
                            @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="terget">Amount Target:</label>
                            <input type="text" class="form-control" id="target" name="target"  placeholder="$500,000"  value="{{old('target')}}">
                            @error('target')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Image">Image:</label>
                            <input type="file" class="form-control" name="image_path" value="{{old('image_path')}}">
                            <br>
                            <br>
                             <div id="frames"></div>
                            @error('image_path')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       
                       
                         <button class="btn btn-success pull-center" type="submit">Add</button>
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
<!-- slug scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- endslug scripts -->
<script>
    $(document).ready(function(){
        $('#long_description').summernote({
            placeholder: 'Type Service Details....',
            tabsize: 2,
            height: 100
        });
          $('#short_description').summernote({
            placeholder: 'Type hear ....',
            tabsize: 2,
            height: 100
        });
          
    });

</script>


<script type="text/javascript">
    //Script To Generate slug
  $('#title').change(function(e) {
    $.get('{{ route('help_slug') }}', 
      { 'title': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>

<!-- slug scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- endslug scripts -->
<script type="text/javascript">
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush
 
