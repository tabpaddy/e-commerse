<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
include('../../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['description'];
    $product_keyword=$_POST['keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    // accessing image tmp name
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];
    $tmp_image3=$_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($tmp_image1,"../product_images/$product_image1");
        move_uploaded_file($tmp_image2,"../product_images/$product_image2");
        move_uploaded_file($tmp_image3,"../product_images/$product_image3");

        //insert query
        $sql="INSERT INTO products (product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_title', '$product_description', '$product_keyword', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price',NOW(), '$product_status')";
        $result =mysqli_query($con, $sql);
        if($result){
            echo "<script>alert('Successfully inserted')</script>";
        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link rel="stylesheet" href="./style/style.css" class="logo">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title"  id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description"  id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required>
            </div>

            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword" class="form-label">Product keyword</label>
                <input type="text" name="keyword"  id="keyword" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>

            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select" required>
                    <option value="">Select a category</option>
                    <?php
                        $sql="SELECT * FROM categories";
                        $result=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_assoc($result)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>
                    
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select" required>
                    <option value="">Select a brand</option>
                    <?php
                        $sql="SELECT * FROM brands";
                        $result=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_assoc($result)){
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }

                    ?>
                </select>
            </div>

            <!-- image1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1"  id="product_image1" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>
            <!-- image2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2"  id="product_image2" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>
            <!-- image3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3"  id="product_image3" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" name="product_price"  id="price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info border-0 mb-3 px-3" value="Insert Products"  required>
            </div>
        </form>
    </div>
    
</body>
</html>