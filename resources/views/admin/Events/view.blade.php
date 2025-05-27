@extends('layouts.admin.app')
@section('title','Events')
@section('content')
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

    tr, td{
        text-transform: capitalize;
    }
</style>
@push('before-css')

<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Event # {{$events->id}}</h3>
                    <a href="{{url('/admin/event')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Title :</th>
                                    <td>{{ $events->title}}</td>
                                </tr>
                                 <tr>
                                    <th>Day:</th>
                                    <td>{{ $events->day}}</td>
                                </tr>
                                <tr>
                                    <th>Service:</th>
                                    <td>{{ $events->service}}</td>
                                </tr>
                                <tr>
                                    <th>Time:</th>
                                    <td>{{ $events->time}}</td>
                                </tr>
                                <tr>
                                    <th>Location:</th>
                                    <td>{{ $events->location}}</td>
                                </tr>
                                <tr>
                                <td><h5>Image :</h5></td>
                                    <td><img src="{{ asset($events->image_path) }}" style="height: 150px;width: 300px; object-fit: contain;" class="img-responsive"></td>
                                </tr>
                                </table>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.includes.templates.footer')
</div>
@endsection