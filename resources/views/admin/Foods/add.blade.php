@extends('layouts.admin.app')
@section('title', 'Foods')
@section('content')
        <div class="content-wrapper">
          <div class="row">
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Food</h4>
                  <p class="card-description">
                   <hr>
                  </p>
                  <form class="forms-sample" action="{{route('foods.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Food Name</label>
                                <input type="text" name="name" class="form-control" id="product_name" placeholder="name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="categories">Categories:</label>
                    <select name="categories[]" id="categories" multiple class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ isset($food) && $food->categories->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="short_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label class="control-label">Upload File</label>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Choose an image file or drag it here.</p>
                                    </div>
                                    <input type="file" name="images[]" class="dropzone">
                                </div>
                                <div class="preview-zone hidden">
                                    <div class="box box-solid ">
                                    <div class="box-body d-flex"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                       <a href="{{ route('foods.index') }}" class="btn btn-light border">Cancel</a>
                      <button type="submit" class="btn btn-success mr-2 text-white">Add</button>
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

        const $wrapperZone = $input.closest('.dropzone-wrapper');
        const $previewZone = $wrapperZone.siblings('.preview-zone');
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
                            position:absolute;
                            top: -8px;
                            right: -8px;
                            background: red;
                            color: white;
                            border: none;
                            border-radius: 50%;
                            width: 20px;
                            height: 20px;
                            font-size: 14px;
                            cursor: pointer;
                        ">&times;</button>
                    </div>
                `);

                $preview.find('.remove-image').on('click', function () {
                    const $previewWrapper = $(this).closest('.img-preview-wrapper');
                    $previewWrapper.remove();

                    if ($boxZone.children().length === 0) {
                        $previewZone.addClass('hidden');

                        // Reset input so same image can be selected again
                        const $dropzone = $wrapperZone.find('.dropzone');
                        resetInput($dropzone);
                    }
                });

                $boxZone.append($preview);
            };
            reader.readAsDataURL(file);
        }
    }

    function resetInput($input) {
        const $newInput = $input.clone().val('');
        $input.replaceWith($newInput);
        // Re-bind the change event
        $newInput.on('change', function () {
            readFiles($(this));
        });
    }

    $(document).ready(function () {
        $('.dropzone').on('change', function () {
            readFiles($(this));
        });

        $('.dropzone-wrapper').on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        $('.dropzone-wrapper').on('dragleave drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
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

