@extends('layouts.admin.app')
@section('title', 'Favicon')
@push('before-css')
    <link rel="stylesheet" href="{{asset('plugins/vendors/dropify/dist/css/dropify.min.css')}}">
@endpush
@section('content')
<div class="container-fluid logo">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('favicon')}}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h3>Favicon Management</h3>
                        <div class="clearfix"></div>
                        <hr>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="row m-b-15">
                            <div class="col-lg-4 col-md-4">
                                <img alt="" style="height: 100px;width: 310px;" class="img-responsive" id="input-preview" src="{{ asset(getImage('favicon')) }}">
                                <div class="upload-photo">
                                    <input type="file" name="image" id="input-file-now" class="dropify" />
                                </div>
                            </div>
                        </div>
                        <div class="row m-b-15">
                            <div class="col-lg-4 col-md-4 text-right">
                                <button type="submit" class="btn btn-lg btn-success text-right">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
  <script src="{{asset('plugins/vendors/dropify/dist/js/dropify.min.js')}}"></script>

  <script>
      $(function() {
          $('.dropify').dropify();
          var drEvent = $('#input-file-events').dropify();

          drEvent.on('dropify.beforeClear', function(event, element) {
              return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
          });

          drEvent.on('dropify.afterClear', function(event, element) {
              alert('File deleted');
          });

          var drDestroy = $('#input-file-to-destroy').dropify();
          drDestroy = drDestroy.data('dropify')
          $('#toggleDropify').on('click', function(e) {
              e.preventDefault();
              if (drDestroy.isDropified()) {
                  drDestroy.destroy();
              } else {
                  drDestroy.init();
              }
          })
      });
  </script>
@endpush
