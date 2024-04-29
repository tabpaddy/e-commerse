<?php
// connect filr
include('includes/connect.php');
include('functions/common_function.php');
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
                    <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="uil uil-shopping-cart-alt"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    
                    
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
                        <a class="nav-link" href="#">Welcome Guest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
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
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product title</th>
                            <th>Product image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                                            <!-- php code to display cart data -->
                    <?php
                                global $con;
                                $ip = getIPAddress();
                                $total=0;
                                $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $select_products="SELECT * FROM products WHERE product_id='$product_id'";
                                    $result_products=mysqli_query($con, $select_products);
                                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                                        $product_price=array($row_product_price['product_price']);
                                        $price_table = $row_product_price['product_price'];
                                        $product_title = $row_product_price['product_title'];
                                        $product_img = $row_product_price['product_image1'];
                                        foreach($product_price as $product_price){
                                            //remove the coma and convert to an integer
                                            $product_price_int=(int)str_replace(',', '', $product_price);
                                        }
                                        // $product_price_sum=array_sum($product_price_int);
                                        $total+=$product_price_int;
                                        $formattedTotal = number_format($total);

                    ?>
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img src="./admin_area/product_images/<?php echo $product_img?>" alt="" class="cartImg2" ></td>
                            <td><input type="text" name="" id="" class="form-input w-50"></td>
                            <td><?php echo $product_price ?></td>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>
                                <button class="btn btn-info mx-3 px-3">Update</button>
                                <button class="btn btn-info px-3">Remove</button>
                            </td>
                        </tr>
                        <?php
                                                                }
                                                            }
                        ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex my-5">
                    <h4 class="px-3">Subtotal:<strong class="text-info"> <?php total_cart_price(); ?>/-</strong></h4>
                    <a href="index.php"><input type="submit" class="btn btn-info mx-2 px-3" value="Continue Shopping" name=""></a>
                    <a href="#"><input type="submit" class="btn btn-secondary mx-2 px-3" value="Checkout" name=""></a>
                </div>
            </div>
        </div>















            <!-- last child -->

            <?php
include('./includes/footer.php');

?>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>