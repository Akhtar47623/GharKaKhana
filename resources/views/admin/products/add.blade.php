@extends('layouts.admin.app')
@section('title', 'Services')
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
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="product_name">Food Name</label>
                      <input type="text" class="form-control" id="product_name" placeholder="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                  <div class="form-group">
                    <label class="form-label">Upload Images</label>

                    <div class="upload-dropzone" id="dropzone">
                      <p>Drag & Drop images here or click to upload</p>
                      <input type="file" name="img[]" id="fileInput" multiple accept="image/*" style="display:none;">
                    </div>

                    <div id="preview" class="preview-container"></div>
                  </div>
                    <div class="d-flex justify-content-end gap-2">
                      <button class="btn btn-light border">Cancel</button>
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script>
  $(document).ready(function () {
    const dropzone = $('#dropzone');
    const fileInput = $('#fileInput');
    const preview = $('#preview');

    dropzone.on('click', function () {
      fileInput.trigger('click');
    });

    dropzone.on('dragover', function (e) {
      e.preventDefault();
      e.stopPropagation();
      dropzone.addClass('dragover');
    });

    dropzone.on('dragleave', function (e) {
      e.preventDefault();
      e.stopPropagation();
      dropzone.removeClass('dragover');
    });

    dropzone.on('drop', function (e) {
      e.preventDefault();
      e.stopPropagation();
      dropzone.removeClass('dragover');
      const files = e.originalEvent.dataTransfer.files;
      handleFiles(files);
    });

    fileInput.on('change', function () {
      handleFiles(this.files);
    });

    function handleFiles(files) {
      preview.empty();
      $.each(files, function (i, file) {
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function (e) {
            const img = $('<img>').attr('src', e.target.result);
            preview.append(img);
          };
          reader.readAsDataURL(file);
        }
      });
    }
  });
</script>

@endpush