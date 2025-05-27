@extends('layouts.admin.app')
@section('title','Donation')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Donation Details # {{$donations->id}} </h3>

                    <a href="{{url('/admin/donation/')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                        <!-- <a class="btn btn-success pull-right" href="{{ url('/admin/request/inquiries') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a> -->

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            @if($donations->title != null)
                            <tr>
                                <th>Donate For:</th>
                                <td> {{ $donations->title }} </td>
                            </tr>
                            @endif
                            @if($donations->transactionid != null)
                            <tr>
                                <th>Transaction Id:</th>
                                <td> {{ $donations->transactionid }} </td>
                            </tr>
                            @endif
                            @if($donations->method != null)
                            <tr>
                                <th> Payment Method :</th>
                                <td> {{$donations->method}}</td>
                            </tr>
                            @endif
                               @if($donations->first_name != null)
                            <tr>
                                <th>First Name :</th>
                                <td> {{ $donations->first_name }} </td>
                            </tr>
                            @endif
                            @if($donations->last_name != null)
                             <tr>
                                <th>Last Name :</th>
                                <td> {{ $donations->last_name }} </td>
                            </tr>
                            @endif
                            @if($donations->email != null)
                            <tr>
                                <th> Email :</th>
                                <td> {{ $donations->email }} </td>
                            </tr>
                            @endif
                            @if($donations->phone_number != null)
                            <tr>
                                <th> Phone Number </th>
                                <td> {{ $donations->phone_number }} </td>
                            </tr>
                            @endif
                            @if($donations->amount != null)                            
                            <tr>
                                <th> Amount:</th>
                                <td> {{ $donations->amount }} </td>
                            </tr>
                            @endif

                            @if($donations->address != null)
                            <tr>
                                <th> Address :</th>
                                <td> {{$donations->address}}</td>
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

