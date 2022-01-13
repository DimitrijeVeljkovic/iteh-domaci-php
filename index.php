<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptops</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link type="text/css" rel="stylesheet" href="css/style.css" >
</head>
<body>
    <div class="content flex">
        <h1>Laptops</h1>

        <div class="grid">
            <div class="insert-model card flex">
                <h2>Insert laptop model</h2>
                <form method="post" id="form-model">
                <div class="flex-form flex">
                        <label>Model name:</label>
                        <input type="text" id="laptop-model" class="input-text" placeholder="Insert model...">
                        <button type="submit" id="submit-model" class="bttn">ADD MODEL</button>
                        <div id="result-model"></div>
                </div>
                </form>
            </div>

            <div class="insert-laptop card flex">
                <h2>Insert laptop</h2>
                <form method="post" id="form-laptop">
                    <div class="form-group">
                        <label>Brand:</label>
                        <input type="text" id="brand" class="input-text" placeholder="Insert brand...">
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" id="price" class="input-text" placeholder="Insert price...">
                    </div>
                    <div class="form-group">
                        <label>Model:</label>
                        <select id="selected-model">
                            <?php
                                include "model.php";
                                $model = new Model();
                                $laptop_models = $model->fetchModels();
                                foreach ($laptop_models as $laptop_model) {
                                    echo "<option value='{$laptop_model['id']}'>{$laptop_model['model']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" id="submit-laptop" class="bttn">ADD LAPTOP</button>
                </form>
                <div id="result-laptop"></div>
            </div>
        </div>

        <div id="modal" class="modal">
            <div id="modal-content" class="modal-content">     
                <span id="close" class="close">&times;</span>
                <div id="modal-read"></div>
            </div>
        </div>

        <div id="fetch" class="card"></div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>

    <script>
        function fetch(){
            $("#fetch").css("display", "block");
            $.ajax({
                url: 'fetch.php',
                type: 'post',
                success: function(data) {
                    $("#fetch").html(data)
                }
            });
        }

        $(document).on("click", "#submit-model", function(e) {
            e.preventDefault();
            var laptop_model = $("#laptop-model").val();
            var submit_model = $("#submit-model").val();
            $.ajax({
                url: "insert-model.php",
                type: "post",
                data: {
                    laptop_model: laptop_model,
                    submit_model: submit_model
                },
                success: function(data) {
                    fetch();
                    $("#result-model").html(data);
                }
            });
        });

        $(document).on("click", "#submit-laptop", function(e) {
            e.preventDefault();
            var brand = $("#brand").val();
            var price = $("#price").val();
            var selected_model = $("#selected-model").val();
            var submit_laptop = $("#submit-laptop").val();
            $.ajax({
                url: "insert-laptop.php",
                type: "post",
                data: {
                    brand:brand,
                    price:price,
                    selected_model:selected_model,
                    submit_laptop:submit_laptop
                },
                success: function(data) {
                    fetch();
                    $("#result-laptop").html(data);
                }
            });
        });

        $(document).on('click', '#close', function(e){
            e.preventDefault();
            $('#modal').css('display','none');
        });

        $(document).on('click', '#read', function(e) {
            e.preventDefault();
            var id = $(this).attr('value');
            $.ajax({
                url: 'read.php',
                type: 'post',
                data: {
                    id:id
                },
                success: function(data) {
                    $('#modal-read').html(data);
                }
            });
            $('#modal').css('display','block');
        });
    </script>
</body>
</html>