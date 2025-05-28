@extends('layouts.admin.app')
@section('title', 'Services')
@section('content')
        <div class="content-wrapper">
            <div class="table-header">
                <div class="d-flex justify-content-end">
                    <a href="{{route('foods.create')}}" class="btn btn-success">Add</a>
                </div>
            </div>
         <table id="example" class="table table-striped" style="border-radius: 1px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Short Desc</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($foods as $key => $food)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><img src="{{ asset($food->image) }}" alt="food" width="60"></td>
                <td>{{ $food->name }}</td>
                <td>{{ $food->short_desc }}</td>
                <td>
                    <a href="{{ route('foods.edit', $food->id) }}" title="Edit">
                        <i class="fas fa-edit text-primary"></i>
                    </a>
                    <a href="{{ route('foods.show', $food->id) }}" title="View" class="ms-2">
                        <i class="fas fa-eye text-success"></i>
                    </a>
                    <form action="{{ route('foods.destroy', $food->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" style="border:none; background:none;">
                            <i class="fas fa-trash-alt text-danger ms-2"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

            
        </tbody>
         <tfoot>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Short Desc</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
        </div>
@endsection
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new DataTable('#example');
    });
</script>
@endpush

