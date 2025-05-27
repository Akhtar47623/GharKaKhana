@extends('layouts.admin.app')
@section('title','About Us')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">About Us</h3>
                    <a href="{{url('admin/about-us')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Title1:</th>
                                    <td>{{ $about_details->title }}</td>
                                </tr>
                                 <tr>
                                    @if($about_details->description != null)
                                    <th>Short Description:</th>
                                    <td><?= html_entity_decode($about_details->description) ?> </td>
                                    @endif
                                </tr>
                                 @if($about_details->image_path != null)
                                <tr>
                                    <th>Icon:</th>
                                    <td><img style="width: 100px;height: 100px;" src="{{ asset($about_details->image_path) }}"></td>
                                </tr>
                                @endif
                                <tr>
                                    @if($about_details->title1 != null)
                                    <th>Title 2:</th>
                                    <td>{{ $about_details->title1 }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($about_details->text1 != null)
                                    <th>Short Description:</th>
                                    <td><?= html_entity_decode($about_details->text1) ?> </td>
                                    @endif
                                </tr>
                                @if($about_details->image1 != null)
                                <tr>
                                    <th>Icon:</th>
                                    <td><img style="width: 100px;height: 100px;" src="{{ asset($about_details->image1) }}"></td>
                                </tr>
                                @endif
                                 <tr>
                                    @if($about_details->title2 != null)
                                    <th>Title 3:</th>
                                    <td>{{ $about_details->title2 }}</td>
                                    @endif
                                </tr>
                                @if($about_details->text2 != null)
                                <tr>
                                    <th> Short Description:</th>
                                    <td><?= html_entity_decode($about_details->text2) ?> </td>
                                </tr>
                                @endif
                                @if($about_details->image2 != null)
                                <tr>
                                    <th>Icon:</th>
                                    <td><img style="width: 100px;height: 100px;" src="{{ asset($about_details->image2) }}"></td>
                                </tr>
                                @endif

                                <br>

                                @if($about_details->image3 != null)
                                <tr>
                                    <th>Info Image:</th>
                                    <td><img style="width: 300px;height: 320px;" src="{{ asset($about_details->image3)}}"></td>
                                </tr>
                                @endif
                               <!--  @if($about_details->image1 != null)
                                <tr>
                                    <th>Image2:</th>
                                    <td><img style="width: 300px;height: 320px;" src="{{ asset($about_details->image1) }}"></td>
                                </tr>
                                @endif -->
                                @if($about_details->video_path != null)
                                <tr>
                                    <th>Video:</th>
                                    <td>
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset($about_details->video_path) }}" type="video/mp4">
                                            <source src="{{ asset($about_details->video_path) }}" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    </td>
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

