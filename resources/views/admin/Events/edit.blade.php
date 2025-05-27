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
@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex m-b-10 no-block">
            <h5 class="card-title m-b-0 align-self-center">Edit Event</h5>
            <div class="ml-auto text-light-blue">
              <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
              </ul>
            </div>
          </div>
          <form action="{{url('/admin/event/'.$events->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
                @if($events->title != null)
                <div class="form-group">
                  <label for="title">Title :</label>
                  <input type="text" class="form-control" id="event_title" value="{{ $events->title }}" name="title" >
                  @error('title')
                  <p class="text-danger">**{{ $message }}</p>
                  @enderror
                </div>
                @endif
                <div class="form-group">
                  <label for="slug">Slug:</label>
                  <input type="text" class="form-control" id="slug" value="{{ $events->slug }}" name="slug" placeholder="slug" required>
                  @error('slug')
                  <p class="error-message">**{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                      <label for="event description">Event Description:</label>
                      <textarea type="text" class="form-control" id="description" name="event_description" value="">{{ $events->event_description }}</textarea>
                      @error('event_description')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                  <div class="form-group">
                      <label for="additional Info">Additional Info:</label>
                      <textarea type="text" class="form-control" id="additional_info" name="additional_info"  value="">{{ $events->additional_info }}</textarea>
                      @error('additional_info')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                 @if($events->service != null)
                <div class="form-group">
                  <label for="service">Service :</label>
                  <input class="form-control" id="service" name="service" value="{{ $events->service }}">
                  @error('service')
                      <p class="text-danger">**{{ $message }}</p>
                  @enderror
                </div>
                  @endif
                <div class="form-group">
                  <label for="organizer">Organizer :</label>
                  <input type="text" class="form-control" name="organizer" value="{{ $events->organizer}}">
                  @error('organizer')
                      <p class="text-danger">**{{ $message }}</p>
                  @enderror
                </div>
                @if($events->day != null)
                <div class="form-group">
                  <label for="day">Day :</label>
                  <input type="text" class="form-control" name="day" value="{{ $events->day}}">
                  @error('day')
                      <p class="text-danger">**{{ $message }}</p>
                  @enderror
                </div>
                @endif
                <div class="form-group">
                  <label for="start date">Start Date :</label>
                  <input type="date" class="form-control" name="start_date" value="{{ $events->start_date}}">
                  @error('start_date')
                      <p class="text-danger">**{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="end date">End Date :</label>
                  <input type="date" class="form-control" name="end_date" value="{{ $events->end_date}}">
                  @error('end_date')
                      <p class="text-danger">**{{ $message }}</p>
                  @enderror
                </div>
                @if($events->time != null)
              <div class="form-group">
                <label for="time">Time :</label>
                <input class="form-control" id="time" name="time" value="{{ $events->time }}">
                @error('time')
                    <p class="text-danger">**{{ $message }}</p>
                @enderror
              </div>
                @endif
                @if($events->location != null)
               <div class="form-group">
                <label for="location">Location :</label>
                <input type="text" class="form-control" id="location" value="{{ $events->location }}" name="location" >
                @error('location')
                <p class="text-danger">**{{ $message }}</p>
                @enderror
              </div>
                @endif
               
                  @if($events->image_path != null)
                <div class="form-group">
                  <label for="image">Image:</label>
                  <img style="max-width: 340px; object-fit: contain;" id="input-preview" src="{{ isset($events)?asset($events->image_path):asset('posting_details_images/upload.jpg') }}">
                  <div class="upload-photo">
                    <input type="file" name="image_path" id="input-file-now" class="dropify" /></br>
                    @error('image_path')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>
              </div>
                @endif

                <div class="form-group">
                            <label for="image">Gallery Images:</label>
                            <br>
                            @foreach($event_gallery as $gallery)
                            <img style="width: 200px; height: 200px;" id="input-preview" src="{{ isset($gallery)?asset($gallery->image_path):asset('events/upload.jpg') }}">
                            @endforeach
                            <br>
                            <br>
                            <div class="input-group control-group img_div form-group " >
                              <input type="file" name="gallery_image[]" class="form-control">
                              <!-- Add More Button -->
                              <div class="input-group-btn"> 
                                <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                              </div>
                              <!-- End -->
                            </div>
                            <!-- Add More Image upload field  -->
                            <div class="clone hide ">
                              <div class="control-group input-group form-group" style="margin-top:10px">
                                <input type="file" name="gallery_image[]" class="form-control">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                              </div>
                            </div>
                            @error('gallery_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <!-- End -->
                            <br>

                <div class="form-group">
                <label for="occupation">Status:</label>
                @if($events->status == 0)
                <select class="form-select form-control" aria-label="Default select example" name="status" >
                  <option value="0" selected class="form-control">Inactive</option>
                  <option value="1" class="form-control">Active</option>
                </select>
                @elseif($events->status == 1)
                  <select class="form-control" aria-label="Default select example" name="status">
                    <option value="1" selected class="form-control">Active</option>
                    <option value="0" class="form-control">InActive</option>
                  </select>
                  @endif
              </div>
            <!-- <div>
                <img alt="Website Logo" style="width: 150px;height: 150px;" id="input-preview" src="{{ asset($events->image_path) }}">
            </div> -->

  <button class="btn btn-success pull-center" type="submit">Update</button>

</form>



                    </div>

                </div>

            </div>

            <!-- Column -->

        </div>

        <!-- ============================================================== -->

        <!-- End Info box -->

        <!-- chart box two -->

        <!-- ============================================================== -->

          @include('layouts.admin.includes.templates.footer')

    </div>

@endsection



@push('js')<!-- ============================================================== -->
<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>
<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<!-- slug scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- endslug scripts -->



<script>
  $(document).ready(function(){
    //Script To Generate slug
  $('#event_title').change(function(e) {
    $.get('{{ route('event_slug') }}', 
      { 'title': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
   
      $(".btn-add-more").click(function(){ 
            var html = $(".clone").html();
            $(".img_div").after(html);
        });
   
        $("body").on("click",".btn-remove",function(){ 
            $(this).parents(".control-group").remove();
        });

       $('#description').summernote({
          placeholder: 'Type Services Detail ....',
          tabsize: 2,
          height: 100
        });
        $('#additional_info').summernote({
          placeholder: 'Additional Info ....',
          tabsize: 2,
          height: 100
        });
  });
</script>


@endpush

