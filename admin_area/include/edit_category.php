<div class="container mt-5">
        <h3 class="text-center">Edit Category</h3>
        <?php
            if(isset($_GET['edit_category'])){
                $category_id=$_GET['edit_category'];
                $display_cate="SELECT * FROM categories WHERE category_id=$category_id";
                $result_edit=mysqli_query($con, $display_cate);
                $run_display=mysqli_fetch_assoc($result_edit);
                $category_title=$run_display['category_title'];
            }
        ?>
        <form action="" method="post">
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="category_title">Category Title</label>
                <input type="text" id="category_title" name="category_title" class="form-control"  value="<?php echo $category_title ?>" required>
            </div>
            <div class="w-50 m-auto mb-3">
                <input type="submit" name="edit_category_btn" class="btn btn-info" required value="Update Category">
            </div>           

        </form>
    </div>

    <?php
        if(isset($_POST['edit_category_btn'])){
            $category_title=$_POST['category_title'];
            
            if($category_title==""){
                echo "<script>alert('please fill all the available fields')</script>";
                exit();
            }else{
                $update_category="UPDATE categories SET category_title='$category_title' WHERE category_id=$category_id";
                $update_result=mysqli_query($con, $update_category);
                if($update_result){
                    echo "<script>alert('Category updated successful')</script>";
                echo "<script>window.open('./index.php?view_category', '_self')</script>";
                }
            }
        }

?>