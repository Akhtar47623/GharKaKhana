@extends('layouts.admin.app')
@section('title', 'Menus')
@section('content')
<div class="container">
    <h1>Edit Menu #{{ $menu->id }}</h1>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="day" class="form-label">Day</label>
            <select name="day" id="day" class="form-control" required>
                @foreach(['sunday','monday','tuesday','wednesday','thursday','friday','saturday'] as $day)
                <option value="{{ $day }}" {{ $menu->day == $day ? 'selected' : '' }}>{{ ucfirst($day) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="meal_time" class="form-label">Meal Time</label>
            <select name="meal_time" id="meal_time" class="form-control" required>
                <option value="breakfast" {{ $menu->meal_time == 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                <option value="lunch" {{ $menu->meal_time == 'lunch' ? 'selected' : '' }}>Lunch</option>
                <option value="dinner" {{ $menu->meal_time == 'dinner' ? 'selected' : '' }}>Dinner</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="food_name" class="form-label">Food Name</label>
            <input type="text" name="food_name" id="food_name" class="form-control" value="{{ old('food_name', $menu->food_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" required>{{ old('description', $menu->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $menu->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="food_image" class="form-label">Food Image</label><br>
            @if($menu->food_image)
                <img src="{{ asset('storage/'.$menu->food_image) }}" alt="Food Image" width="150" class="mb-2"><br>
            @endif
            <input type="file" name="food_image" id="food_image" class="form-control" accept="image/*">
            <small class="text-muted">Leave blank to keep current image</small>
        </div>

        {{-- Ingredients, toppings, drinks input can be added here if needed --}}

        <button type="submit" class="btn btn-primary">Update Menu</button>
    </form>
</div>
@endsection
