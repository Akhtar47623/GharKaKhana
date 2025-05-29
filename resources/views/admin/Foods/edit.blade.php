@extends('layouts.admin.app')
@section('title', 'Edit Food')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Food</h4>
          <hr>

          <form class="forms-sample" action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="product_name">Food Name</label>
              <input type="text" name="name" class="form-control" id="product_name" placeholder="name" value="{{ old('name', $food->name) }}">
            </div>

            <div class="form-group">
              <label for="exampleTextarea1">Textarea</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4" name="short_desc">{{ old('short_desc', $food->short_desc) }}</textarea>
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
                  <div class="preview-zone {{ $food->image ? '' : 'hidden' }}">
                    <div class="box box-solid">
                      <div class="box-body d-flex">
                        @if ($food->image)
                          <div class="img-preview-wrapper" style="position:relative; display:inline-block; margin:5px;">
                            <img src="{{ asset($food->image) }}" width="120" height="120" style="border:1px solid #ccc; border-radius:4px;">
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
                              cursor: pointer;">&times;</button>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('foods.index') }}" class="btn btn-light border">Cancel</a>
              <button type="submit" class="btn btn-success mr-2">Update</button>
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
                            cursor: pointer;">&times;</button>
                    </div>
                `);

                $preview.find('.remove-image').on('click', function () {
                    $(this).closest('.img-preview-wrapper').remove();
                    if ($boxZone.children().length === 0) {
                        $previewZone.addClass('hidden');
                    }
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

   $('.dropzone').on('change', function () {
    const $input = $(this);
    const $previewZone = $input.closest('.form-group').find('.preview-zone');
    const $boxZone = $previewZone.find('.box-body');
    $boxZone.empty();
    readFiles($input);
});
</script>
@endpush
