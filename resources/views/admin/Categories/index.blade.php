@extends('layouts.admin.app')
@section('title', 'Categories')
@section('content')
    <div class="content-wrapper">
        <div class="table-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('categories.create') }}" class="btn btn-success text-white">Add Category</a>
            </div>
        </div>

        <table id="example1" class="table table-striped" style="border-radius: 1px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" title="Edit">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                            <a href="{{ route('categories.show', $category->id) }}" title="View" class="ms-2">
                                <i class="fa fa-eye text-success"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-link p-0 m-0 align-baseline delete-btn" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                                    <i class="fa fa-trash text-danger ms-2"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger text-white" id="modalConfirmBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

@include('layouts.admin.templates.footer')
@endsection
@push('js')
<script>
      $(document).ready(function () {
        $('#example1').DataTable();

        let formToSubmit;
        $('.delete-btn').on('click', function () {
            formToSubmit = $(this).closest('form');
        });
        $('#modalConfirmBtn').on('click', function () {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });
    });
</script>
@endpush
