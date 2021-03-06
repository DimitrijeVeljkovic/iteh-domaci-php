<?php 

    include 'model.php';
    $model = new Model();
    $rows = $model->fetch();

?>

<table class="table">
    <?php
        if (!empty($rows)) { 
    ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Model</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($rows as $row) { 
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['brand']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['model']; ?></td>
                    <td style="width: 200px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 5px;">
                        <a href='#' id='read' class="btn-t" value='<?php echo $row['id'] ?>'>Read</a>
                        <a href='#' id='delete' class="btn-t" value='<?php echo $row['id'] ?>'>Delete</a>
                        <a href='#' id='edit' class="btn-t" value='<?php echo $row['id'] ?>'>Edit</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<p style='text-align: center'> No data to show </p>";
            }
            ?>
        </tbody>
</table>