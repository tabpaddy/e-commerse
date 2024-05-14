<?php
    if(isset($_GET['delete_payments'])){
        $delete_id=$_GET['delete_payments'];
        $delete_query="DELETE FROM user_payment WHERE order_id=$delete_id";
        $delete_query_result=mysqli_query($con, $delete_query);
        if($delete_query_result){
            echo"<script>alert('Payment Deleted Successfully')</script>";
        echo"<script>window.open('index.php?list_payments','_self')</script>";
        }
    }
?>