@extends('layouts.admin.app')
@section('title','Contact')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Contact Inquiry Details </h3>

                    <a href="{{url('/admin/inquiry/')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                        <!-- <a class="btn btn-success pull-right" href="{{ url('/admin/request/inquiries') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a> -->

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>First Name :</th>
                                <td> {{ $contact_inquiry->first_name }} </td>
                            </tr>
                             <tr>
                                <th>Last Name :</th>
                                <td> {{ $contact_inquiry->last_name }} </td>
                            </tr>
                            <tr>
                                <th> Email :</th>
                                <td> {{ $contact_inquiry->email }} </td>
                            </tr>
                            <tr>
                                <th> Phone Number </th>
                                <td> {{ $contact_inquiry->phone }} </td>
                            </tr>
                            @if($contact_inquiry->service != null)
                            <tr>
                                <th> Service:</th>
                                <td> {{ $contact_inquiry->service }} </td>
                            </tr>
                            @endif
                            @if($contact_inquiry->message != null)
                            <tr>
                                <th> Message :</th>
                                <td> <?= html_entity_decode($contact_inquiry->message) ?> </td>
                            </tr>
                            @endif
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

