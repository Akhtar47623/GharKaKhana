@extends('layouts.admin.app')
@section('title','Profile')
@push('after-css')

    <link href="{{ asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet"/>
    {{--<link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">--}}
    <link href="{{asset('plugins/components/jqueryui/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <style>

        #rootwizard .nav-pills > li > a.active {
            background: #d3e0fc;
            color: #4886ff;

        }

        #rootwizard .nav-pills > li > a {
            padding: .4rem 1.3rem;
            border-radius: 2rem;
            border: 1px solid transparent;
            display: block;
        }

        #rootwizard .nav.nav-pills {
            margin-bottom: 25px;

        }

        #rootwizard .nav.nav-pills .nav-link {
            padding: 0px;
        }

        .nav-pills > li > a {
            cursor: default;;
            background-color: inherit;
        }

        .nav-pills > li > a:focus, .nav-tabs > li > a:focus, .nav-pills > li > a:hover, .nav-tabs > li > a:hover {
            border: 1px solid transparent !important;
           background: #d3e0fc;
        }

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .has-error .help-block {
            color: #EF6F6C;
        }

        .select2 {
            width: 100% !important;
        }

        .error-block {
            background-color: #ff9d9d;
            color: red;
        }

        .pager.wizard {
            padding-left: 0;
            margin: 20px 0;
            text-align: center;
            list-style: none;
        }

        .col-lg-2.control-label {
            text-align: right;
            line-height: 35px;
        }

        @media screen and (max-width: 767px) {
            .col-lg-2.control-label {
                text-align: left;
                line-height: 35px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                    <div class="card-body">

                        <h3 class="box-title pull-left">Account Settings</h3>
                        <div class="clearfix"></div>
                         @if(auth()->user()->hasRole('admin'))
                        <form id="commentForm" action="{{url('admin/account/profile')}}"
                              method="POST" enctype="multipart/form-data">
                              @else
                        <form id="commentForm" action="{{url('user/account/profile')}}"
                              method="POST" enctype="multipart/form-data">
                              @endif
                       

							  <input type="hidden" name="user_profile_dob" id="user_profile_dob" value="@if(!empty($user->profile->dob)){{$user->profile->dob}}@endif">

                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                            <div id="rootwizard">
                                <ul class="nav nav-tabs pb-2" id="tabs" role="tablist">
                                    <li class="nav-link  "><a href="#tab1" class="active" data-toggle="tab">User
                                            Profile</a></li>
                                    <li class="nav-link"><a href="#tab2" data-toggle="tab" >Bio</a></li>
                                    <li class="nav-link"><a href="#tab3" data-toggle="tab">Address</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        {{--<h2 class="hidden">&nbsp;</h2>--}}
                                        <div class="form-group row justify-content-center   {{ $errors->first('name', 'has-error') }}">
                                            <label for="name" class="col-12 col-lg-2 control-label">Name *</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="name" name="name" type="text"
                                                       placeholder="Name" class="form-control required"
                                                       value="{{$user->fname}}"/>

                                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center   {{ $errors->first('email', 'has-error') }}">
                                            <label for="email" class="col-12 col-lg-2 control-label">Email *</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="email" name="email" placeholder="E-mail" type="text"
                                                       class="form-control required email" value="{{$user->email}}"/>
                                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <h6><b>If you don't want to change password... please leave it empty</b></h6>

                                        <div class="form-group row justify-content-center   {{ $errors->first('password', 'has-error') }}">
                                            <label for="password" class="col-12 col-lg-2 control-label">Password
                                                *</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="password" name="password" type="password"
                                                       placeholder="Password"
                                                       class="form-control required" value="{!! old('password') !!}"/>
                                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center   {{ $errors->first('password_confirmation', 'has-error') }}">
                                            <label for="password_confirm" class="col-12 col-lg-2 control-label">Confirm
                                                Password
                                                *</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="password_confirmation" name="password_confirmation"
                                                       type="password"
                                                       placeholder="Confirm Password " class="form-control required"/>
                                                {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2" >
                                        {{--<h2 class="hidden">&nbsp;</h2>--}}
                                        <div class="form-group row justify-content-center    {{ $errors->first('dob', 'has-error') }}">
                                            <label for="dob" class="col-12 col-lg-2 control-label">Date of Birth</label>
                                            <div class="col-12 col-lg-6">
                                                <input autocomplete="off"
												value="@if(!empty($user->profile->dob)){{$user->profile->dob}}@endif"
                                                       id="dob" name="dob" type="text" class="form-control"
                                                       data-date-format="YYYY-MM-DD"
                                                       placeholder="yyyy-mm-dd"/>
                                                <span class="help-block">{{ $errors->first('dob', ':message') }}</span>

                                            </div>
                                        </div>


                                        <div class="form-group row justify-content-center   {{ $errors->first('pic_file', 'has-error') }}">
                                            <label for="pic" class="col-12 col-lg-2 control-label">Profile
                                                picture</label>
                                            <div class="col-12 col-lg-6">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"
                                                         style="width: 200px; height: 200px;">
                                                        @if(!empty($user->profile->pic))
                                                            <img src="{{asset('storage/uploads/users/'.$user->profile->pic)}}"
                                                                 alt="profile pic">
                                                        @else
                                                            <img src="http://placehold.it/200x200" alt="profile pic">
                                                        @endif
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                         style="max-width: 200px; max-height: 200px;"></div>
                                                    <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="pic" name="pic_file" type="file" class="form-control"/>
                                                </span>
                                                        <a href="#" class="btn btn-danger fileinput-exists"
                                                           data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{ $errors->first('pic_file', ':message') }}</span>
                                            </div>
                                        </div>


                                        <div class="form-group row justify-content-center  ">
                                            <label for="bio" class="col-12 col-lg-2 control-label">Bio
                                                <small>(brief intro) *</small>
                                            </label>
                                            <div class="col-12 col-lg-6">
											<textarea name="bio" id="bio" class="form-control resize_vertical"
												rows="4">@if(!empty($user->profile->bio)){{$user->profile->bio}}@endif</textarea>
                                            </div>
                                            {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="form-group row justify-content-center   {{ $errors->first('gender', 'has-error') }}">
                                            <label for="email" class="col-12 col-lg-2 control-label">Gender *</label>
                                            <div class="col-12 col-lg-6">
                                                <select class="form-control" title="Select Gender..." name="gender">
                                                    <option value="">Select</option>
                                                    <option value="male"
                                                            @if( ( !empty($user->profile->gender) && $user->profile->gender === 'male')) selected="selected" @endif >
                                                        Male
                                                    </option>
                                                    <option value="female"
                                                            @if( ( !empty($user->profile->gender) && $user->profile->gender === 'female')) selected="selected" @endif >
                                                        Female
                                                    </option>
                                                    <option value="other"
                                                             @if( ( !empty($user->profile->gender) && $user->profile->gender === 'other')) selected="selected" @endif >
                                                        Other
                                                    </option>

                                                </select>
                                                <span class="help-block">{{ $errors->first('gender', ':message') }}</span>
                                            </div>

                                        </div>

                                        <div class="form-group row justify-content-center   {{ $errors->first('country', 'has-error') }}">
                                            <label for="country" class="col-12 col-lg-2 control-label">Country</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="countries" name="country" type="text"
                                                       class="form-control"
                                                       value="@if(!empty($user->profile->country)) {{$user->profile->country}} @endif"/>
                                                <span class="help-block">{{ $errors->first('country', ':message') }}</span>

                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center   {{ $errors->first('state', 'has-error') }}">
                                            <label for="state" class="col-12 col-lg-2 control-label">State</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="state" name="state" type="text"
                                                       class="form-control"
                                                       value="@if(!empty($user->profile->state)) {{$user->profile->state}} @endif"/>
                                                <span class="help-block">{{ $errors->first('state', ':message') }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center   {{ $errors->first('city', 'has-error') }}">
                                            <label for="city" class="col-12 col-lg-2 control-label">City</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="city" name="city" type="text" class="form-control"
                                                       value="@if(!empty($user->profile->city)) {{$user->profile->city}} @endif"/>
                                                <span class="help-block">{{ $errors->first('city', ':message') }}</span>

                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center   {{ $errors->first('address', 'has-error') }}">
                                            <label for="address" class="col-12 col-lg-2 control-label">Address</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="address" name="address" type="text" class="form-control"
                                                       value="@if(!empty($user->profile->address)){{$user->profile->address}}@endif"/>
                                                <span class="help-block">{{ $errors->first('address', ':message') }}</span>

                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center   {{ $errors->first('postal', 'has-error') }}">
                                            <label for="postal" class="col-12 col-lg-2 control-label">Postal/zip</label>
                                            <div class="col-12 col-lg-6">
                                                <input id="postal" name="postal" type="text" class="form-control"
                                                       value="@if(!empty($user->profile->postal)){{$user->profile->postal}}@endif"/>
                                                <span class="help-block">{{ $errors->first('postal', ':message') }}</span>

                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mt-3">
                                    <div class="col-12 text-center">
                                        <ul class="pager wizard d-inline-block w-75 mx-auto my-0 ">
                                            <li class="previous  float-left"><a href="#" class="border btn btn-outline">Previous</a>
                                            </li>
                                            <li class="next float-right"><a class="border btn btn-outline"
                                                                            href="#">Next</a>
                                            </li>
                                            <li class="next float-right finish" style="display:none;"><a
                                                        class="border btn btn-outline" href="javascript:;">Finish</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>


                        @if(count($errors) > 0)
                            <div class="alert alert-danger">Errors! Please fill form with proper details</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @include('layouts.admin.includes.templates.footer')
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.init.js')}}"></script>
    <script src="{{asset('plugins/components/moment/moment.js')}}"></script>
    {{--<script src="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>--}}
    <script src="{{asset('plugins/components/jqueryui/jquery-ui.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"
            type="text/javascript"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{ asset('assets/js/edituser.js') }}"></script>


    <script>
        $("#dob").datepicker({
            dateFormat: 'yy-m-d',
            SetDate: $('#user_profile_dob').val(),
            widgetPositioning: {
                vertical: 'bottom'
            },
            keepOpen: false,
            useCurrent: false,
            maxDate: moment().add(1, 'h').toDate()
        });
        $('#tabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            //  $(".nav").find(".active").removeClass("active");
            // $(this).addClass("active");
});
    </script>
@endpush
