<?php 

    include 'model.php';
    $model = new Model();
    $rows = $model->fetch();

?>

<table class="table">
    <?php
        $i = 1;
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
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['brand']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['model']; ?></td>
                    <td>
                        <a href='#' id='read' class="btn-t" value='<?php echo $row['id'] ?>'>Read</a>
                        <a href='#' id='delete' class="btn-t" value='<?php echo $row['id'] ?>'>Delete</a>
                        <a href='#' id='edit' class="btn-t" value='<?php echo $row['id'] ?>'>Edit</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "
                    <p style='text-align: center'> No data to show </p>
                ";
            }
            ?>
        </tbody>
</table>