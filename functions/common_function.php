<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
include('./includes/connect.php');

// getting products
function getproduct(){
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
        global $con;

        // condition to check isset or not
        if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
                        $result_products= mysqli_query($con, $sql);
                        while($row=mysqli_fetch_assoc($result_products)){
                            $product_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_description=$row['product_description'];
                            $product_keyword=$row['product_keyword'];
                            $category_id=$row['category_id'];
                            $brand_id=$row['brand_id'];
                            $product_image1=$row['product_image1'];
                            $product_image2=$row['product_image2'];
                            $product_image3=$row['product_image3'];
                            $product_price=$row['product_price'];
                            // $date=$row['date'];
                            // $status=$row['status'];
                            echo "<div class='col-md-4 mb-3'>
                            <div class='card'>
                                <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                </div>
                                <div class='card-body'>
                                    <a href='#' class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                            </div>";
                        }
}
}
}

// getting all product
function get_all_product(){
    $sql = "SELECT * FROM products ORDER BY RAND()";
        global $con;

        // condition to check isset or not
        if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
                        $result_products= mysqli_query($con, $sql);
                        while($row=mysqli_fetch_assoc($result_products)){
                            $product_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_description=$row['product_description'];
                            $product_keyword=$row['product_keyword'];
                            $category_id=$row['category_id'];
                            $brand_id=$row['brand_id'];
                            $product_image1=$row['product_image1'];
                            $product_image2=$row['product_image2'];
                            $product_image3=$row['product_image3'];
                            $product_price=$row['product_price'];
                            // $date=$row['date'];
                            // $status=$row['status'];
                            echo "<div class='col-md-4 mb-3'>
                            <div class='card'>
                                <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                </div>
                                <div class='card-body'>
                                    <a href='#' class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                            </div>";
                        }
}
}
}


                        // getting unique categories
                        function get_unique_categories(){
                            global $con;
                             // condition to check isset or not
                             if(isset($_GET['category'])){
                                $category_id =$_GET['category'];
                            $sql = "SELECT * FROM products WHERE category_id='$category_id'";
                                $result_products= mysqli_query($con, $sql);
                                $num_of_rows=mysqli_num_rows($result_products);
                                if($num_of_rows==0){
                                    echo "<h2 class='text-center text-dantger'>No stock for this category</h2>";
                                }
                                                while($row=mysqli_fetch_assoc($result_products)){
                                                    $product_id=$row['product_id'];
                                                    $product_title=$row['product_title'];
                                                    $product_description=$row['product_description'];
                                                    $product_keyword=$row['product_keyword'];
                                                    $category_id=$row['category_id'];
                                                    $brand_id=$row['brand_id'];
                                                    $product_image1=$row['product_image1'];
                                                    $product_image2=$row['product_image2'];
                                                    $product_image3=$row['product_image3'];
                                                    $product_price=$row['product_price'];
                                                    // $date=$row['date'];
                                                    // $status=$row['status'];
                                                    echo "<div class='col-md-4 mb-3'>
                                                    <div class='card'>
                                                        <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                                        <div class='card-body'>
                                                            <h5 class='card-title'>$product_title</h5>
                                                            <p class='card-text'>$product_description</p>
                                                        </div>
                                                        <div class='card-body'>
                                                            <a href='#' class='btn btn-info'>Add to cart</a>
                                                            <a href='#' class='btn btn-secondary'>View more</a>
                                                        </div>
                                                    </div>
                                                    </div>";
                                                }
                        }
                    }

                        // getting unique brands
                        function get_unique_brands(){
                            global $con;
                             // condition to check isset or not
                             if(isset($_GET['brand'])){
                                $brand_id =$_GET['brand'];
                            $sql = "SELECT * FROM products WHERE brand_id='$brand_id'";
                                $result_products= mysqli_query($con, $sql);
                                $num_of_rows=mysqli_num_rows($result_products);
                                if($num_of_rows==0){
                                    echo "<h2 class='text-center text-danger'>This Brand is not available for service</h2>";
                                }
                                                while($row=mysqli_fetch_assoc($result_products)){
                                                    $product_id=$row['product_id'];
                                                    $product_title=$row['product_title'];
                                                    $product_description=$row['product_description'];
                                                    $product_keyword=$row['product_keyword'];
                                                    $category_id=$row['category_id'];
                                                    $brand_id=$row['brand_id'];
                                                    $product_image1=$row['product_image1'];
                                                    $product_image2=$row['product_image2'];
                                                    $product_image3=$row['product_image3'];
                                                    $product_price=$row['product_price'];
                                                    // $date=$row['date'];
                                                    // $status=$row['status'];
                                                    echo "<div class='col-md-4 mb-3'>
                                                    <div class='card'>
                                                        <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                                        <div class='card-body'>
                                                            <h5 class='card-title'>$product_title</h5>
                                                            <p class='card-text'>$product_description</p>
                                                        </div>
                                                        <div class='card-body'>
                                                            <a href='#' class='btn btn-info'>Add to cart</a>
                                                            <a href='#' class='btn btn-secondary'>View more</a>
                                                        </div>
                                                    </div>
                                                    </div>";
                                                }
                        }
                        }
                        





                        // displaying brands in sidenav
                        function getbrands(){
                            global $con;
                            $select_brands="SELECT * FROM brands";
                            $result_brands=mysqli_query($con, $select_brands);
                            // $row_data=mysqli_fetch_assoc($result_brands);
                            // echo $row_data['brand_title'];
                            while($row_data=mysqli_fetch_assoc($result_brands)){
                                $brand_title=$row_data['brand_title'];
                                $brand_id=$row_data['brand_id'];
                                echo "<li class='nav-item'>
                                <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                            </li>";
                            }
                        }

                        // displaying categories in sidenav
                        function getcategorys(){
                            global $con;
                            $select_categories="SELECT * FROM categories";
                        $result_categories=mysqli_query($con, $select_categories);
                        // $row_data=mysqli_fetch_assoc($result_brands);
                        // echo $row_data['brand_title'];
                        while($row_data=mysqli_fetch_assoc($result_categories)){
                            $category_title=$row_data['category_title'];
                            $category_id=$row_data['category_id'];
                            echo "<li class='nav-item'>
                            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                        </li>";
                        }
                        }
?>