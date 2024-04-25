<?php

include('../../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    //select data from database
    $select_query="SELECT * FROM categories WHERE category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $numbers=mysqli_num_rows($result_select);
    if($numbers>0){
      echo "<script>alert('This category is already present in the database')</script>";
    }else{
    $sql = "INSERT INTO categories(category_title) VALUES ('$category_title')";
    $result = mysqli_query($con, $sql);
    if($result){
      echo "<script>alert('Category has been inserted successfully')</script>";
    }
    }
  }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="my-2">
<div class="mb-1 w-90 d-flex align-items-center">
    <label for="exampleInputEmail1" class="form-label bg-info p-2 m-1"><i class="uil uil-receipt "></i></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="cat_title" placeholder="Insert categories" aria-describedby="emailHelp">
  </div>
<div class="mb-3 w-10 m-auto">
    <!-- <button type="submit" class=" bg-info p-2 my-3 border-0" name="insert_cat"  aria-describedby="emailHelp" value="Insert Categories">Insert categories</button> -->
    <input type="submit" class=" bg-info p-2 my-3 border-0" name="insert_cat" value="Insert Categories">
  </div>
</form>