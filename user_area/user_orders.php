<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <link rel="stylesheet" href="../style/style.css" class="logo">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        body{
            overflow-x: hidden;
        }

        img.Profile_img{
    width: 80%;
    height: 200px;
    object-fit: contain;
    margin: auto;
    display: block;
    border-radius: 50%;
}
img.edit_img{
    width: 100px;
    height: 100px;
    object-fit: contain;
}
    </style>
  </head>
  <body>
    <?php
    $username=$_SESSION['username'];
    $get_users="SELECT * FROM user_table WHERE username='$username'";
    $result=mysqli_query($con, $get_users);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    
    ?>
<h3 class="text-center text-success">All my Orders</h3>
<table class="table table-border mt-5">
    <thead class="table-success">
    <tr>
        <th>sl no</th>
        <th>Amount due</th>
        <th>Total products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="table-dark table-text-white">
        <?php
        $get_order_details="SELECT * FROM user_order WHERE user_id=$user_id";
        $result_orders=mysqli_query($con, $get_order_details);
        $number=1;
        while ($row_order=mysqli_fetch_assoc($result_orders)) {
           $order_id = $row_order['order_id'];
           $amount_due = $row_order['amount_due'];
           $invoice_number = $row_order['invoice_number'];
           $total_products = $row_order['total_products'];
           $order_date = $row_order['order_date'];
           $order_status = $row_order['order_status'];
           if($order_status=='pending'){
            $order_status = "incomplete";
           }else{
            $order_status = "complete";
           }
           
           echo " <tr>
           <td>$number</td>
           <td>". number_format($amount_due) ."</td>
           <td>$total_products</td>
           <td>$invoice_number</td>
           <td>$order_date</td>
           <td>$order_status</td>";
           ?>
           <?php
           if($order_status=='complete'){
            echo "<td class='text-light'>Paid</td>";
           }else{
            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
            </tr>";
           }
       $number++;
        }
        ?>
        
    </tbody>
</table>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>