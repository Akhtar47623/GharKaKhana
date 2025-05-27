@extends('layouts.admin.app')



@section('content')

    <div class="container-fluid bg-white mt-5">

        <!-- .row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box card">

                <div class="card-body">

                    <h3 class="box-title pull-left">Section Detail # {{$home_info->id}}</h3>



                        <a class="btn btn-success pull-right" href="{{ url('/admin/home_info') }}">

                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>



                    <div class="clearfix"></div>

                    <hr>

                    <div class="table-responsive">

                        <table class="table table">

                            <tbody>

                            <tr>

                                <th>ID</th>

                                <td>{{ $home_info->id }}</td>

                            </tr>

                            <tr><th> Title </th>

                            <td> {{ $home_info->title }} </td>

                            </tr>

                            <tr><th> Icon </th>

                            <td><img style="height: 60px;width: 50px;" src="{{ asset($home_info->image) }}" class="img-responsive"></td>

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



