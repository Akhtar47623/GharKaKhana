@extends('layouts.admin.app')



@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Section # {{$HomeSection->id}}</h3>
                    <a class="btn btn-success pull-right" href="{{ url('/admin/home_section') }}">
                        <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>

                        <div class="clearfix"></div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $HomeSection->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Title </th>
                                        <td> {{ $HomeSection->heading }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td><?= html_entity_decode($HomeSection->description) ?></td>
                                    </tr>
                                    <tr>
                                        <th> First Button Name And Link  </th>
                                        <td> <a href="{{ $HomeSection->button1link }}">{{ $HomeSection->button1 }}</a> </td>
                                    </tr>
                                    <tr>
                                        <th> Second Button Name And Link  </th>
                                        <td><a href="{{ $HomeSection->button2link }}">{{ $HomeSection->button2 }}</a> </td>
                                    </tr>
                                    <tr>
                                        <th> Third Button Name And Link  </th>
                                        <td> <a href="{{ $HomeSection->button3link }}">{{ $HomeSection->button3 }}</a></td>
                                    </tr>
                                    <tr>
                                        <th> Forth Button Name And Link  </th>
                                        <td> <a href="{{ $HomeSection->button4link }}">{{ $HomeSection->button4 }}</a></td>
                                    </tr>
                                    <tr>
                                        <th> Image </th>
                                        <td><img style="height: 300px;width: 300px;" src="{{ asset($HomeSection->image_path) }}" class="img-responsive"></td>
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



