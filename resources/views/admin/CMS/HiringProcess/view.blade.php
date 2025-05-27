@extends('layouts.admin.app')
@section('title','Hiring Process')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Hiring Process</h3>
                    <a href="{{url('admin/hiring-process')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Step 1 :</th>
                                    <td>{{ $process_content->title1 }}</td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $process_content->text1 }}</td>
                                </tr>
                                <tr>
                                    <th>Step 2 :</th>
                                    <td>{{ $process_content->title2 }}</td>
                                </tr>
                                 <tr>
                                    <th>Description:</th>
                                    <td>{{ $process_content->text2 }}</td>
                                </tr>
                                <tr>
                                    <th>Step 3 :</th>
                                    <td>{{ $process_content->title3 }}</td>
                                </tr>
                                 <tr>
                                    <th>Description:</th>
                                    <td>{{ $process_content->text3 }}</td>
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

