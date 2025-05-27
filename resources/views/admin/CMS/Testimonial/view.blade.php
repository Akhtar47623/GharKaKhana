@extends('layouts.admin.app')
@section('title','Testimonial')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Testimonial</h3>
                    <a href="{{url('admin/testimonial-content')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Title:</th>
                                    <td>{{ $testimonial_details->title }}</td>
                                </tr>
                                @if($testimonial_details->text1 != null)
                                <tr>
                                    <th>Short Description:</th>
                                    <td>{{ $testimonial_details->text1 }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Description:</th>
                                    <td><?=html_entity_decode($testimonial_details->description)?></td>
                                </tr>
                               <!--  <tr>
                                    <th>Image:</th>
                                    <td><img src="{{ asset($testimonial_details->image_path) }}"></td>
                                </tr> -->
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

