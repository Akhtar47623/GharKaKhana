@extends('layouts.admin.app')
@section('title','Product')
@section('title' , 'Envelope')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex m-b-10 no-block">
            <h5 class="card-title m-b-0 align-self-center">Edit Product</h5>
            <div class="ml-auto text-light-blue">
              <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
              </ul>
            </div>
          </div>
          <form action="{{url('/admin/product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" value="{{ $product->product_title }}" name="product_name" >
                @error('product_name')
                <p class="error-message">**{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="product_name">Product Number:</label>
                <input type="text" class="form-control" id="product_num" value="{{ $product->product_num }}" name="product_num" >
                @error('product_num')
                <p class="error-message">**{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="category">Category:</label>
                <select class="form-control" id="category" value="{{ old('category') }}" name="product_belongs_to">
                  @foreach($categories as $index => $category)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="product_quantity">Quantity:</label>
                <input type="number" class="form-control " value="{{$product->product_quantity}}" name="product_quantity" id="product_quantity">
                @error('quantity')
                <p class="error-message">**{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="product_price">Product Price:</label>
              <input type="text" class="form-control " value="{{$product->product_price}}" name="product_price" id="product_price">
              @error('product_price')
                  <p class="error-message">**{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="product_description">Description:</label>
              <textarea class="form-control" id="product_description" name="product_description" rows="3">{{ $product->product_description }}</textarea>
              @error('product_description')
                  <p class="error-message">**{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Image:</label>
              <img style="max-width: 340px;" id="input-preview" src="{{ isset($product)?asset($product->image_path):asset('images/upload.jpg') }}">
              <div class="upload-photo">
                <input type="file" name="product_image" id="input-file-now" class="dropify" />
              </div>
            </div>
            <!-- <div>
                <img alt="Website Logo" style="width: 150px;height: 150px;" id="input-preview" src="{{ asset($product->image_path) }}">
            </div> -->

  <button class="btn btn-success pull-center" type="submit">Update</button>

</form>



                    </div>

                </div>

            </div>

            <!-- Column -->

        </div>

        <!-- ============================================================== -->

        <!-- End Info box -->

        <!-- chart box two -->

        <!-- ============================================================== -->

          @include('layouts.admin.includes.templates.footer')

    </div>

@endsection



@push('js')<!-- ============================================================== -->

<!-- This page plugins -->

<!-- ============================================================== -->

<!--c3 JavaScript -->

<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>

<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>

<!--jquery knob -->

<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>

<!--Sparkline JavaScript -->

<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>

<!--Morris JavaScript -->

<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>

<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>

<!-- Popup message jquery -->

<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>

<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>



<script>

    $(function () {

        $('#myTable').DataTable();

        var table = $('#example').DataTable({

            "columnDefs": [{

                "visible": false,

                "targets": 2

            }],

            "order": [

                [2, 'asc']

            ],

            "displayLength": 18,

            "drawCallback": function (settings) {

                var api = this.api();

                var rows = api.rows({

                    page: 'current'

                }).nodes();

                var last = null;

                api.column(2, {

                    page: 'current'

                }).data().each(function (group, i) {

                    if (last !== group) {

                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');

                        last = group;

                    }

                });

            }

        });

        // Order by the grouping

        $('#example tbody').on('click', 'tr.group', function () {

            var currentOrder = table.order()[0];

            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {

                table.order([2, 'desc']).draw();

            } else {

                table.order([2, 'asc']).draw();

            }

        });



    });

    $('#example23').DataTable({

        dom: 'Bfrtip',

        buttons: [

            'copy', 'csv', 'excel', 'pdf', 'print'

        ]

    });

</script>

<script>

    $(document).ready(function(){

  $('#product_description').summernote({

    placeholder: 'Type Product Details',

    tabsize: 2,

    height: 100

  });

  $('#product_color').select2();

  $('#product_size').select2();

  $('#product_weight').select2();

  $('#product_runSize').select2();

  $('#product_window').select2({

    tags: true,

  });

  $('#product_inside').select2({

    tags: true,

  });

  $('#product_coverage').select2({

    tags: true,

  });

  $('#product_flap').select2({

    tags: true,

  });

  $('#product_stock_color').select2({

    tags: true,

  });



  });



</script>

<script type="text/javascript">

    $(document).ready(function() {

      $(".addMoreSlider").click(function(){

          var cloneHTML = $(".clone").html();

          $(".sliderList").after(cloneHTML);

      });

      $("body").on("click",".removeSliderImage",function(){

          $(this).parent().parent(".phpicoder").remove();

      });

    });

</script>

<script type="text/javascript">

    $(document).ready(function() {

      $(".addmoreAttributes").click(function(){

          var cloneHTML = $(".attr").html();

          $(".next_div").before(cloneHTML);

      });

      $("body").on("click",".removeattrbutes",function(){

          $(this).parent().parent(".phpicoder").remove();

      });

    });

</script>

<script type="text/javascript">

  $(document).ready(function(){

    $('#product_no_of_windows').on('change', function()

  {

    // $('#window_options').css('display','none');

    $("#results").empty();

    var select_value = this.value;

    var html = '';

    for (i = 1; i <= select_value; i++) {

      html += '<hr>';

      html += $('#window_options').html();

    }

    $('#results').append(html);

    $('#results .product_window_type').attr('name', 'product_window_type[]');

    $('#results .product_window_length').attr('name', 'product_window_length[]');

    $('#results .product_window_height').attr('name', 'product_window_height[]');

    $('#results .product_space_from_left').attr('name', 'product_space_from_left[]');

    $('#results .product_space_from_bottom').attr('name', 'product_space_from_bottom[]');

  });



    $(".add_more_weight").click(function(){

      var weight_html = $(".weight_html").html();

      $('#weight').append('<div class="form-row added_weight_div">'+weight_html+'</div>');

      $('.added_weight_div .product_stock_weight').attr('name', 'product_stock_weight[]');

      $('.added_weight_div .product_stock_weight_price').attr('name', 'product_stock_weight_price[]');

    });

    $("body").on("click",".remove_weight_button",function(){

      $(this).parent().parent(".form-row").remove();

    });



    $(".add_more_color").click(function(){

      var color_html = $(".color_html").html();

      $('#color').append('<div class="form-row added_color_div">'+color_html+'</div>');

      $('.added_color_div .product_stock_color').attr('name', 'product_stock_color[]');

      $('.added_color_div .product_stock_color_price').attr('name', 'product_stock_color_price[]');

    });

    $("body").on("click",".remove_color_button",function(){

      $(this).parent().parent(".form-row").remove();

    });



    $(".add_inside_tint_button").click(function(){

      var tint_html = $(".tint_html").html();

      $('#tint').append('<div class="form-row added_tint_div">'+tint_html+'</div>');

      $('.added_tint_div .product_inside_tint').attr('name', 'product_inside_tint[]');

      $('.added_tint_div .product_inside_tint_price').attr('name', 'product_inside_tint_price[]');



    });

    $("body").on("click",".remove_tint_button",function(){

      $(this).parent().parent(".form-row").remove();

    });



    $(".add_flap_button").click(function(){

      var flap_html = $(".flap_html").html();

      $('#flap').append('<div class="form-row added_flap_div">'+flap_html+'</div>');

      $('.added_flap_div .product_flap_orientation').attr('name', 'product_flap_orientation[]');

      $('.added_flap_div .product_flap_orientation_price').attr('name', 'product_flap_orientation_price[]');

    });

    $("body").on("click",".remove_flap_button",function(){

      $(this).parent().parent(".form-row").remove();

    });



    $(".add_runsize_button").click(function(){

      var flap_html = $(".runsize_html").html();

      $('#runsize').append('<div class="form-row added_runsize_div">'+flap_html+'</div>');

      $('.added_runsize_div .product_runsize').attr('name', 'product_runsize[]');

      $('.added_runsize_div .product_runsize_price').attr('name', 'product_runsize_price[]');

    });

    $("body").on("click",".remove_runsize_button",function(){

      $(this).parent().parent(".form-row").remove();

    });



  });

</script>

<script type="text/javascript">

  function changeValue(cat)

  {

    var value = cat.value;

    if(value == 'jet')

    {

      $('.superjet').addClass('d-none');

      $('.jet').removeClass('d-none');

    }

    if (value == 'superjet') {      

      $('.superjet').removeClass('d-none');

      $('.jet').addClass('d-none');

    }

}

</script>





<!-- ============================================================== -->

<!-- Style switcher -->

<!-- ============================================================== -->

<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>

<!-- SUMMER NOTE SCRIPT -->

<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>

@endpush

