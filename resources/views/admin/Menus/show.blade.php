@extends('layouts.admin.app')
@section('title', 'Menu Details')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Menu Details</h4>
          <hr>

          <div class="mb-3">
              <h5>Day:</h5>
              <p>{{ ucfirst($menu->day) }}</p>
          </div>

          <div class="mb-3">
              <h5>Meal Time:</h5>
              <p>{{ ucfirst($menu->meal_time) }}</p>
          </div>

          <h3>Foods in this Menu</h3>

          @if($menu->foods->count())
              <div class="row">
                  @foreach($menu->foods as $food)
                      <div class="col-4">
                          <div class="card mb-3">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $food->name }}</h5>
                                  <p><strong>Meal Type:</strong> {{ $food->pivot->meal_type ?? 'N/A' }}</p>
                                  <p><strong>Description:</strong> {{ $food->short_desc ?? 'No description available.' }}</p>
                                  <p><strong>Price:</strong> ${{ number_format($food->price, 2) }}</p>
                                  <p><strong>Category:</strong> 
                                      {{ $food->categories->pluck('name')->join(', ') ?? 'N/A' }}
                                  </p>

                                  @if($food->image)
                                      <img src="{{ asset($food->image) }}" alt="{{ $food->name }}" class="img-fluid" style="max-width: 250px;">
                                  @else
                                      <p>No image available.</p>
                                  @endif
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          @else
              <p>No foods assigned to this menu yet.</p>
          @endif

          <div class="d-flex justify-content-end mt-4 gap-2">
              <a href="{{ route('menus.index') }}" class="btn btn-secondary">Back to Menu List</a>
              <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary">Edit Menu</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.admin.templates.footer')
@endsection
