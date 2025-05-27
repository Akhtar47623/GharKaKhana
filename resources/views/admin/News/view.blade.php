@extends('layouts.admin.app')
@section('title','Newsletter')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Newsletter Details </h3>

                    <a href="{{url('/admin/news/')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $news->id }}</td>
                            </tr>
                            <tr>
                                <th> Title </th>
                                <td> {{ $news->title }} </td>
                            </tr>
                            <tr>
                                <th> Author </th>
                                <td> {{ $news->author }} </td>
                            </tr>
                            <tr>
                                <th> Service </th>
                                <td> {{ $service->name }} </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td><img src="{{ asset($news->news_image) }}"></td>
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

