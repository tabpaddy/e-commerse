<?php
    if(isset($_GET['delete_order'])){
        $delete_id=$_GET['delete_order'];
        $delete_query="DELETE FROM user_order WHERE order_id=$delete_id";
        $delete_query_result=mysqli_query($con, $delete_query);
        if($delete_query_result){
            echo"<script>alert('Order Deleted Successfully')</script>";
        echo"<script>window.open('index.php?list_orders','_self')</script>";
        }
    }
?>