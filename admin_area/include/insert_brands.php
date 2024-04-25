<?php

include('../../includes/connect.php');
if(isset($_POST['insert_brands'])){
    $brand_title=$_POST['brand_title'];

    //select data from database
    $select_query="SELECT * FROM brands WHERE brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $numbers=mysqli_num_rows($result_select);
    if($numbers>0){
      echo "<script>alert('This brand is already present in the database')</script>";
    }else{
    $sql = "INSERT INTO brands(brand_title) VALUES ('$brand_title')";
    $result = mysqli_query($con, $sql);
    if($result){
      echo "<script>alert('Brand has been inserted successfully')</script>";
    }
    }
  }
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="my-2">
<div class="mb-1 w-90 d-flex align-items-center">
    <label for="exampleInputEmail1" class="form-label bg-info p-2 m-1"><i class="uil uil-receipt "></i></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_title" placeholder="Insert brands" aria-describedby="emailHelp" aria-label="brands">
  </div>
<div class="mb-3 w-10 m-auto">
    <!-- <button type="submit" class=" bg-info p-2 my-3 border-0" name="insert_cat"  aria-describedby="emailHelp" value="Insert Brands">Insert brands</button> -->
    <input type="submit" class=" bg-info p-2 my-3 border-0" name="insert_brands" value="Insert Brands">
  </div>
</form>