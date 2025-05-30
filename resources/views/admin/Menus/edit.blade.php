@extends('layouts.admin.app')
@section('title', 'Edit Menu')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Menu</h4>
                    <hr>

                    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div id="meals-wrapper">
                            @foreach($menu->menuItems->groupBy(function($item) {
                                return $item->meal_type . '||' . $item->menu->day;
                            }) as $key => $group)
                                @php
                                    $mealIndex = $loop->index;
                                    // day is same for all in this group, take from first
                                    $dayValue = $group->first()->menu->day;
                                    $mealTime = $group->first()->meal_type;
                                    $foodIds = $group->pluck('food_id')->toArray();
                                @endphp
                                <div class="meal-group mb-4 border p-3 rounded" data-index="{{ $mealIndex }}">
                                    <div class="row">
                                        <div class="form-group col-md-6 day-select-group">
                                            @if($mealIndex == 0)
                                                <label>Day</label>
                                                <select name="meals[0][day]" class="form-control day-selector" required>
                                                    <option value="">Select Day</option>
                                                    @foreach(['sunday','monday','tuesday','wednesday','thursday','friday','saturday'] as $day)
                                                        <option value="{{ $day }}" {{ $day === $dayValue ? 'selected' : '' }}>
                                                            {{ ucfirst($day) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input type="hidden" name="meals[{{ $mealIndex }}][day]" value="{{ $dayValue }}">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Meal Time</label>
                                            <select name="meals[{{ $mealIndex }}][meal_time]" class="form-control" required>
                                                <option value="">Select Meal Time</option>
                                                <option value="breakfast" {{ $mealTime == 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                                                <option value="lunch" {{ $mealTime == 'lunch' ? 'selected' : '' }}>Lunch</option>
                                                <option value="dinner" {{ $mealTime == 'dinner' ? 'selected' : '' }}>Dinner</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Foods</label>
                                        <div class="row">
                                            @foreach($foods as $food)
                                                <div class="col-md-2 mb-3">
                                                    <div class="border" style="border-radius: 0.5rem;">
                                                        <label for="foodCheck{{ $mealIndex }}_{{ $food->id }}" class="food-card d-block p-2 rounded position-relative {{ in_array($food->id, $foodIds) ? 'selected' : '' }}">
                                                            <input
                                                                type="checkbox"
                                                                name="meals[{{ $mealIndex }}][food_ids][]"
                                                                value="{{ $food->id }}"
                                                                class="food-checkbox"
                                                                id="foodCheck{{ $mealIndex }}_{{ $food->id }}"
                                                                {{ in_array($food->id, $foodIds) ? 'checked' : '' }}>
                                                            <div class="text-center pointer-events-none">
                                                                <img src="{{ asset($food->image) }}" alt="{{ $food->name }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                                                <h6 class="mt-2 mb-1">{{ $food->name }}</h6>
                                                                <p class="mb-1"><strong>Price:</strong> ${{ number_format($food->price, 2) }}</p>
                                                                <p class="mb-2"><strong>Category:</strong> {{ $food->categories->pluck('name')->join(', ') ?: 'N/A' }}</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-sm remove-meal mt-2 {{ $mealIndex == 0 ? 'd-none' : '' }}">Remove</button>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3 text-end">
                            <button type="button" id="add-meal" class="btn btn-primary">+ Add Another Meal</button>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('menus.index') }}" class="btn btn-light border">Cancel</a>
                            <button type="submit" class="btn btn-success text-white">Update Menu</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.admin.templates.footer')
@endsection

@push('css')
<style>
.food-card {
    border: 2px solid #ccc;
    transition: border-color 0.3s, box-shadow 0.3s;
    user-select: none;
    cursor: pointer;
    position: relative;
}

/* Make checkbox cover entire label but invisible and clickable */
.food-checkbox {
    opacity: 0;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    cursor: pointer;
    z-index: 2;
}

/* Prevent inner div from blocking clicks */
.food-card > div.pointer-events-none {
    pointer-events: none;
}

.food-card:hover {
    border-color: #007bff;
}

.food-card.selected {
    border-color: #28a745 !important;
    box-shadow: 0 0 10px rgba(40, 167, 69, 0.6);
}
</style>
@endpush

@push('js')
@php
    $groupedMenuItems = $menu->menuItems->groupBy(function ($item) {
        return $item->meal_type . '||' . $item->menu->day;
    });
    $index = $groupedMenuItems->count();
@endphp

<script>
      let index = @json($index);
    $(document).ready(function () {

        function updateMealGroups() {
            $('#meals-wrapper .meal-group').each(function (i) {
                $(this).attr('data-index', i);

                if (i === 0) {
                    // Ensure day select visible
                    if ($(this).find('input[name^="meals"][type="hidden"][name$="[day]"]').length) {
                        const hiddenDayVal = $(this).find('input[name^="meals"][type="hidden"][name$="[day]"]').val();
                        $(this).find('input[name^="meals"][type="hidden"][name$="[day]"]').remove();

                        const dayOptions = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
                        let selectHtml = '<select name="meals[0][day]" class="form-control day-selector" required>';
                        selectHtml += '<option value="">Select Day</option>';
                        dayOptions.forEach(day => {
                            selectHtml += `<option value="${day}" ${day === hiddenDayVal ? 'selected' : ''}>${day.charAt(0).toUpperCase() + day.slice(1)}</option>`;
                        });
                        selectHtml += '</select>';

                        const dayFormGroup = $('<div class="form-group col-md-6"></div>').append('<label>Day</label>').append(selectHtml);

                        $(this).find('.row > .form-group.col-md-6').first().before(dayFormGroup);
                    }
                    $(this).find('.remove-meal').addClass('d-none');
                } else {
                    // Hide day select, show hidden input
                    const daySelect = $(this).find('select.day-selector');
                    if (daySelect.length) {
                        const selectedDay = daySelect.val();
                        daySelect.closest('.form-group').remove();
                        if ($(this).find(`input[name="meals[${i}][day]"]`).length === 0) {
                            $(this).prepend(`<input type="hidden" name="meals[${i}][day]" value="${selectedDay}">`);
                        }
                    }
                    $(this).find('.remove-meal').removeClass('d-none');
                }

                $(this).find('input, select, textarea').each(function () {
                    const name = $(this).attr('name');
                    if (name) {
                        if(name.includes('food_ids')) {
                            const newName = name.replace(/\[\d+\]/, `[${i}]`);
                            $(this).attr('name', newName);
                        } else if (name.includes('[day]')) {
                            // handled above
                        } else {
                            const newName = name.replace(/\[\d+\]/, `[${i}]`);
                            $(this).attr('name', newName);
                        }
                    }
                    if ($(this).is(':checkbox')) {
                        const oldId = $(this).attr('id');
                        if (oldId) {
                            const parts = oldId.split('_');
                            const foodId = parts[1];
                            const newId = `foodCheck${i}_${foodId}`;
                            $(this).attr('id', newId);
                        }
                    }
                });

                $(this).find('label.food-card').each(function () {
                    const oldFor = $(this).attr('for');
                    if (oldFor) {
                        const parts = oldFor.split('_');
                        const foodId = parts[1];
                        const newFor = `foodCheck${i}_${foodId}`;
                        $(this).attr('for', newFor);
                    }
                });
            });
        }

        // Add new meal group
        $('#add-meal').click(function () {
            let firstMeal = $('#meals-wrapper .meal-group').first();
            if (!firstMeal.length) {
                alert('Please add first meal manually.');
                return;
            }
            let clone = firstMeal.clone(true, true);

            // Reset values
            clone.attr('data-index', index);
            clone.find('select.day-selector').remove(); // Day select only on first group
            clone.find('.day-select-group label').text('');
            clone.prepend(`<input type="hidden" name="meals[${index}][day]" value="${$('#meals-wrapper .meal-group').first().find('select.day-selector').val()}">`);

            clone.find('select[name^="meals"][name$="[meal_time]"]').val('');
            clone.find('input.food-checkbox').prop('checked', false);
            clone.find('label.food-card').removeClass('selected');

            clone.find('.remove-meal').removeClass('d-none');

            // Update names and IDs for new index
            clone.find('input, select, textarea').each(function () {
                const name = $(this).attr('name');
                if (name) {
                    if(name.includes('food_ids')) {
                        const newName = name.replace(/\[\d+\]/, `[${index}]`);
                        $(this).attr('name', newName);
                    } else if (name.includes('[day]')) {
                        // Already set as hidden input above
                    } else {
                        const newName = name.replace(/\[\d+\]/, `[${index}]`);
                        $(this).attr('name', newName);
                    }
                }
                if ($(this).is(':checkbox')) {
                    const oldId = $(this).attr('id');
                    if (oldId) {
                        const parts = oldId.split('_');
                        const foodId = parts[1];
                        const newId = `foodCheck${index}_${foodId}`;
                        $(this).attr('id', newId);
                    }
                }
            });
            clone.find('label.food-card').each(function () {
                const oldFor = $(this).attr('for');
                if (oldFor) {
                    const parts = oldFor.split('_');
                    const foodId = parts[1];
                    const newFor = `foodCheck${index}_${foodId}`;
                    $(this).attr('for', newFor);
                }
            });

            $('#meals-wrapper').append(clone);
            index++;

            updateMealGroups();
        });

        // Remove meal group
        $(document).on('click', '.remove-meal', function () {
            if ($('#meals-wrapper .meal-group').length > 1) {
                $(this).closest('.meal-group').remove();
                updateMealGroups();
                index--;
            } else {
                alert('At least one meal group is required.');
            }
        });

        // Mark selected foods visually
        $(document).on('change', '.food-checkbox', function () {
            if ($(this).is(':checked')) {
                $(this).closest('label.food-card').addClass('selected');
            } else {
                $(this).closest('label.food-card').removeClass('selected');
            }
        });

        // Initialize selected classes for checked foods on page load
        $('.food-checkbox:checked').each(function () {
            $(this).closest('label.food-card').addClass('selected');
        });

        updateMealGroups();
    });
</script>
@endpush
