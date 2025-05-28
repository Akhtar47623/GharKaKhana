@extends('layouts.admin.app')
@section('title','Product')
@section('content')
<style type="text/css">
    tr, td{
        text-transform: capitalize;
    }
</style>
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Product # {{$product->id}}</h3>
                    <a href="{{url('/admin/product')}}" class="btn waves-effect waves-light btn-rounded btn-primary float-right">Back</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>Name :</th>
                                    <td>{{ $product->product_title }}</td>
                                </tr>
                                <tr>
                                    <th>Category :</th>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Price :</th>
                                    <td>${{ $product->product_price }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity :</th>
                                    <td>{{ $product->product_quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Product Description</th>
                                    <td><?= html_entity_decode($product->product_description) ?></td>
                                </tr>
                                <tr>
                                    <th>Product Image</th>
                                    <td><img src="{{ asset($product->image_path) }}" style="height: 150px;width: 150px;" class="img-responsive"></td>
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