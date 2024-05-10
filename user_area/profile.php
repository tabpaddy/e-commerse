<?php
// connect filr
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <link rel="stylesheet" href="../style/style.css" class="logo">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        body{
            overflow-x: hidden;
        }

        img.Profile_img{
    width: 80%;
    height: 200px;
    object-fit: contain;
    margin: auto;
    display: block;
    border-radius: 50%;
}
img.edit_img{
    width: 100px;
    height: 100px;
    object-fit: contain;
}
    </style>
  </head>
  <body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="../assest/logo1.png"  alt="" class="logo mx-3"> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                    <?php
                        if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link' href='./user_registration.php'>Register</a>";
                        }else{
                            echo"<a class='nav-link' href='./profile.php'>My Account</a>";
                        }
                        ?>
                    <!-- <a class="nav-link" href="./user_registration.php">Register</a> -->
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../cart.php"><i class="uil uil-shopping-cart-alt"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                    </li>
                    
                </ul>
                <form class="d-flex" role="search" action="../search_product.php" method="get">
                    <input class="form-control me-2" type="Search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                </form>
                </div>
            </div>
        </nav>



        <!-- second class -->
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
            <div class="container-fluid">
                <!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <?php
                        if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link' href='#'>Welcome Guest</a>";
                        }else{
                            echo"<a class='nav-link' href='#'>Welcome ".$_SESSION['username']. "</a>";
                        }
                        ?>
                        
                    </li>
                    <li class="nav-item"><?php
                        if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link' href='./user_area/user_login.php'>Login</a>";
                        } else{
                            echo"<a class='nav-link' href='../user_logout.php'>Logout</a>";
                        }
                        ?>
                        
                    </li>
                </ul>
            </div>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Tech store</h3>
            <p class="text-center">communications is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center p-0" style="height: 100vh;">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
                    </li>
                    <?php
                    $user_username=$_SESSION['username'];
                    $user_image="SELECT * FROM user_table WHERE username ='$user_username'";
                    $result_img = mysqli_query($con, $user_image);
                    $row_img = mysqli_fetch_assoc($result_img);
                    $user_img = $row_img['user_image'];
                    echo "<li class='nav-item my-3'>
                    <img src='./user_images/$user_img' alt='profile_img' class='Profile_img'>
                </li>";
                    ?>
                    
                    <li class="nav-item">                        
                    <a class="nav-link text-light" href="profile.php">Pending Others</a>
                    </li>
                    <li class="nav-item">                        
                    <a class="nav-link text-light" href="profile.php?edit_account">Edits accounts</a>
                    </li>
                    <li class="nav-item">                        
                    <a class="nav-link text-light" href="profile.php?user_orders">My orders</a>
                    </li>
                    <li class="nav-item">                        
                    <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item">                        
                    <a class="nav-link text-light" href="../user_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
            <?php
            get_user_order_details();
            if(isset($_GET['edit_account'])){
                include ('./edit_account.php');
            }
            if(isset($_GET['user_orders'])){
                include ('./user_orders.php');
            }
            if(isset($_GET['delete_account'])){
                include ('./delete_account.php');
            }
            ?>
            </div>
        </div>
       















            <!-- last child -->

            <?php
include('../includes/footer.php');

?>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>