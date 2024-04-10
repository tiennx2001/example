<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<ul class="nav nav-pills mb-3 justify-content-center mt-5" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1"
            aria-selected="true">Step1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2"
            aria-selected="false">Step2</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3"
            aria-selected="false">Step3</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4"
            aria-selected="false">Step4</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectMeal">Please Select a meal</label>
                        <select name="meal" class="form-control" id="selectMeal">
                            @foreach ($mealValues as $meal)
                                <option value="{{ $meal }}">{{ $meal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPeople">Please Enter Number of people</label>
                        <input type="number" name="number_of_people" min="1" value="1" max="10"
                            class="form-control" id="inputPeople" placeholder="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectRestaurant">Please Select a restaurant</label>
                        <select name="restaurant" class="form-control" id="selectRestaurant">
                            @foreach ($groupedDishes['lunch'] as $restaurant => $dishes)
                                <option value="{{ $restaurant }}">{{ $restaurant }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 select-dish">
                    <div class="form-row" id="dishesContainer">
                        <div class="form-group col-md-7">
                            <label for="selectDish">Please Select a Dish</label>
                            <select name="dish[0]" class="form-control" id="selectDish">
                                @foreach ($groupedDishes['lunch']['Mc Donalds'] as $index => $food)
                                    <option value="{{ $food }}">{{ $food }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-5">
                            <label for="exampleFormControlInput3">Please enter no. of servings</label>
                            <input type="number" name="serving[0]" min="1" value="1" max="10"
                                class="form-control" id="exampleFormControlInput3" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <center><button id="addDish" class="btn btn-primary">Add</button></center>
        </div>
    </div>

    <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4-tab">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">Meal</th>
                                <th scope="col" id="mealValue"></th>
                            </tr>
                            <tr>
                                <th scope="col">No, of people</th>
                                <th scope="col" id="numberOfPeopleValue"></th>
                            </tr>
                            <tr>
                                <th scope="col">Restaurant</th>
                                <th scope="col" id="restaurantValue"></th>
                            </tr>
                            <tr>
                                <th scope="col">Dishes</th>
                                <th scope="col">
                                    <textarea readonly name="dishesTextarea" readonly id="dishesTextarea" cols="50" rows="5"></textarea>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <center><button id="submit" class="btn btn-primary">Submit</button></center>
        </div>
    </div>
</div>


<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#selectMeal').change(function() {
                updateTable();
                var selectedMeal = $(this).val();
                var options = '';
                var groupedDishes = <?php echo json_encode($groupedDishes); ?>;
                $.each(groupedDishes[selectedMeal], function(key, value) {
                    options += '<option value="' + key + '">' + key + '</option>';
                });

                $('#selectRestaurant').html(options);
            });
            $('#selectMeal, #selectRestaurant').change(function() {
                updateTable();
                var selectedMeal = $('#selectMeal').val();
                var selectedRestaurant = $('#selectRestaurant').val();
                var options = '';
                var groupedDishes = <?php echo json_encode($groupedDishes); ?>;

                $.each(groupedDishes[selectedMeal][selectedRestaurant], function(key, value) {
                    options += '<option value="' + value + '">' + value + '</option>';
                });

                $('#selectDish').html(options);
            });
            $('#inputPeople').change(function() {
                updateTable();
            });

            function updateTable() {
                var meal = $('#selectMeal').val();
                var numberOfPeople = $('#inputPeople').val();
                var restaurant = $('#selectRestaurant').val();

                $('#mealValue').text(meal);
                $('#numberOfPeopleValue').text(numberOfPeople);
                $('#restaurantValue').text(restaurant);
            }

            $('#selectMeal').trigger('change');
            var selectedValue = $('#selectDish').val();
            $('#addDish').click(function() {
                var newRow = $('.dish-row').first().clone();
                $('.serving-row').first().clone().insertAfter(newRow);

                newRow.find('.selectDish, .servingInput').change(displayDishesAndServings);

                displayDishesAndServings();

                $('#selectDish').prop('disabled', true);
                var selectedMeal = $('#selectMeal').val();
                var selectedRestaurant = $('#selectRestaurant').val();
                var newDishRow = $('<div class="form-row">');

                var dishColumn = $('<div class="form-group col-md-7">');
                var selectElement = $(
                    '<select name="dish[]" disabled class="choose-dish form-control selectDish"></select>'
                );
                var groupedDishes = <?php echo json_encode($groupedDishes); ?>;

                var nextIndex = $('.selectDish').length +
                    1;
                var totalOptions = $('#selectDish option').length;
                if (nextIndex > (totalOptions - 1)) {
                    alert('Món ăn đã được hiển thị hết!');
                    return;
                }

                var defaultOptionSelected = $('.selectDish:first option:selected').val();

                $.each(groupedDishes[selectedMeal][selectedRestaurant], function(index, food) {
                    if (food !== selectedValue) {
                        var selectedFoods = $('.selectDish').map(function() {
                            return $(this).val();
                        }).get();
                        if (!selectedFoods.includes(food) || index == 0) {
                            selectElement.append('<option value="' + food + '">' + food +
                                '</option>');
                        }
                    }
                });

                if (!selectElement.find('option[value="' + defaultOptionSelected + '"]').length) {
                    selectElement.find('option[value="' + defaultOptionSelected + '"]').remove();
                }

                dishColumn.append(selectElement);

                var servingColumn = $('<div class="form-group col-md-4">');
                servingColumn.append(
                    '<input type="number" name="serving[' + nextIndex +
                    ']" min="1" value="1" max="10" class="form-control" placeholder="">'
                );

                var removeButton = $(
                    '<div class="form-group col-md-1"><button type="button" class="btn btn-danger remove-dish">Remove</button></div>'
                );

                newDishRow.append(dishColumn);
                newDishRow.append(servingColumn);
                newDishRow.append(removeButton);

                $('.select-dish').append(newDishRow);
                updateIndexes();
            });

            $(document).on('click', '.remove-dish', function() {
                $(this).closest('.form-row').remove();
                updateIndexes();
                displayDishesAndServings();
            });

            function updateIndexes() {
                if ($('.selectDish').length === 0) {
                    $('#selectDish').prop('disabled', false);
                } else {
                    $('#selectDish').prop('disabled', true);
                }
                $('.selectDish').each(function(index) {
                    $(this).attr('name', 'dish[' + (index + 1) + ']');
                });

                $('input[name^="serving"]').each(function(index) {
                    $(this).attr('name', 'serving[' + index + ']');
                });
            }

            function displayDishesAndServings() {
                var data = "";

                $('select[name^="dish"]').each(function(index) {
                    var dishName = $(this).val();
                    var servingName = $('input[name="serving[' + (index) + ']"]').val();

                    if (dishName && servingName) {
                        data += "Dish: " + dishName + " - " + servingName + "\n";
                    }
                });

                $('#dishesTextarea').val(data);
            }

            $(document).on('change', 'select[name^="dish"], input[name^="serving"]', function() {
                displayDishesAndServings();
            });

            $(document).ready(function() {
                displayDishesAndServings();
            });
            $('#submit').click(function() {
                var numberOfPeople = parseInt($('#inputPeople').val());
                var totalDishValue = 0;
                if (numberOfPeople > 10) {
                    alert("Chỉ được tối đa 10 người");
                }
                $('select[name^="dish"]').each(function(index) {
                    var servingName = $('input[name="serving[' + (index) + ']"]').val();
                    totalDishValue += parseInt($('input[name="serving[' + (index) + ']"]').val() || 0);
                });

                if (totalDishValue < numberOfPeople) {
                    alert("Phải có trên " + numberOfPeople + " món!");
                    return false;
                }
                alert("Đơn được lên thành công!");
                location.reload();
            });
        });
    </script>
</body>

</html>
