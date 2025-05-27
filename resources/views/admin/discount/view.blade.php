@extends('layouts.admin.app')
@section('title', 'Discount')
@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Discount Detail # {{$discount_detail->id}}</h3>

                    <a href="{{url('/admin/discount/')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>Discount Code:</th>
                                <td>{{ $discount_detail->discount_code }}</td>
                            </tr>
                            <tr>
                                <th>Max Usage:</th>
                                <td>{{ $discount_detail->max_usage }}</td>
                            </tr>
                            <tr>
                                <th>Start Date:</th>
                                <td>{{ $discount_detail->start_date }}</td>
                            </tr>
                            <tr>
                                <th>End Date:</th>
                                <td>{{ $discount_detail->end_date }}</td>
                            </tr>
                            <tr>
                                <th>Discount Value:</th>
                                <td>{{ $discount_detail->discount }}</td>
                            </tr>
                            <tr>
                                <th>Discount Over:</th>
                                <td>{{ $discount_detail->discount_over }}</td>
                            </tr>
                            <tr>
                                <th>Discount Type:</th>
                                <td>{{ $discount_detail->discount_type }}</td>
                            </tr>
                            <tr>
                                <th>Max Discount:</th>
                                <td>${{ $discount_detail->max_discount }}</td>
                            </tr>
                            <tr>
                                <th>Minimum Required Amount:</th>
                                <td>${{ $discount_detail->min_required_amount }}</td>
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

