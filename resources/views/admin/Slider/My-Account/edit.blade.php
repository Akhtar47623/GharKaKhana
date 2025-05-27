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
                        <form action="{{url('/panel/admin/my-account-slider/'.$my_account_sliders->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                           <!--  @if($my_account_sliders->title != null)
                            <div class="form-group">
                                <label for="title">Title :</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$my_account_sliders->title}}">
                            </div>
                            @endif
                             @if($my_account_sliders->sub_title != null)
                            <div class="form-group">
                                <label for="sub_title">Sub Title :</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$my_account_sliders->sub_title}}">
                            </div>
                            @endif
                            @if($my_account_sliders->bottom_text != null)
                            <div class="form-group">
                                <label for="bottom_text">Bottom Text :</label>
                                <textarea class="form-control" id="bottom_text" name="bottom_text" rows="3">{{$my_account_sliders->bottom_text}}</textarea>
                            </div>
                            @endif
                            @if($my_account_sliders->description != null)
                            <div class="form-group">
                                <label for="sub_text">Description :</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{$my_account_sliders->description}}</textarea>
                            </div>
                            @endif
                            @if($my_account_sliders->button_name != null)
                            <div class="form-group">
                                <label for="sub_text">Button Name :</label>
                                <input type="text" class="form-control" id="button_name" name="button_name" value="{{$my_account_sliders->button_name}}">
                            </div>
                            @endif -->
                          <!--   @if($my_account_sliders->page_name != null)
                              <div class="form-group">
                            <label for="page_name">Page Name:</label><br>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="page_name">
                                <option selected>{{$my_account_sliders->page_name}}</option>
                                <option name="page_name" value="HomePage">HomePage</option>
                                <option name="page_name" value="Comment">Comment</option>
                                <option name="page_name" value="Product">Product</option>
                                <option name="page_name" value="Product Category">Product Category</option>
                                <option name="page_name" value="Product Detail">Product Detail</option>
                                <option name="page_name" value="Sale">Sale</option>
                                <option name="page_name" value="Contact Us">Contact Us</option>
                                <option name="page_name" value="Cart">Cart</option>
                                <option name="page_name" value="Checkout">Checkout</option>
                                <option name="page_name" value="My Account">My Account</option>
                            </select>
                            @error('page_name')
                            <p class="error-message">**{{ $message }}</p>
                            @enderror
                        </div>
                            @endif -->
                            <div class="form-group">
                                <label>Image :</label>
                                <img alt="Website Logo" style="max-width: 340px;" id="input-preview" src="{{ isset($my_account_sliders)?asset($my_account_sliders->image_path):asset('images/upload.jpg') }}">
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
