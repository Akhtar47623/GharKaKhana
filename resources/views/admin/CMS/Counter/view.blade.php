@extends('layouts.admin.app')
@section('title','Counter')
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Counter</h3>
                    <a href="{{url('admin/counter-content')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Amount:</th>
                                    <td>${{ $counter_content->title }}</td>
                                </tr>
                                @if($counter_content->phone1 != null)
                                <tr>
                                    <th>Phone1:</th>
                                    <td>{{ $counter_content->phone1 }}</td>
                                </tr>
                                @endif
                                 @if($counter_content->text1 != null)
                                <tr>
                                    <th>Short Description:</th>
                                    <td>{{ $counter_content->text1 }}</td>
                                </tr>
                                @endif
                                @if($counter_content->image_path != null)
                                <tr>
                                    <th>Image:</th>
                                    <td><img style="width: 100px;height: 100px;" src="{{ asset($counter_content->image_path) }}"></td>
                                </tr>
                                @endif
                                  <tr>
                                    <th>Likes:</th>
                                    <td>{{ $counter_content->title1 }}</td>
                                </tr>
                                 @if($counter_content->text2 != null)
                                <tr>
                                    <th>Short Description:</th>
                                    <td>{{ $counter_content->text2 }}</td>
                                </tr>
                                @endif
                                @if($counter_content->image1 != null)
                                <tr>
                                    <th>Image:</th>
                                    <td><img style="width: 100px;height: 100px;" src="{{ asset($counter_content->image1) }}"></td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Favorite:</th>
                                    <td>{{ $counter_content->title2 }}</td>
                                </tr>
                                 @if($counter_content->text2 != null)
                                <tr>
                                    <th>Short Description:</th>
                                    <td>{{ $counter_content->text2 }}</td>
                                </tr>
                                @endif
                                @if($counter_content->image2 != null)
                                <tr>
                                    <th>Image:</th>
                                    <td><img style="width: 100px;height: 100px;" src="{{ asset($counter_content->image2) }}"></td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Users:</th>
                                    <td>{{ $counter_content->title3 }}</td>
                                </tr>
                                 @if($counter_content->text3 != null)
                                <tr>
                                    <th>Short Description:</th>
                                    <td>{{ $counter_content->text3 }}</td>
                                </tr>
                                @endif
                                @if($counter_content->image3 != null)
                                <tr>
                                    <th>Image:</th>
                                    <td><img style="width: 100px;height: 100px;" src="{{ asset($counter_content->image3) }}"></td>
                                </tr>
                                @endif
                               <br>
                               @if($counter_content->image4 != null)
                                <tr>
                                    <th>Background Image:</th>
                                    <td><img style="width: 300px;height: 250px;" src="{{ asset($counter_content->image4) }}"></td>
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

