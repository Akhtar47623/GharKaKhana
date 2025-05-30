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
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" style="border:none; background:none;">
                                    <i class="fa fa-trash text-danger ms-2"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('layouts.admin.templates.footer')
@endsection
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new DataTable('#example1');
    });
</script>
@endpush
