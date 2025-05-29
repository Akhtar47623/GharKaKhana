@extends('layouts.admin.app')
@section('title', 'Menus')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Menu</h4>
          <p class="card-description"><hr></p>
          <form class="forms-sample" action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

           <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="day">Day</label>
                        <select name="day" id="day" class="form-control" required>
                            <option value="">Select Day</option>
                            @foreach(['sunday','monday','tuesday','wednesday','thursday','friday','saturday'] as $day)
                            <option value="{{ $day }}">{{ ucfirst($day) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="meal_time">Meal Time</label>
                        <select name="meal_time" id="meal_time" class="form-control" required>
                            <option value="">Select Meal Time</option>
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="food_name">Food Name</label>
                        <input type="text" name="food_name" class="form-control" id="food_name" placeholder="Enter food name" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" rows="4" name="description" required></textarea>
            </div>

            <div class="form-group">
              <label for="category_id">Category</label>
              <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-12">
                  <label class="control-label">Upload Food Image</label>
                  <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                      <i class="glyphicon glyphicon-download-alt"></i>
                      <p>Choose an image file or drag it here.</p>
                    </div>
                    <input type="file" name="food_image" class="dropzone" accept="image/*" required>
                  </div>
                  <div class="preview-zone hidden">
                    <div class="box box-solid">
                      <div class="box-body d-flex"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Add-on inputs like ingredients/toppings/drinks can be added below if needed --}}

            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('menus.index') }}" class="btn btn-light border">Cancel</a>
              <button type="submit" class="btn btn-success mr-2 text-white">Create Menu</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.admin.templates.footer')
@endsection

@push('js')
<script>
    function readFiles($input) {
      const files = $input.prop('files');
      if (!files || files.length === 0) return;

      const $wrapperZone = $input.parent();
      const $previewZone = $wrapperZone.parent().find('.preview-zone');
      const $boxZone = $previewZone.find('.box-body');

      $wrapperZone.removeClass('dragover');
      $previewZone.removeClass('hidden');

      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (!file.type.startsWith('image/')) continue;

        const reader = new FileReader();
        reader.onload = function (e) {
          const $preview = $(`
            <div class="img-preview-wrapper" style="position:relative; display:inline-block; margin:5px;">
              <img src="${e.target.result}" width="120" height="120" style="border:1px solid #ccc; border-radius:4px;">
              <button type="button" class="remove-image" style="
                position:absolute; top:-8px; right:-8px; background:red; color:white; border:none;
                border-radius:50%; width:20px; height:20px; font-size:14px; cursor:pointer;">&times;</button>
            </div>
          `);

          $preview.find('.remove-image').on('click', function () {
            $(this).closest('.img-preview-wrapper').remove();
            if ($boxZone.children().length === 0) $previewZone.addClass('hidden');
          });

          $boxZone.append($preview);
        };
        reader.readAsDataURL(file);
      }
    }

    function resetInput($el) {
      const $form = $('<form>').append($el.clone());
      $el.replaceWith($form.find('input'));
    }

    $(document).ready(function () {
      $('.dropzone').on('change', function () {
        readFiles($(this));
      });

      $('.dropzone-wrapper').on('dragover', function (e) {
        e.preventDefault(); e.stopPropagation(); $(this).addClass('dragover');
      }).on('dragleave drop', function (e) {
        e.preventDefault(); e.stopPropagation(); $(this).removeClass('dragover');
      });

      $('.remove-preview').on('click', function () {
        const $previewZone = $(this).closest('.preview-zone');
        const $boxZone = $previewZone.find('.box-body');
        const $dropzone = $(this).closest('.form-group').find('.dropzone');

        $boxZone.empty();
        $previewZone.addClass('hidden');
        resetInput($dropzone);
      });
    });
</script>
@endpush
