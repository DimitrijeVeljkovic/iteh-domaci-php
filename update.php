<?php 
include "model.php";
if (isset($_POST['update'])) {
    if (isset($_POST['edit_brand']) && isset($_POST['edit_price']) && isset($_POST['edit_id']) && isset($_POST['edit_selected_model'])) {
        if (!empty($_POST['edit_brand']) && !empty($_POST['edit_price']) && !empty($_POST['edit_id']) && !empty($_POST['edit_selected_model'])) {
            $data['edit_id'] = $_POST['edit_id'];
            $data['edit_brand'] = $_POST['edit_brand'];
            $data['edit_price'] = $_POST['edit_price'];
            $data['edit_selected_model'] = $_POST['edit_selected_model'];
            $model = new Model();
            $update = $model->update($data); 
        } else {
            echo "<p style='color: #b22222;'> Empty field(s)! </p>";
        }
    }
}
?>