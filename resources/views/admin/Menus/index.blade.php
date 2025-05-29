@extends('layouts.admin.app')
@section('title', 'Menus')
@section('content')
<div class="container">
    <h1>Menus List</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Add New Menu</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Day</th>
                <th>Meal Time</th>
                <th>Food Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->day }}</td>
                <td>{{ ucfirst($menu->meal_time) }}</td>
                <td>{{ $menu->food_name }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
