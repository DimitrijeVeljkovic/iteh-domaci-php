<?php
    include 'model.php';
    $model = new Model();
    $row = $model->read($_POST['id']);
    if (!empty($row)) { ?>
        <h2>Laptop [id: <?php echo $row['id']?>]</h2>
        <div>
            <p>Brand - <strong><?php echo $row['brand']; ?></strong></p>
            <p>Price - <strong>$<?php echo $row['price']; ?></strong></p>
            <p>Model - <strong><?php echo "{$row['model']}" ?></strong></p>
        </div>
    <?php
    }

?>