@extends('layouts.admin.app')
@section('title', 'Help Us')
@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Help Us # {{$help_us->id}}</h3>

                    <a href="{{url('/admin/help-us')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $help_us->id }}</td>
                            </tr>
                            <tr><th> Name: </th>
                            <td> {{ $help_us->title }} </td>
                            </tr>
                            <tr><th> Short Description: </th>
                            <td> <?= html_entity_decode($help_us->short_description)?></td>
                            </tr>
                            
                            <tr><th>Image: </th>
                            <td>
                            <img src="{{asset($help_us->image_path) }}" class="img-responsve" width="250" height="200">
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

