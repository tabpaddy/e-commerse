<?php
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    $delete_query="DELETE FROM products WHERE product_id=$delete_id";
    $delete_query_result=mysqli_query($con, $delete_query);
    if($delete_query_result){
        echo"<script>alert('Product Deleted Successfully')</script>";
        echo"<script>window.open('index.php?view_product','_self')</script>";
    }
}
?>