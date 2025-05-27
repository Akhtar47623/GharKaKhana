@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Why Us Content</h3>

                        <a class="btn btn-success pull-right" href="{{ url('/admin/WhyUs') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th> Heading </th>
                                <td>{{ $WhyUs_content->heading }}</td>
                            </tr>
                            <tr><th> Details </th>
                            <td><?= html_entity_decode($WhyUs_content->description) ?> </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td><img src="{{ asset($WhyUs_content->image) }}" class="img-responsive" style="height:573px ;width:498px "></td>
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

