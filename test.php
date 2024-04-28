<?php
echo "Hi"
?>

<?php

$connect = mysqli_connect("localhost", "root", "", "php");

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-center">Shopping Cart Date</h2>

                        <?php 
                        
                        $query= "SELECT * FROM produts";
                        $result = mysqli_query($connect,$query);

                        while ($row = mysqli_fetch_array($result)); {?>

                            <form method="get" action="products.php?id=<?$row['id'] ?>">
                                <img src="img/<?= $row['image'] ?>" style='height: 150px;'>
                                <h2><?= $row['product_name']; ?></h2>
                                <h2><?= $row['unit_price']; ?></h2>
                                <h2><?= $row['unit_quantity']; ?></h2>
                                <h2><?= $row['in_stock']; ?></h2>
                            </form>
                        
                        <?php }
                        
                        
                        ?>

                    </div>
                    <div class="col-md-6">
                        <h2 class="text-center">Item Selected</h2>
                    </div>
                </div>
            </div>

        </div>
    </body>
