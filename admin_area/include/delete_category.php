<?php
    if(isset($_GET['delete_category'])){
        $delete_id=$_GET['delete_category'];
        $delete_query="DELETE FROM categories WHERE category_id=$delete_id";
        $delete_query_result=mysqli_query($con, $delete_query);
        if($delete_query_result){
            echo"<script>alert('category Deleted Successfully')</script>";
        echo"<script>window.open('index.php?view_category','_self')</script>";
        }
    }
?>