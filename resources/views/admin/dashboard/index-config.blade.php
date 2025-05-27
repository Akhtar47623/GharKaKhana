@extends('layouts.admin.app')
@section('title', 'Website Configuration')
@section('content')
<div class="container-fluid config">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form method="POST" action="{{route('config_settings_update')}}">
                @csrf
                <div class="card-body">
                    <h3>Global Detail</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="form-wrap form-wrap2 mt-4">
                                    <div class="form-group m-b-15">
                                        <div class="row m-0 m-b-20">
                                            <?php
                                            $_getConfig=DB::table('m_flag')->where('is_active','1')->where('is_config','1')->get();
                                            ?>

                                            @foreach($_getConfig as $_Config)

                                            @if($_Config->type='1')
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group m-b-15">
                                                    <label class="control-label text-primary font-12 m-b-5">{{$_Config->flag_type}}
                                                    </label>
                                                    <div>
                                                        <input class="form-control font-14" placeholder="{{ $_Config->placeholder   }}" name="{{$_Config->flag_type}}" type="text" value="{{$_Config->flag_value}}">
                                                    </div>
                                                </div>
                                            </div>

                                            @else
                                            <h3>Social Media</h3>
                                            <hr>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group m-b-15">
                                                    <label class="control-label text-primary font-12 m-b-5">{{$_Config->flag_show_text}}
                                                    </label>
                                                    <div>
                                                        <input class="form-control font-14" placeholder="Address" name="{{$_Config->flag_type}}" type="text" value="{{$_Config->flag_value}}">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <input type="Submit" value="Update" >
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</div>

@endsection



@push('js')
<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>
<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset('assets/js/dashboard-shop.js')}}"></script>

@endpush
