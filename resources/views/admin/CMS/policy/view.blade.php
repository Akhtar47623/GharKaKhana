@extends('layouts.admin.app')
@section('title','Privacy Policy')
@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Terms And Condition</h3>

                        <!-- <a class="btn btn-success pull-right" href="{{ url('/admin/privacy-policy') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a> -->
                            <a href="{{url('admin/privacy-policy')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>Title:</th>
                                <td>{{ $policy_detail->title }}</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td><?= html_entity_decode($policy_detail->description) ?> </td>
                            </tr>
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

