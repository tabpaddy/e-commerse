<?php
    if(isset($_GET['delete_brand'])){
        $delete_id=$_GET['delete_brand'];
        $delete_query="DELETE FROM brands WHERE brand_id=$delete_id";
        $delete_query_result=mysqli_query($con, $delete_query);
        if($delete_query_result){
            echo"<script>alert('brand Deleted Successfully')</script>";
        echo"<script>window.open('index.php?view_brand','_self')</script>";
        }
    }
?>