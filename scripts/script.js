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
            $("#result-model").html(data);
        }
    });
    $("#form-model")[0].reset();
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
    $("#form-laptop")[0].reset();
});

$(document).on('click', '#close', function(e){
    e.preventDefault();
    $('#modal-r').css('display','none');
    $('#modal-e').css('display','none');
    $('#modal-d').css('display','none');
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
    $('#modal-r').css('display','block');
});

$(document).on('click', '#delete', function(e) {
    e.preventDefault();
    if (window.confirm('Do you want to delete item?')) {
        var id = $(this).attr('value');
        $.ajax({
            url: "delete.php",
            type: "post",
            data: {
                id:id
            },
            success: function(data) {
                fetch();
                $("#modal-delete").html(data);
            }
        });
        $('#modal-d').css('display','block');
    }
    else {
        return false;
    }
});

$(document).on('click', '#edit', function(e) {
    e.preventDefault();
    console.log('klik');
    var id = $(this).attr('value');
    $.ajax({
        url: 'edit.php',
        type: 'post',
        data: {
            id:id
        },
        success: function(data) {
            $('#modal-edit').html(data);
        }
    });
    $('#modal-e').css('display','block');
});

$(document).on("click", "#update", function(e){
    e.preventDefault();
    var edit_id = $("#edit-id").val();
    var edit_brand = $("#edit-brand").val();
    var edit_price = $("#edit-price").val();
    var edit_selected_model = $("#edit-selected-model").val();
    var update = $("#update").val();
    $.ajax({
        url: "update.php",
        type: "post",
        data: { 
            edit_id:edit_id,
            edit_brand:edit_brand,
            edit_price:edit_price,
            edit_selected_model:edit_selected_model,
            update:update
        },
        success: function(data){
            fetch();
            $("#update-text").html(data);
        }
    });
});