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
                        <form action="{{url('admin/home-slider/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            @if($sliders->title != null)
                            <div class="form-group">
                                <label for="title">Title :</label>
                                <textarea type="text" class="form-control" id="title" name="title" value="">{{$sliders->title}}</textarea>
                            </div>
                            @endif
                            
                        
                            @if($sliders->description != null)
                            <div class="form-group">
                                <label for="Short Description">Short Description :</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{$sliders->description}}</textarea>
                            </div>
                            @endif
                            @if($sliders->button_name != null)
                            <div class="form-group">
                                <label for="sub_text">Button Name :</label>
                                <input type="text" class="form-control" id="button_name" name="button_name" value="{{$sliders->button_name}}">
                            </div>
                            @endif 

                          
                    <!--         @if($sliders->page_name != null)
                              <div class="form-group">
                            <label for="page_name">Page Name:</label><br>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="page_name">
                                <option selected>{{$sliders->page_name}}</option>
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
                                <img alt="Website Logo" style="max-width: 340px;" id="input-preview" src="{{ isset($sliders)?asset($sliders->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="input-file-now" class="dropify" />
                                    @error('image_path')
                                    <p class="error-message text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group">
                             <label for="occupation">Status:</label>
                              @if($sliders->status == 0)
                              <select class="form-control" aria-label="Default select example" name="status">
                                <option value="0" selected class="form-control">Inactive</option>
                                <option value="1" class="form-control">Active</option>
                              </select>
                              @elseif($sliders->status == 1)
                              <select class="form-control" aria-label="Default select example" name="status">
                                <option value="1" selected class="form-control">Active</option>
                                <option value="0" class="form-control">InActive</option>
                              </select>
                               @endif
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
         $('#title').summernote({
            tabsize: 2,
            height: 50
        });
    });
</script>
@endpush
