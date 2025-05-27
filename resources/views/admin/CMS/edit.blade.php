@extends('layouts.admin.app')
@section('title','Update CMS')
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
                    <form action="{{url('/admin/CMS/'.$CMS_details->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if($CMS_details->title != null)
                        <div class="form-group">
                            <label for="heading">Title:</label>
                            <input type="text" class="form-control" id="heading" name="heading" value="{{$CMS_details->title}}">
                        </div>
                        @endif
                        @if($CMS_details->image1 != null)
                        <div class="form-group">
                            <label for="text1">image1:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($CMS_details)?asset($CMS_details->image1):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image1" id="image1" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title1 != null && $CMS_details->text1 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title1" name="title1" value="{{$CMS_details->title1}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text1" name="text1" value="{{$CMS_details->text1}}">
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title1 != null && $CMS_details->text1 == null)
                        <div class="form-group">
                            <label for="title1">Title:</label>
                            <input type="text" class="form-control" id="title1" name="title1" value="{{$CMS_details->title1}}">
                        </div>
                        @endif
                        @if($CMS_details->text1 != null && $CMS_details->title1 == null)
                        <div class="form-group">
                            <label for="text1">Title:</label>
                            <input type="text" class="form-control" id="text1" name="text1" value="{{$CMS_details->text1}}">
                        </div>
                        @endif
                        <br>
                        @if($CMS_details->image2 != null)
                        <div class="form-group">
                            <label for="text1">image2:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($CMS_details)?asset($CMS_details->image2):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image2" id="image2" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title2 != null && $CMS_details->text2 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title2" name="title2" value="{{$CMS_details->title2}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text2" name="text2" value="{{$CMS_details->text2}}">
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title2 != null && $CMS_details->text2 == null)
                        <div class="form-group">
                            <label for="title2">Title:</label>
                            <input type="text" class="form-control" id="title2" name="title2" value="{{$CMS_details->title2}}">
                        </div>
                        @endif
                        @if($CMS_details->text2 != null && $CMS_details->title2 == null)
                        <div class="form-group">
                            <label for="text2">Title:</label>
                            <input type="text" class="form-control" id="text2" name="text2" value="{{$CMS_details->text2}}">
                        </div>
                        @endif
                        <br>
                        @if($CMS_details->image3 != null)
                        <div class="form-group">
                            <label for="image3">image3:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($CMS_details)?asset($CMS_details->image3):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image3" id="image3" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title3 != null && $CMS_details->text3 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title3" name="title3" value="{{$CMS_details->title3}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text3" name="text3" value="{{$CMS_details->text3}}">
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title3 != null && $CMS_details->text3 == null)
                        <div class="form-group">
                            <label for="title3">Title:</label>
                            <input type="text" class="form-control" id="title3" name="title3" value="{{$CMS_details->title3}}">
                        </div>
                        @endif
                        @if($CMS_details->text3 != null && $CMS_details->title3 == null)
                        <div class="form-group">
                            <label for="text3">Title:</label>
                            <input type="text" class="form-control" id="text3" name="text3" value="{{$CMS_details->text3}}">
                        </div>
                        @endif
                        @if($CMS_details->image4 != null)
                        <div class="form-group">
                            <label for="image3">image4:</label>
                            <img alt="Website Logo" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($CMS_details)?asset($CMS_details->image4):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image4" id="image4" class="dropify" />
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title4 != null && $CMS_details->text4 != null)
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="title4" name="title4" value="{{$CMS_details->title4}}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="text4" name="text4" value="{{$CMS_details->text4}}">
                            </div>
                        </div>
                        @endif
                        @if($CMS_details->title4 != null && $CMS_details->text4 == null)
                        <div class="form-group">
                            <label for="title4">Title:</label>
                            <input type="text" class="form-control" id="title4" name="title4" value="{{$CMS_details->title4}}">
                        </div>
                        @endif
                        @if($CMS_details->text4 != null && $CMS_details->title4 == null)
                        <div class="form-group">
                            <label for="text4">Title:</label>
                            <input type="text" class="form-control" id="text4" name="text4" value="{{$CMS_details->text4}}">
                        </div>
                        @endif
                        @if($CMS_details->description != null)
                        <div class="form-group">
                            <label for="description">Content:</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{$CMS_details->description}}</textarea>
                        </div>
                        @endif
                        @if($CMS_details->button1 != null)
                        <div class="form-group">
                            <label for="button1">button 1:</label>
                            <input type="text" class="form-control" id="button1" name="button1" value="{{$CMS_details->button1}}">
                        </div>
                        @endif
                        @if($CMS_details->button1link != null)
                        <div class="form-group">
                            <label for="button1link">button 1 link:</label>
                            <input type="text" class="form-control" id="button1link" name="button1link" value="{{$CMS_details->button1link}}">
                        </div>
                        @endif
                        @if($CMS_details->button2 != null)
                        <div class="form-group">
                            <label for="button2">button 2:</label>
                            <input type="text" class="form-control" id="button2" name="button2" value="{{$CMS_details->button2}}">
                        </div>
                        @endif
                        @if($CMS_details->button2link != null)
                        <div class="form-group">
                            <label for="button2link">button 2 link:</label>
                            <input type="text" class="form-control" id="button2link" name="button2link" value="{{$CMS_details->button2link}}">
                        </div>
                        @endif
                        @if($CMS_details->button3 != null)
                        <div class="form-group">
                            <label for="button3">button 3:</label>
                            <input type="text" class="form-control" id="button3" name="button3" value="{{$CMS_details->button3}}">
                        </div>
                        @endif
                        @if($CMS_details->button3link != null)
                        <div class="form-group">
                            <label for="button3link">button 3 link:</label>
                            <input type="text" class="form-control" id="button3link" name="button3link" value="{{$CMS_details->button3link}}">
                        </div>
                        @endif
                        @if($CMS_details->button4 != null)
                        <div class="form-group">
                            <label for="button4">button 4:</label>
                            <input type="text" class="form-control" id="button4" name="button4" value="{{$CMS_details->button4}}">
                        </div>
                        @endif
                        @if($CMS_details->button4link != null)
                        <div class="form-group">
                            <label for="button4link">button 4 link:</label>
                            <input type="text" class="form-control" id="button4link" name="button4link" value="{{$CMS_details->button4link}}">
                        </div>
                        @endif
                        @if($CMS_details->founding != null)
                        <div class="form-group">
                            <label for="button4link">Founding Year:</label>
                            <input type="text" class="form-control" id="founding" name="founding" value="{{$CMS_details->founding}}">
                        </div>
                        @endif
                        @if($CMS_details->f_year != null)
                        <div class="form-group">
                            <input type="number" class="form-control" id="f_year" name="f_year" value="{{$CMS_details->f_year}}">
                        </div>
                        @endif


                        @if($CMS_details->happy_customer != null)
                        <div class="form-group">
                            <label for="button4link">Customers:</label>
                            <input type="text" class="form-control" id="happy_customer" name="happy_customer" value="{{$CMS_details->happy_customer}}">
                        </div>
                        @endif
                        @if($CMS_details->hp_year != null)
                        <div class="form-group">
                            <input type="number" class="form-control" id="hp_year" name="hp_year" value="{{$CMS_details->hp_year}}">
                        </div>
                        @endif

                        @if($CMS_details->asc_companies != null)
                        <div class="form-group">
                            <label for="button4link">Associated Companies:</label>
                            <input type="text" class="form-control" id="asc_companies" name="asc_companies" value="{{$CMS_details->asc_companies}}">
                        </div>
                        @endif
                        @if($CMS_details->ac_year != null)
                        <div class="form-group">
                            <input type="number" class="form-control" id="ac_year" name="ac_year" value="{{$CMS_details->ac_year}}">
                        </div>
                        @endif

                        @if($CMS_details->offices != null)
                        <div class="form-group">
                            <label for="button4link">Offices:</label>
                            <input type="text" class="form-control" id="offices" name="offices" value="{{$CMS_details->offices}}">
                        </div>
                        @endif
                        @if($CMS_details->o_year != null)
                        <div class="form-group">
                            <input type="number" class="form-control" id="o_year" name="o_year" value="{{$CMS_details->o_year}}">
                        </div>
                        @endif

                        @if($CMS_details->team_member != null)
                        <div class="form-group">
                            <label for="button4link">Team Member:</label>
                            <input type="text" class="form-control" id="team_member" name="team_member" value="{{$CMS_details->team_member}}">
                        </div>
                        @endif
                        @if($CMS_details->team_count != null)
                        <div class="form-group">
                            <input type="number" class="form-control" id="team_count" name="team_count" value="{{$CMS_details->team_count}}">
                        </div>
                        @endif

                        @if($CMS_details->completed_projects != null)
                        <div class="form-group">
                            <label for="button4link">Completed Projects:</label>
                            <input type="text" class="form-control" id="completed_projects" name="completed_projects" value="{{$CMS_details->completed_projects}}">
                        </div>
                        @endif
                        @if($CMS_details->cp_count != null)
                        <div class="form-group">
                            <input type="number" class="form-control" id="cp_count" name="cp_count" value="{{$CMS_details->cp_count}}">
                        </div>
                        @endif

                        @if($CMS_details->image_path != null)
                        <div class="form-group">
                            <label for="image3">image_path:</label>
                            <img alt="Website Logo" style="max-width: 340px;" id="input-preview" src="{{ isset($CMS_details)?asset($CMS_details->image_path):asset('images/upload.jpg') }}">
                            <div class="upload-photo">
                                <input type="file" name="image_path" id="image_path" class="dropify" />
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
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#description').summernote({
            placeholder: 'Type News Details',
            tabsize: 2,
            height: 100
        });
    });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush

