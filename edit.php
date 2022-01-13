<?php
    include 'model.php';
    $id = $_POST['id'];
    $model = new Model();
    $row = $model->edit($id);
    if (!empty($row)) { ?>
        <h2>Edit laptop [ID: <?php echo $id?>]</h2>
        <form method="post" id="form-laptop">
            <input type="hidden" id="edit-id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label>Brand:</label>
                <input type="text" id="edit-brand" class="input-text" value="<?php echo $row['brand']; ?>" placeholder="Insert brand...">
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="text" id="edit-price" class="input-text" value="<?php echo $row['price']; ?>" placeholder="Insert price...">
            </div>
            <div class="form-group">
                <label>Model:</label>
                <select id="edit-selected-model">
                    <?php
                        $laptop_models = $model->fetchModels();
                        foreach ($laptop_models as $laptop_model) {
                            echo "<option value='{$laptop_model['id']}'>{$laptop_model['model']}</option>";
                        }
                    ?>
                </select>
            </div>
            <button type="submit" id="update" class="bttn">UPDATE</button>
        </form>
        <div id="update-text"></div>
    <?php
    }
?>