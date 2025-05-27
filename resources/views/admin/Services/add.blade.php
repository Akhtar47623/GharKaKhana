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
                        <h5 class="card-title m-b-0 align-self-center">Add Services</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    

                    <form action="{{url('/admin/services')}}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="slug" name="slug"  placeholder="slug"  value="{{old('slug')}}">
                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       <div class="form-group">
                            <label for="short_description">Short Description </label>
                            <textarea type="text" class="form-control" id="short_description" name="short_description"  placeholder="Short Description" value="{{old('short_description')}}">{{old('short_description')}}</textarea>
                            @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="long_description">Long Description:</label>
                            <textarea class="form-control" id="long_description" name="long_description" rows="3" placeholder="Long Description">{{old('long_description')}}</textarea>
                            @error('long_description')
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
<script>
  $(document).ready(function() {
 
      $(".btn-add-more").click(function(){ 
          var html = $(".clone").html();
          $(".img_div").after(html);
      });
 
      $("body").on("click",".btn-remove",function(){ 
          $(this).parents(".control-group").remove();
      });

      // image preview
         $('#image').change(function(){
        $("#frames").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $("#frames").append('<img src="'+window.URL.createObjectURL(this.files[i])+'" width="200px" height="150px"/>');
        }
    });
 
    });
 

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
  $('#title').on('keyup',function(e) {
    $.get('{{ route('service_slug') }}', 
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
 
