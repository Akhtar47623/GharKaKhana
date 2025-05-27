    @extends('layouts.admin.app')
@section('title', 'Slider Management')
@push('before-css')
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Update Slider</h5>
                        </div>
                        <form action="{{url('/panel/admin/privacy-slider/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label>Image :</label>
                                <img alt="Website Logo" style="max-width: 340px;" id="input-preview" src="{{ isset($sliders)?asset($sliders->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="input-file-now" class="dropify" />
                                    @error('image_path')
                                    <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-success pull-center" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin.includes.templates.footer')
    </div>
@endsection
@push('js')
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#description').summernote({
            tabsize: 2,
            height: 100
        });
    });
</script>
@endpush
