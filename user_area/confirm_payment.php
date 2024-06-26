<?php
// connect file
include('../includes/connect.php');

session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
    $select_data="SELECT * FROM user_order WHERE order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
   $invoice_number=$_POST['invoice_number']; 
   $amount_number=$_POST['amount_number']; 
   $payment_mode=$_POST['payment_mode']; 
   $insert_query="INSERT INTO user_payment (order_id, invoice_number, amount, payment_mode) VALUES ($order_id, $invoice_number, $amount_number, '$payment_mode')";
   $payment_result = mysqli_query($con, $insert_query);
    if($payment_result){
        $update_orders="UPDATE user_order SET order_status='Complete' WHERE order_id=$order_id";
        $update_result=mysqli_query($con, $update_orders);
        if($update_result){
        // echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('./profile.php?user_orders','_self')</script>";
    }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Payment</title>
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5 w-50 m-auto">
        <form action="" method="post">
            <div class="form-outline my-4 text-center">
                <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <label for="amountid" class="text-light my=1">Amount</label>
                <input type="text" class="form-control" name="amount_number" id="amountid" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option disabled>Select payment mode</option>
                    <option>upi</option>
                    <option>Online banking</option>
                    <option>paypal</option>
                    <option>cash on delivery</option>
                    <option>pay offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
                <input type="submit" class="btn btn-info" name="confirm_payment" value="confirm">
            </div>
        </form>
    </div>
    
</body>
</html>