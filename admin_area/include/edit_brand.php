<div class="container mt-5">
        <h3 class="text-center">Edit Brand</h3>
        <?php
            if(isset($_GET['edit_brand'])){
                $brand_id=$_GET['edit_brand'];
                $display_brand="SELECT * FROM brands WHERE brand_id=$brand_id";
                $result_edit=mysqli_query($con, $display_brand);
                $run_display=mysqli_fetch_assoc($result_edit);
                $brand_title=$run_display['brand_title'];
            }
        ?>
        <form action="" method="post">
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="brand_title">Brand Title</label>
                <input type="text" id="brand_title" name="brand_title" class="form-control"  value="<?php echo $brand_title ?>" required>
            </div>
            <div class="w-50 m-auto mb-3">
                <input type="submit" name="edit_brand_btn" class="btn btn-info" required value="Update Brand">
            </div>           

        </form>
    </div>

    <?php
        if(isset($_POST['edit_brand_btn'])){
            $brand_title=$_POST['brand_title'];
            
            if($brand_title==""){
                echo "<script>alert('please fill all the available fields')</script>";
                exit();
            }else{
                $update_brand="UPDATE brands SET brand_title='$brand_title' WHERE brand_id=$brand_id";
                $update_result=mysqli_query($con, $update_brand);
                if($update_result){
                    echo "<script>alert('Brand updated successful')</script>";
                echo "<script>window.open('./index.php?view_brand', '_self')</script>";
                }
            }
        }

?>