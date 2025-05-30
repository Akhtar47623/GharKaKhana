@extends('layouts.admin.app')
@section('title', 'Menus')

@section('content')
<div class="content-wrapper">
    <div class="table-header">
        <div class="d-flex justify-content-end">
            <a href="{{ route('menus.create') }}" class="btn btn-success text-white">Add New Menu</a>
        </div>
    </div>

    <table id="example1" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Day</th>
                <th>Meals & Foods</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus->groupBy('day') as $day => $dayMenus)
                @php
                    $mealTypes = [];
                    $firstMenu = $dayMenus->first();

                    foreach ($dayMenus as $menu) {
                        foreach ($menu->foods as $food) {
                            $meal = ucfirst($food->pivot->meal_type ?? 'N/A');
                            $mealTypes[$meal][] = $food;
                        }
                    }
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst($day) }}</td>
                    <td>
                        @foreach($mealTypes as $mealType => $foods)
                            <strong>{{ $mealType }}:</strong><br>
                            <ul style="list-style: none; padding-left: 0;">
                                @foreach($foods as $food)
                                    <li style="display:flex; align-items:center; margin-bottom: 5px;">
                                        <img src="{{ asset($food->image) }}" alt="{{ $food->name }}" style="width:40px; height:40px; object-fit: cover; margin-right: 10px; border-radius: 4px;">
                                        <span>{{ $food->name }} — <strong>${{ number_format($food->price, 2) }}</strong></span>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('menus.edit', $firstMenu->id) }}" title="Edit">
                            <i class="fa fa-edit text-primary"></i>
                        </a>
                         <a href="{{ route('menus.show', $firstMenu->id) }}" title="Edit">
                            <i class="fa fa-eye text-success mx-2"></i>
                        </a>
                       <form action="{{ route('menus.destroy', $firstMenu->id) }}" method="POST" style="display:inline;">
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
        Are you sure you want to delete this item? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="modalConfirmBtn">Delete</button>
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
