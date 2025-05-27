@extends('layouts.admin.app')
@section('title','Events')
<style type="text/css">
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 0px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
  padding-left: 25px;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 0px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}
span.error {
    font-size: 15px;
    padding-left: 13px;
    color:red;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
.jumbotron {padding-top: -4px;
}
</style>
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
<style>
  p.error-message {
    color: #f00;
    font-weight: 500;
  }
</style>

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex m-b-10 no-block">
            <h5 class="card-title m-b-0 align-self-center">Add Event</h5>
            <div class="ml-auto text-light-blue">
              <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
              </ul>
            </div>
          </div>
          <form action="{{url('/admin/event')}}" method="POST" enctype="multipart/form-data">
            @csrf
          
                <div class="form-group">
                  <label for="title">Title :</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" id="event_title">
                  @error('title')
                      <p class="error-message">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="slug">Slug:</label>
                  <input type="text" class="form-control" id="slug" value="{{ old('slug') }}" name="slug" placeholder="slug" required>
                  @error('slug')
                  <p class="error-message">**{{ $message }}</p>
                  @enderror
                </div>
                 <div class="form-group">
                  <label for="event_description">Event Description:<span class="danger">*</span></label>
                  <textarea class="form-control" id="description" name="event_description" rows="3"></textarea>
                  @error('event_description')
                      <p class="error-message">**{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="additional_info">Additional Info:</label>
                  <textarea class="form-control" id="additional_info" name="additional_info" rows="3" placeholder="Additional Info...."></textarea>
                  @error('additional_info')
                      <p class="error-message">**{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="organizer">Organizer :</label>
                  <input type="text" class="form-control" name="organizer" value="{{ old('organizer') }}" placeholder="Organizer">
                  @error('organizer')
                    <p class="error-message">{{ $message }}</p>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="service">Service :</label>
                    <input type="text" class="form-control" name="service" value="{{ old('service') }}" placeholder="service">
                    @error('service')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                  </div>
                 <div class="form-group">
                    <label for="day">Day :</label>
                    <input type="text" class="form-control" name="day" value="{{ old('day') }}" placeholder="day">
                    @error('day')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start date">Start Date :</label>
                    <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" placeholder="start_date">
                    @error('start_date')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="end date">End Date :</label>
                    <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" placeholder="end_date">
                    @error('end_date')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="time">Time :</label>
                    <input type="text" class="form-control" name="time" value="{{ old('time') }}" placeholder="time">
                    @error('time')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="location">Location :</label>
                    <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="location">
                    @error('location')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="Image">Image :</label>
                  <div class="input-group control-group" >
                    <input type="file" name="image_path" class="myfrm form-control">
                  </div>
                  @error('image_path')
                  <p class="error-message">{{ $message }}</p>
                  @enderror
                </div>
                 <label>Gallery Images:</label>
                        <div class="input-group control-group img_div form-group " >
                          <input type="file" name="gallery_image[]"  class="form-control">
                          <!-- Add More Button -->
                         <div class="input-group-btn"> 
                            <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                          </div>
                        </div>
                          <br>
                        <!-- Add More Image upload field  -->
                        <div class="clone hide ">
                          <div class="control-group input-group form-group" style="margin-top:10px">
                            <input type="file" name="gallery_image[]"  class="form-control">
                            <div class="input-group-btn"> 
                              <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>

                          </div>
                        </div>
                        @error('gallery_image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
             <!--   <div class="form-row pb-2">
                  <label for="rating" class="pl-2">Star Rating :</label>
                <div class="col">
                  <fieldset class="rating" >
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                  </fieldset>
                </div>
              </div> -->
           <!--    @error('rating')
              <span class="error" class="text-danger">{{ $message }}</span>
              @enderror -->
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
    $('#job_description').summernote({
      placeholder: 'Type Job Description',
      tabsize: 2,
      height: 100
    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#description').summernote({
      placeholder: 'Description....',
      tabsize: 2,
      height: 100
    });
     $('#additional_info').summernote({
      placeholder: 'Additional Info....',
      tabsize: 2,
      height: 100
    });
 
      $(".btn-add-more").click(function(){ 
          var html = $(".clone").html();
          $(".img_div").after(html);
      });
 
      $("body").on("click",".btn-remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    //Script To Generate slug
  $('#event_title').change(function(e) {
    $.get('{{ route('event_slug') }}', 
      { 'title': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
  });
</script>
<script type="text/javascript">
$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [',', ' ']
})
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>

@endpush

