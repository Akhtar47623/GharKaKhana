@extends('layouts.admin.app')
@section('title', 'Menu Details')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Menu Details - #{{ $menu->id }}</h1>

    <div class="mb-3">
        <h5>Day:</h5>
        <p>{{ ucfirst($menu->day) }}</p>
    </div>

    <div class="mb-3">
        <h5>Meal Time:</h5>
        <p>{{ ucfirst($menu->meal_time) }}</p>
    </div>

    <div class="mb-3">
        <h5>Food Name:</h5>
        <p>{{ $menu->food_name }}</p>
    </div>

    <div class="mb-3">
        <h5>Description:</h5>
        <p>{{ $menu->description ?? 'No description available.' }}</p>
    </div>

    <div class="mb-3">
        <h5>Price:</h5>
        <p>${{ number_format($menu->price, 2) }}</p>
    </div>

    <div class="mb-3">
        <h5>Category:</h5>
        <p>{{ $menu->category->name ?? 'N/A' }}</p>
    </div>

    <div class="mb-3">
        <h5>Food Image:</h5>
        @if($menu->food_image)
            <img src="{{ asset('storage/'.$menu->food_image) }}" alt="Food Image" class="img-fluid" style="max-width: 250px;">
        @else
            <p>No image available.</p>
        @endif
    </div>

    {{-- Uncomment and add these if you store ingredients, toppings, drinks --}}
    {{--
    <div class="mb-3">
        <h5>Ingredients:</h5>
        <ul>
            @foreach($menu->ingredients as $ingredient)
                <li>{{ $ingredient->name }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mb-3">
        <h5>Toppings:</h5>
        <ul>
            @foreach($menu->toppings as $topping)
                <li>{{ $topping->name }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mb-3">
        <h5>Drinks:</h5>
        <ul>
            @foreach($menu->drinks as $drink)
                <li>{{ $drink->name }}</li>
            @endforeach
        </ul>
    </div>
    --}}

    <a href="{{ route('menus.index') }}" class="btn btn-secondary me-2">Back to Menu List</a>
    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary">Edit Menu</a>
</div>
@endsection
