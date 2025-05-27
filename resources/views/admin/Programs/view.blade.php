@extends('layouts.admin.app')
@section('title', 'Services')
@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Service # {{$services->id}}</h3>

                    <a href="{{url('/admin/services')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $services->id }}</td>
                            </tr>
                            <tr><th> Name: </th>
                            <td> {{ $services->title }} </td>
                            </tr>
                            @if($services->home_shortDescription != null)
                            <tr><th> Short Description (for Home Page): </th>
                            <td> <?= html_entity_decode($services->home_shortDescription)?></td>
                            </tr>
                            @endif
                            <tr><th> Short Description (for Service Detail Page): </th>
                            <td> <?= html_entity_decode($services->short_description)?></td>
                            </tr>
                            <tr><th>Long Description </th>
                            <td> <?= html_entity_decode($services->long_description) ?></td>
                            </tr>
                            <tr><th>Featured Image: </th>
                            <td>
                            <img src="{{asset($services->image_path) }}" class="img-responsve" width="250" height="200">
                            </td>
                            </tr>

                            <tr><th>Gallery Image: </th>
                            <td>
                                @foreach($gallery_image as $image)
                            <img src="{{asset($image->image_path) }}" class="img-responsve" width="300" height="200">
                            @endforeach
                            </td>
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

