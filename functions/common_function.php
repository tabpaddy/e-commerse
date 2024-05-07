<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
// include('./includes/connect.php');

// getting products
function getproduct(){
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
        global $con;

        // condition to check isset or not
        if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
        if(!isset($_GET['search_data_product'])){
        if(!isset($_GET['search_data'])){
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
                            $formatted_price=number_format($product_price);
                            // $date=$row['date'];
                            // $status=$row['status'];
                            echo "<div class='col-md-4 mb-3'>
                            <div class='card'>
                                <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price$formatted_price/-</p>
                                </div>
                                <div class='card-body'>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                            </div>";
                        }
}
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
        if(!isset($_GET['search_data_product'])){
        if(!isset($_GET['search_data'])){
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
                            $formatted_price=number_format($product_price);
                            // $date=$row['date'];
                            // $status=$row['status'];
                            echo "<div class='col-md-4 mb-3'>
                            <div class='card'>
                                <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price$formatted_price/-</p>
                                </div>
                                <div class='card-body'>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                            </div>";
                        }
}
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
                                                    $formatted_price=number_format($product_price);
                                                    // $date=$row['date'];
                                                    // $status=$row['status'];
                                                    echo "<div class='col-md-4 mb-3'>
                                                    <div class='card'>
                                                        <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                                        <div class='card-body'>
                                                            <h5 class='card-title'>$product_title</h5>
                                                            <p class='card-text'>$product_description</p>
                                                            <p class='card-text'>Price$formatted_price/-</p>
                                                        </div>
                                                        <div class='card-body'>
                                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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
                                                    $formatted_price=number_format($product_price);
                                                    // $date=$row['date'];
                                                    // $status=$row['status'];
                                                    echo "<div class='col-md-4 mb-3'>
                                                    <div class='card'>
                                                        <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                                        <div class='card-body'>
                                                            <h5 class='card-title'>$product_title</h5>
                                                            <p class='card-text'>$product_description</p>
                                                            <p class='card-text'>Price$formatted_price/-</p>
                                                        </div>
                                                        <div class='card-body'>
                                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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


                        // searching products function
                        function search_product(){
                            global $con;
                            if(isset($_GET['search_data_product'])){
                                $search_data_value=$_GET['search_data'];
                        $sql = "SELECT * FROM products WHERE product_keyword LIKE '%$search_data_value%'";  // using "%%" at anywhere the value its in the word it should be display 
                        $result_products= mysqli_query($con, $sql);
                        $num_of_rows=mysqli_num_rows($result_products);
                                if($num_of_rows==0){
                                    echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
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
                            $formatted_price=number_format($product_price);
                            // $date=$row['date'];
                            // $status=$row['status'];
                            echo "<div class='col-md-4 mb-3'>
                            <div class='card'>
                                <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price$formatted_price/-</p>
                                </div>
                                <div class='card-body'>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                            </div>";
                        }
}
}

// view details function
function viewdetails(){

    global $con;

    // condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
    if(!isset($_GET['search_data_product'])){
    if(!isset($_GET['search_data'])){
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM products WHERE product_id=$product_id";
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
                        $formatted_price=number_format($product_price);
                        // $date=$row['date'];
                        // $status=$row['status'];
                        echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='admin_area/product_images/$product_image1' class='card-img-top cartImg pt-2' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price$formatted_price/-</p>
                            </div>
                            <div class='card-body'>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='index.php' class='btn btn-secondary'>Go Home</a>
                            </div>
                        </div>
                        </div>
                        <div class='col-md-8'>
                        <!-- related images -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related product image</h4> 
                            </div>
                            <div class='col-md-6'>
                            <img src='admin_area/product_images/$product_image2' class='card-img-top cartImg pt-2' alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                            <img src='admin_area/product_images/$product_image3' class='card-img-top cartImg pt-2' alt='$product_title'>
                            </div>
                        </div>
                    </div>";
                    }   
}
}
}
    }
}
}


//get ip_address function
function getIPAddress() {
    // whether ip is from the share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }// whether ip is from the proxy
    elseif(!empty($_SERVER['http_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }// whether ip is from the remote address
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - '.$ip;


// cart function
function cart(){
    global $con;
    if(isset($_GET['add_to_cart'])){   
        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $sql = "SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id=$get_product_id";
        $result_cart= mysqli_query($con, $sql);
        $num_of_rows=mysqli_num_rows($result_cart);
        if($num_of_rows > 0){
            // echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $sql2 = "INSERT INTO cart_details (product_id, Ip_address, quantity) VALUES ($get_product_id, '$ip', 0)";
            $result_cart= mysqli_query($con, $sql2);
            echo "<script>alert('item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


// function to get cart item number
function cart_item(){
    global $con;
    if(isset($_GET['add_to_cart'])){   
        $ip = getIPAddress();
        $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
        $result_cart= mysqli_query($con, $sql);
        $count_cart_items=mysqli_num_rows($result_cart);
        }else{
            $ip = getIPAddress();
            $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
            $result_cart= mysqli_query($con, $sql);
            $count_cart_items=mysqli_num_rows($result_cart);
        }
        echo $count_cart_items;
    }

    // total price function
    function total_cart_price() {
        global $con;
        $ip = getIPAddress();
        $total = 0;
    
        $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
        $result = mysqli_query($con, $sql);
    
        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            //$quantity = $row['quantity'];
    
            $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);
    
            while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price = array($row_product_price['product_price']);
                $product_value = array_sum($product_price);
                $total += $product_value; // Calculate total price for each item
                
            }
        }
    
        // Format the total price with commas for display
        $formattedTotal = number_format($total);
    
        echo $formattedTotal;
    }
?>