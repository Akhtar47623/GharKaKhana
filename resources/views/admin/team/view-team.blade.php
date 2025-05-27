@extends('layouts.admin.app')
@section('title', 'Team')
@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Team Member # {{$team_detail->id}}</h3>

                    <a href="{{url('/admin/team/')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $team_detail->name }}</td>
                            </tr>
                            <tr><th>Occupation:</th>
                            <td>{{ $team_detail->occupation }}</td>
                            </tr>
                            <tr><th>Socials :</th></tr>
                            @if($team_detail->facebook_link != null)
                            <tr><th>Facebook Link:</th>
                            <td>{{ $team_detail->facebook_link }}</td>
                            </tr>
                            @endif
                            @if($team_detail->twitter_link != null)
                            <tr><th>Twitter Link:</th>
                            <td>{{ $team_detail->twitter_link }}</td>
                            </tr>
                            @endif
                            @if($team_detail->linkedin_link != null)
                            <tr><th>LinkedIn Link:</th>
                            <td>{{ $team_detail->linkedin_link }}</td>
                            </tr>
                            @endif
                            @if($team_detail->instagram_link != null)
                            <tr><th>Instagram:</th>
                            <td>{{ $team_detail->instagram_link }}</td>
                            </tr>
                            @endif
                            <tr><th> Image: </th>
                            <td>
                            <img style="height:250px;width: 180px;" src="{{ asset($team_detail->image) }}" class="img-responsve">
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

