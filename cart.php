<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// connect filr
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce website-cart-details</title>
    <style>
        img.cartImg2{
    width: 50px;
    height: 50px;
    object-fit: contain;
}
    </style>
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  </head>
  <body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./assest/logo1.png"  alt="" class="logo mx-3"> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                    <?php
                    if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link' href='./user_area/user_registration.php'>Register</a>";
                        }else{
                            echo"<a class='nav-link' href='./user_area/profile.php'>My Account</a>";
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="uil uil-shopping-cart-alt"></i><sup><?//php cart_item(); ?></sup></a>
                    </li> -->
                    
                    
                </ul>
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php
    cart()

?>

        <!-- second class -->
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
            <div class="container-fluid">
                <!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <?php
                        if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link' href='#'>Welcome Guest</a>";
                        }else{
                            echo"<a class='nav-link' href='#'>Welcome ".$_SESSION['username']. "</a>";
                        }
                        ?>
                    </li>
                    <li class="nav-item"><?php
                        if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link' href='./user_area/user_login.php'>Login</a>";
                        } else{
                            echo"<a class='nav-link' href='user_logout.php'>Logout</a>";
                        }
                        ?>
                        
                    </li>
                </ul>
            </div>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Tech store</h3>
            <p class="text-center">communications is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">

                                            <!-- php code to display cart data -->
                    <?php
                                    global $con;
                                    $ip = getIPAddress();
                                    $total = 0;
                                
                                    $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
                                    $result = mysqli_query($con, $sql);
                                    $result_count = mysqli_num_rows($result);
                                    if($result_count > 0){
                                        echo "<thead>
                                        <tr>
                                            <th>Product title</th>
                                            <th>Product image</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                            <th colspan='2'>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                    
                                    while ($row = mysqli_fetch_array($result)) {
                                        $product_id = $row['product_id'];
                                        //$quantity = $row['quantity'];
                                
                                        $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
                                        $result_products = mysqli_query($con, $select_products);
                                
                                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                                            $product_price = array($row_product_price['product_price']);
                                            $price_table = $row_product_price['product_price'];
                                            $product_title = $row_product_price['product_title'];
                                            $product_img = $row_product_price['product_image1'];
                                            $product_value = array_sum($product_price);
                                            $total += $product_value; // Calculate total price for each item
                                   
                                        

                    ?>
                        <tr>
    <td><span class="text-wrap" style="width: 4rem;"><?php echo $product_title ?></span></td>
    <td><img src="./admin_area/product_images/<?php echo $product_img ?>" alt="" class="cartImg2"></td>
    <td><input type="text" name="quantity" class="form-input w-50"></td>
    <?php
                        
                                // $ip = getIPAddress();
                                // if(isset($_POST['updatecart'])){
                                //     $quantity = $_POST['quantity'];
                                //     $sql2 ="UPDATE cart_details SET quantity=$quantity WHERE ip_address='$ip'";
                                //     $results = mysqli_query($con, $sql2);
                                //     $total = $total*$quantity;
                                    
                                // }
                                // Assuming $con is your database connection
$ip = getIPAddress();

if (isset($_POST['updatecart'])) {
    // Validate and sanitize input
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0; // Assuming quantity is an integer

    // Prepare the SQL query using a prepared statement
    $sql2 = "UPDATE cart_details SET quantity = ? WHERE ip_address = ?";
    
    // Create a prepared statement
    $stmt = mysqli_prepare($con, $sql2);

    if ($stmt) {
        // Bind the parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, 'is', $quantity, $ip);
        
        // Execute the prepared statement
        $success = mysqli_stmt_execute($stmt);
        
        if ($success) {
            // Update successful
            $total = $total * $quantity;
            // echo "Quantity updated successfully.";
            // echo "<script>alert('Quantity updated successfully.')</script>";
        } else {
            // Update failed
            echo "Error updating quantity: " . mysqli_error($con);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        echo "Error preparing statement: " . mysqli_error($con);
    }
}

                            ?>
    <td><?php echo number_format($price_table)?>/-</td>
    <td><input type="checkbox" name="remove[]" value="<?php echo $product_id ?>"></td>
    <td>
        <input type="submit" value="Update cart" class="btn btn-info mx-3 px-3" name="updatecart">
        <input type="submit" value="Remove cart" class="btn btn-info mx-3 px-3"name="removecart">
    </td>
</tr>
                        <?php
                                                                }
                                                            }
                                                        }else{
                                                            echo "<h2 class='text-center text-danger'>cart is empty</h2>";
                                                        }
                        ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex my-5">
                    <?php
                $ip = getIPAddress();

                $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
                $result = mysqli_query($con, $sql);
                $result_count = mysqli_num_rows($result);
                
                if ($result_count > 0) {
                    // Display subtotal with formatted total amount
                    echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>" . number_format($total) . "/-</strong></h4>
                          <a href='index.php' class='btn btn-info mx-2 px-3'>Continue Shopping</a>
                          <a href='user_area/checkout.php' class='btn btn-secondary mx-2 px-3'>Checkout</a>";
                } else {
                    // Display only 'Continue Shopping' link if cart is empty
                    echo "<a href='index.php' class='btn btn-info mx-2 px-3'>Continue Shopping</a>";
                }

?>
                   
                </div>
                
            </div>
            </form>
            <!-- function to remove item -->
            <?php
                //    function remove_cart_item(){
                //     global $con;
                //     // $ip = getIPAddress();
                //     if(isset($_POST['removecart'])){
                //         foreach($_POST['remove'] as $removeid){
                //     // var_dump ($removeid);
                //             $delete_query="DELETE FROM cart_details WHERE product_id=$removeid";
                //             $run_delete = mysqli_query($con, $delete_query);
                //             if($run_delete){
                //                 echo "<script>window.open('cart.php','_self')<script>";
                //             }
                //         }
                //     }
                //    } 
                //    echo $remove_item = remove_cart_item();
                function remove_cart_item(){
                    global $con;
                    if(isset($_POST['removecart'])){
                    // Check if 'remove' key exists in $_POST and is an array
                    if(isset($_POST['remove']) && is_array($_POST['remove'])){
                        foreach($_POST['remove'] as $removeid){
                            // Validate and sanitize the product_id to prevent SQL injection
                            $product_id = intval($removeid); // Convert to integer
                            
                            // Perform the deletion query
                            $delete_query = "DELETE FROM cart_details WHERE product_id = $product_id";
                            $run_delete = mysqli_query($con, $delete_query);
                            
                            if($run_delete){
                                // Redirect back to cart.php after successful deletion
                                echo "<script>window.open('cart.php','_self')</script>";
                            } else {
                                // Handle deletion failure
                                echo "Failed to delete item from cart.";
                            }
                        }
                    } else {
                        // $_POST['remove'] is not set or not an array
                        // echo "No items selected for removal.";
                    }
                }
                }
                
                // Call the function and store the result in $remove_item
                $remove_item = remove_cart_item();
                
                // Display any output from the function (if applicable)
                echo $remove_item;
                ?>
        </div>
        
        















            <!-- last child -->

            <?php
include('./includes/footer.php');

?>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>