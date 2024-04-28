<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "assignment1");



// Check if a category is selected
if (isset($_GET['category'])) {
    $selected_category = $_GET['category'];
    
    // Query products based on the selected category
    $query = "SELECT * FROM products WHERE category = '$selected_category'";
} else {
   
    // If no category is selected, query all products
    if (isset($_POST["search_text"]))
    {
        $var = $_POST["search_text"];
        $query = "SELECT * FROM products where product_name like '%$var%' ";
    }
    else
    {
        $query = "SELECT * FROM products";
    }
}

$result = mysqli_query($connect, $query);


if (isset($_POST['add_to_cart'])) 
{

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    $session_array = array(
        'product_id' => $_GET['product_id'],
        "product_name" => $_POST['product_name'],
        "unit_price" => $_POST['unit_price'],
        "unit_quantity" => $_POST['unit_quantity']
    );

    $_SESSION['cart'][] = $session_array;
//bruh
    
}


        

if (isset($_GET['action'])) 
{
    if ($_GET['action'] == "clearall") 
    {
        unset($_SESSION['cart']);
    } 
    elseif ($_GET['action'] == "remove" && isset($_GET['product_id'])) 
    {
        $productId = $_GET['product_id'];
        foreach ($_SESSION['cart'] as $key => $value) 
        {
            if ($value['product_id'] == $productId) 
            {
                unset($_SESSION['cart'][$key]); 
            }
        }
    }
}

// Delivery details form validation and processing
$errors = [];
$order_details = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_order'])) {
    // Validate recipient's name, address, mobile number, and email address
    if (empty($_POST["recipient_name"])) {
        $errors[] = "Recipient's name is required";
    }
    if (empty($_POST["address"])) {
        $errors[] = "Address's name is required";
    }
    if (empty($_POST["city_suburb"])) {
        $errors[] = "City/Suburb name is required";
    }
    if (empty($_POST["mobile_number"])) {
        $errors[] = "Mobile Number name is required";
    }
    if (empty($_POST["email_address"])) {
        $errors[] = "Email Address name is required";
    }
   
    
    if (empty($errors)) {
        if(isset($_POST['submit_order'])) {
           
            foreach ($_SESSION['cart'] as $item) {

                // Retrieve product name, unit price, and quantity from the session
                $product_name = $item['product_name'];
                $unit_price = $item['unit_price'];
                $quantity = $item['unit_quantity'];

                // Append order details to the order_details string
                $order_details .= "<div class='thank_you'>Product: $product_name\n";
                $order_details .= "Unit Price: $unit_price\n";
                $order_details .= "Quantity: $quantity\n\n" . "</br></div>";

                $product_id = $item['product_id'];
                $quantity = $item['unit_quantity'];
                $update_query = "UPDATE products SET in_stock = in_stock - $quantity WHERE product_id = $product_id";       
                mysqli_query($connect, $update_query);        
            }

           // Clear the shopping cart session variable after successful checkout
            unset($_SESSION['cart']);

            // Send order confirmation email
            $to = "customer@example.com";
            $subject = "Order Confirmation";
            $message = "Thank you for your order!\n\nYour order details:\n\n$order_details";

            // Additional headers
            $headers = "From: your@example.com" . "\r\n" .
                    "Reply-To: your@example.com" . "\r\n" .
                    "X-Mailer: PHP/" . phpversion();

            // Send the email
            //mail($to, $subject, $message, $headers);

            //echo $order_details;

        }

    }
}

?>







<!DOCTYPE html>
<html>
    
    <head><title>George's Groceries</title></head>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <header>
        <nav class="topnav">
            <ul>
                <div class="d-inline-block float-start logo-group">
                    <img class="logo" src="../assets/index/Logo.png">
                    <h1 class="logo-heading d-inline-block">George's Groceries</h1>
                </div>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php?category=fruits">Fruits/Veg</a></li>
                <li><a href="products.php?category=snacks">Snacks</a></li>
                <li><a href="products.php?category=breakfast">Breakfast</a></li>
                <li><a href="products.php?category=meat_seafood">Meat/Seafood</a></li>
                <li><a href="products.php?category=bakery">Bakery</a></li>
                <form class="d-flex ms-auto search_bar" method='POST' action='products.php'>
                    <input type="text" name='search_text' id='search_text' class='search-box' placeholder="Search Product">
                    <button class="btn btn-success" type='submit' value='Search'>Search</button>
                </form>
            </ul>
        </nav>
    </header>



        <body>
        

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-center">Products:</h2>
                        <div class="col-md-12">
                            <div class="row">
                                 
                            

                            <?php 
                            
                            //$query= "SELECT * FROM products";
                            //$result = mysqli_query($connect,$query);

                            while ($row = mysqli_fetch_array($result)) {?>
                                <div class="col-md-4">
                                    <form method="POST" action="products.php?product_id=<?=$row['product_id'] ?>">
                                
                                        <img src="/assignment1/assets/img/<?= $row['image'] ?>" style='height: 150px;'>
                                        <h5><?= $row['product_name']; ?></h5>
                                        <h5>$<?= number_format($row['unit_price'],2); ?></h5>
                                        <h5><?= $row['unit_quantity']; ?></h5>
                                        <h5><?= $row['in_stock']; ?></h5>
                                        <input type="hidden" name="product_name" value="<?= $row['product_name'] ?>">
                                        <input type="hidden" name="unit_price" value="<?= $row['unit_price'] ?>">
                                        <input type="number" name="unit_quantity" value="1" class="form-control">


                                        <?php if ($row['in_stock'] == 0): ?>
                                            <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Out of Stock" disabled>
                                        <?php else: ?>
                                            <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Add To Cart">
                                        <?php endif; ?>
                                    
                                    </form>
                                </div>
                            
                            <?php }



                            ?>

                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">

                    <?php 
                        if (isset($_GET['action'])) 
                        {
                            if ($_GET['action'] == "show_thank_you") 
                            {
                                echo "<p>Thank you. Your order has been received. <p><p> Order Detail: </br>" . $order_details . "</p>"; 
                            }
                            
                        }

                    ?>              

                            <?php 

                               $total = 0;

                               $output = "";

                               

                                if (!empty($_SESSION['cart'])) {

                                    $output .= "
                                    <div class='row'>
                                    <h2 class='text-center'>Shopping Cart:</h2>
                                    <table class='table table-bordered table-striped'>
                                         <tr>
                                             <th>ID</th>
                                             <th>Item Name</th>
                                             <th>Item Price</th>
                                             <th>Item Quantity</th>
                                             <th>Total Price</th>
                                             <th>Action</th>
                                         </tr>
                                     ";

                                    foreach ($_SESSION['cart'] as $key => $value) {

                                        $output .="
                                        <tr>
                                            <td>".$value['product_id']."</td>
                                            <td>".$value['product_name']."</td>
                                            <td>".$value['unit_price']."</td>
                                            <td>".$value['unit_quantity']."</td>
                                            <td>$".($value['unit_price'] * $value ['unit_quantity'])."</td>
                                            <td>
                                                <a href='products.php?action=remove&product_id=".$value['product_id']."'>
                                                    <button class='btn btn-danger btn-block'>Remove</button>
                                                </a>
                                            </td>
                                        </tr>";

                                        $total = $total + $value['unit_quantity'] * $value['unit_price'];

                                    }

                                    $output .="
                                    <tr>
                                        <td colspan='3'></td>
                                        <td></b>Total Price</b></td>
                                        <td>$$total</td>
                                        <td>
                                            <a href='products.php?action=clearall'>
                                            <button class='btn btn-warning btn-block'>Clear</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href='products.php?action=checkout'>
                                            <button class='btn btn-warning btn-block'>Checkout</button>
                                            </a>
                                        </td>

                                    </tr>
                                    </table>
                                    </div>
                                    ";
                                    
                                     

                                }


                               if (isset($_GET['action'])) 
                               {
                                   if ($_GET['action'] == "checkout") 
                                   {
                                       // Add delivery details form
                                       $output .= "<h2 class='text-center'>Delivery Details</h2>";
                                       $output .= " <form method='POST' action='products.php?action=show_thank_you'> <div class='mb-3'>
                                       
                                                       <label for='recipient_name' class='form-label'>Recipient's Name</label>
                                                       <input type='text' class='form-control' id='recipient_name' name='recipient_name' required>

                                                       <label for='Address' class='form-label'>Address</label>
                                                       <input type='text' class='form-control' id='address' name='address' required>

                                                       <label for='City/Suburb' class='form-label'>City/Suburb</label>
                                                       <input type='text' class='form-control' id='city_suburb' name='city_suburb' required>

                                                       <label for='State/Territory' class='form-label'>State/Territory</label>
                                                       <select class='form-select' id='state_territory' name='state_territory' required>
                                                           <option value='' selected disabled>Select State</option>
                                                           <option value='NSW'>New South Wales</option>
                                                           <option value='VIC'>Victoria</option>
                                                           <option value='QLD'>Queensland</option>
                                                           <option value='WA'>Western Australia</option>
                                                           <option value='SA'>South Australia</option>
                                                           <option value='TAS'>Tasmania</option>
                                                           <option value='ACT'>Australian Capital Territory</option>
                                                           <option value='NT'>Northern Territory</option>
                                                           <option value='Others'>Others</option>
                                                       </select>

                                                       <label for='Mobile_number' class='form-label'>Mobile number</label>
                                                       <input type='text' class='form-control' id='mobile_number' name='mobile_number' required>

                                                       <label for='Email_address' class='form-label'>Email Address</label>
                                                       <input type='text' class='form-control' id='email_address' name='email_address' required>
                                      
                                                   </div>";

                                       $output .= "<button type='submit' name='submit_order' class='btn btn-primary'>Submit Order</button></form>";
                                   
                                   }
                               }


                           
                                

  


                                echo $output;

                            ?>

                            <!-- Display validation errors if any -->
                                <?php if (!empty($errors)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li><?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

       

    </body>

    