<?php
// connect filr
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

//getting total items and toatl price of all item

$ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address='$ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invoice_number=mt_rand();
$status = 'pending';
$count_products= mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id=$product_id";
    $run_price = mysqli_query($con, $select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_value = array_sum($product_price);
        $total_price+= $product_value;
    }
}


//getting quantity form cart
$get_cart= "SELECT * FROM cart_details";
$run_cart = mysqli_query($con, $get_cart);
$get_item_quantity= mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subTotal=$total_price;
}else{
    $quantity=$quantity;
    $subTotal=$total_price*$quantity;
}

$insert_orders= "INSERT INTO user_order (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $subTotal, $invoice_number, $count_products, NOW(), '$status')";
$result_query=mysqli_query($con, $insert_orders);
if($result_query){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}
?>