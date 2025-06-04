@extends('layouts.admin.app')
@section('title', 'Create Menu')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Menu</h4>
                    <hr>

                   <form action="{{ route('menus.store') }}" method="POST">
                        @csrf
                        <div id="meals-wrapper">
                            <div class="meal-group mb-4 border p-3 rounded" data-index="0">
                               <div class="row">
                                    <div class="form-group col-md-4 day-select-group">
                                        <label>Day</label>
                                        <select name="meals[0][day]" class="form-control day-selector" required>
                                            <option value="">Select Day</option>
                                            @foreach(['sunday','monday','tuesday','wednesday','thursday','friday','saturday'] as $day)
                                                <option value="{{ $day }}">{{ ucfirst($day) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Meal Time</label>
                                        <select name="meals[0][meal_time]" class="form-control" required>
                                            <option value="">Select Meal Time</option>
                                            <option value="breakfast">Breakfast</option>
                                            <option value="lunch">Lunch</option>
                                            <option value="dinner">Dinner</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Preparation Time</label>
                                        <input type="text" name="meals[0][preparation_time]" class="form-control" placeholder="Enter Preparation Time" style="height: calc(2.25rem + -7px); padding:0px 12px;">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Select Foods</label>
                                    <div class="row">
                                        @foreach($foods as $food)
                                            <div class="col-md-2 mb-3 ">
                                            <div class="border" style="border-radius: 0.5rem;">
                                                    <label for="foodCheck0_{{ $food->id }}" class="food-card d-block p-2 rounded position-relative">
                                                        <input
                                                            type="checkbox"
                                                            name="meals[0][food_ids][]"
                                                            value="{{ $food->id }}"
                                                            class="food-checkbox"
                                                            id="foodCheck0_{{ $food->id }}">
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

                                <button type="button" class="btn btn-danger btn-sm remove-meal mt-2 d-none">Remove</button>
                            </div>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="button" id="add-meal" class="btn btn-primary">+ Add Another Meal</button>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('menus.index') }}" class="btn btn-light border">Cancel</a>
                            <button type="submit" class="btn btn-success text-white">Create Menu</button>
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
<script>
   let index = 1;

$(document).ready(function () {

    function updateMealGroups() {
        $('#meals-wrapper .meal-group').each(function (i) {
            $(this).attr('data-index', i);

            // For the first meal group, ensure day select is present
            if (i === 0) {
                // If hidden input for day exists, replace it with select
                if ($(this).find('input[name^="meals"][type="hidden"][name$="[day]"]').length) {
                    const hiddenDayVal = $(this).find('input[name^="meals"][type="hidden"][name$="[day]"]').val();
                    $(this).find('input[name^="meals"][type="hidden"][name$="[day]"]').remove();

                    // Add select for day, with old value selected
                    const dayOptions = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
                    let selectHtml = '<select name="meals[0][day]" class="form-control day-selector" required>';
                    selectHtml += '<option value="">Select Day</option>';
                    dayOptions.forEach(day => {
                        selectHtml += `<option value="${day}" ${day === hiddenDayVal ? 'selected' : ''}>${day.charAt(0).toUpperCase() + day.slice(1)}</option>`;
                    });
                    selectHtml += '</select>';

                    // Add the select back inside a .form-group div
                    const dayFormGroup = $('<div class="form-group col-md-6"></div>').append('<label>Day</label>').append(selectHtml);

                    // Insert dayFormGroup before meal_time select group
                    $(this).find('.row > .form-group.col-md-6').first().before(dayFormGroup);
                }
            } else {
                // For other groups, ensure day select is removed and replaced by hidden input

                const daySelect = $(this).find('select.day-selector');
                if (daySelect.length) {
                    const selectedDay = daySelect.val();
                    daySelect.closest('.form-group').remove();
                    // Prepend hidden input for day
                    if ($(this).find(`input[name="meals[${i}][day]"]`).length === 0) {
                        $(this).prepend(`<input type="hidden" name="meals[${i}][day]" value="${selectedDay}">`);
                    }
                } else {
                    // If no select and no hidden input, add hidden input with blank value
                    if ($(this).find(`input[name="meals[${i}][day]"]`).length === 0) {
                        $(this).prepend(`<input type="hidden" name="meals[${i}][day]" value="">`);
                    } else {
                        // Update the hidden input name and keep value
                        const hiddenDay = $(this).find('input[name$="[day]"]');
                        hiddenDay.attr('name', `meals[${i}][day]`);
                    }
                }
            }

            // Update all other input/select names and ids according to new index i

            $(this).find('input, select, textarea').each(function () {
                const name = $(this).attr('name');
                if (name) {
                    if(name.includes('food_ids')) {
                        // Replace the index in food_ids[] correctly
                        const newName = name.replace(/\[\d+\]/, `[${i}]`);
                        $(this).attr('name', newName);
                    } else if (name.includes('[day]')) {
                        // Already handled above
                    } else {
                        // Other fields
                        const newName = name.replace(/\[\d+\]/, `[${i}]`);
                        $(this).attr('name', newName);
                    }
                }

                if ($(this).is(':checkbox')) {
                    // Update IDs for checkboxes too
                    const oldId = $(this).attr('id');
                    if (oldId) {
                        const parts = oldId.split('_');
                        const foodId = parts[1];
                        const newId = `foodCheck${i}_${foodId}`;
                        $(this).attr('id', newId);
                    }
                }
            });

            // Update label 'for' attributes for checkboxes
            $(this).find('label.food-card').each(function () {
                const oldFor = $(this).attr('for');
                if (oldFor) {
                    const parts = oldFor.split('_');
                    const foodId = parts[1];
                    const newFor = `foodCheck${i}_${foodId}`;
                    $(this).attr('for', newFor);
                }
                $(this).removeClass('selected');
            });
        });

        index = $('#meals-wrapper .meal-group').length;
        toggleRemoveButtons();
    }

    // Initial toggle
    toggleRemoveButtons();

    // Handle add meal
    $('#add-meal').click(function () {
        let $original = $('.meal-group').first();
        let $clone = $original.clone();

        // Get the day value of the original before removing day select
        let selectedDay = $original.find('select.day-selector').val();

        $clone.attr('data-index', index);

        // Remove day select group from clone, then add hidden input with day value
        $clone.find('.form-group').has('select.day-selector').remove();

        $clone.prepend(`<input type="hidden" name="meals[${index}][day]" value="${selectedDay}">`);

        // Reset inputs/selects values except day hidden input
        $clone.find('input, select, textarea').each(function () {
            const name = $(this).attr('name');

            if (name) {
                if(name.includes('food_ids')) {
                    const newName = name.replace(/\[\d+\]/, `[${index}]`);
                    $(this).attr('name', newName);
                } else if (name.includes('[day]')) {
                    // skip, it's handled above
                } else {
                    const newName = name.replace(/\[\d+\]/, `[${index}]`);
                    $(this).attr('name', newName);
                }
            }

            if ($(this).is(':checkbox')) {
                $(this).prop('checked', false);
            } else if (!name.includes('[day]')) {
                $(this).val('');
            }
        });

        // Update checkbox IDs and labels
        $clone.find('input[type="checkbox"]').each(function () {
            const oldId = $(this).attr('id');
            if (oldId) {
                const parts = oldId.split('_');
                const foodId = parts[1];
                const newId = `foodCheck${index}_${foodId}`;
                $(this).attr('id', newId);
            }
        });

        $clone.find('label.food-card').each(function () {
            const oldFor = $(this).attr('for');
            if (oldFor) {
                const parts = oldFor.split('_');
                const foodId = parts[1];
                const newFor = `foodCheck${index}_${foodId}`;
                $(this).attr('for', newFor);
            }
            $(this).removeClass('selected');
        });

        $('#meals-wrapper').append($clone);

        index++;
        toggleRemoveButtons();
    });

    // Remove meal group and update indexes & day fields
    $(document).on('click', '.remove-meal', function () {
        if ($('.meal-group').length > 1) {
            $(this).closest('.meal-group').remove();
            updateMealGroups();
        }
    });

    function toggleRemoveButtons() {
        if ($('.meal-group').length > 1) {
            $('.remove-meal').removeClass('d-none');
        } else {
            $('.remove-meal').addClass('d-none');
        }
    }

    // Also toggle selected class on checkbox change
    $(document).on('change', '.food-checkbox', function () {
        if ($(this).is(':checked')) {
            $(this).closest('label.food-card').addClass('selected');
        } else {
            $(this).closest('label.food-card').removeClass('selected');
        }
    });

});

</script>
@endpush
