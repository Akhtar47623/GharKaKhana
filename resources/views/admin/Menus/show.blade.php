@extends('layouts.admin.app')
@section('title', 'Menus')
@section('content')
<div class="container">
    <h1>Menu Details - #{{ $menu->id }}</h1>

    <div class="mb-3">
        <strong>Day:</strong> {{ ucfirst($menu->day) }}
    </div>

    <div class="mb-3">
        <strong>Meal Time:</strong> {{ ucfirst($menu->meal_time) }}
    </div>

    <div class="mb-3">
        <strong>Food Name:</strong> {{ $menu->food_name }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> <p>{{ $menu->description }}</p>
    </div>

    <div class="mb-3">
        <strong>Price:</strong> ${{ number_format($menu->price, 2) }}
    </div>

    <div class="mb-3">
        <strong>Category:</strong> {{ $menu->category->name ?? 'N/A' }}
    </div>

    <div class="mb-3">
        <strong>Food Image:</strong><br>
        @if($menu->food_image)
            <img src="{{ asset('storage/'.$menu->food_image) }}" alt="Food Image" width="250">
        @else
            No image available
        @endif
    </div>

    {{-- Add ingredients, toppings, drinks display here if stored --}}

    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Back to Menu List</a>
    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary">Edit Menu</a>
</div>
@endsection
