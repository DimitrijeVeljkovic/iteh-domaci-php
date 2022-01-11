<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptops</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content flex">
        <h1>Laptops</h1>

        <div class="insert-model card flex">
            <h2>Insert laptop model:</h2>
            <form method="post" id="form-model">
               <div class="flex-form flex">
                    <label>Model name:</label>
                    <input type="text" id="laptop-model" name="laptop-model" class="input-text" placeholder="Insert model...">
                    <button type="submit" id="submit-model" class="btn">ADD MODEL</button>
                    <div id="result-model"></div>
               </div>
            </form>
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
    </script>
</body>
</html>