<style>
         .product_img{
    width: 100px;
    object-fit: contain;
}
    </style>
    <?php
        if(isset($_GET['edit_products'])){
            $edit_id=$_GET['edit_products'];
            $get_data="SELECT * FROM products WHERE product_id=$edit_id";
            $result=mysqli_query($con, $get_data);
            $row=mysqli_fetch_assoc($result);
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keyword=$row['product_keyword'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];

            //fetching category
            $fetch_category_id= "SELECT * FROM categories WHERE category_id=$category_id";
            $run_cate_id=mysqli_query($con, $fetch_category_id);
            $row_cate=mysqli_fetch_assoc($run_cate_id);
                $cate_title=$row_cate['category_title'];

            //fetching brand
            $fetch_brand_id= "SELECT * FROM brands WHERE brand_id=$brand_id";
            $run_brand_id=mysqli_query($con, $fetch_brand_id);
            $row_brand=mysqli_fetch_assoc($run_brand_id);
                $brand_title=$row_brand['brand_title'];

            
        }
    ?>

    <div class="container mt-5">
        <h3 class="text-center">Edit Products</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_title">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title?>" required>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_description">Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control" value="<?php echo $product_description?>" required>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_keyword">Product Keyword</label>
                <input type="text" id="product_keyword" name="product_keyword" class="form-control" value="<?php echo $product_keyword?>" required>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
            <label class="form-label" for="">Product Category</label>
                <select class="form-select" name="product_category">
                    <option value="<?php echo $cate_title?>"><?php echo $cate_title?></option>
                    <?php
                        //fetching category
            $fetch_category_id_all= "SELECT * FROM categories";
            $run_cate_id_all=mysqli_query($con, $fetch_category_id_all);
            while($rows_cate=mysqli_fetch_array($run_cate_id_all)){;
                $cate_title_all=$rows_cate['category_title'];
                $cate_id_all=$rows_cate['category_id'];
                echo "<option value='$cate_id_all'>$cate_title_all</option>";
            }
                    ?>
                    
                    
                </select>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
            <label class="form-label" for="">Product Brand</label>
                <select class="form-select" name="product_brand">
                    <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
                    <?php
                        //fetching category
            $fetch_brand_id_all= "SELECT * FROM brands";
            $run_brand_id_all=mysqli_query($con, $fetch_brand_id_all);
            while($rows_brand=mysqli_fetch_array($run_brand_id_all)){;
                $brand_title_all=$rows_brand['brand_title'];
                $brand_id_all=$rows_brand['brand_id'];
                echo "<option value='$brand_id_all'>$brand_title_all</option>";
            }
                    ?>
                    
                </select>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_image1">Product Image1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control"  required>
                <img src="./product_images/<?php echo $product_image1?>" alt="img" class="product_img">
                </div>
            </div>            
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_image2">Product Image2</label>
                <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control"  required>
                <img src="./product_images/<?php echo $product_image2?>" alt="img" class="product_img">
                </div>
            </div>            
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_image3">Product Image3</label>
                <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control" required>
                <img src="./product_images/<?php echo $product_image3?>" alt="img" class="product_img">
                </div>
            </div> 
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_price">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price?>" required>
            </div>           
            <div class="w-50 m-auto mb-3">
                <input type="submit" name="edit_product" class="btn btn-info" required value="Update Data">
            </div>           

        </form>
    </div>

    <?php
        if(isset($_POST['edit_product'])){
            $product_title=$_POST['product_title'];
            $product_description=$_POST['product_description'];
            $product_keyword=$_POST['product_keyword'];
            $product_category=$_POST['product_category'];
            $product_brand=$_POST['product_brand'];
            $product_price=$_POST['product_price'];

            $product_image1=$_FILES['product_image1']['name'];
            $product_image1_tmp=$_FILES['product_image1']['tmp_name'];

            $product_image2=$_FILES['product_image2']['name'];
            $product_image2_tmp=$_FILES['product_image2']['tmp_name'];

            $product_image3=$_FILES['product_image3']['name'];
            $product_image3_tmp=$_FILES['product_image3']['tmp_name'];

            //checking for fields or not
            if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
                echo "<script>alert('please fill all the available fields')</script>";
                exit();
            }else{

            move_uploaded_file($product_image1_tmp,"./product_images/$product_image1");
        move_uploaded_file($product_image2_tmp,"./product_images/$product_image2");
        move_uploaded_file($product_image3_tmp,"./product_images/$product_image3");

            $update_product="UPDATE products SET product_title='$product_title', product_description='$product_description', product_keyword='$product_keyword', category_id='$product_category', brand_id='$product_brand', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price=$product_price, date=NOW() WHERE product_id=$edit_id";
            $update_result=mysqli_query($con, $update_product);
            if($update_result){
                echo "<script>alert('Product updated successful')</script>";
                echo "<script>window.open('./index.php?insert_product', '_self')</script>";
            }
        }
    }
    ?>
