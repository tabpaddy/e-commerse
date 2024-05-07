<?php
// connect filr
include('../includes/connect.php');
include("../functions/common_function.php");
session_start(); //only when this page is active the session will start
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce website Checkout page</title>
    <link rel="stylesheet" href="./style/style.css" class="logo">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  </head>
  <body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./assest/logo1.png"  alt="" class="logo mx-3"> 
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
                    <a class="nav-link" href="user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
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
                        <a class="nav-link" href="#">Welcome Guest</a>
                    </li>
                    <li class="nav-item"><?php
                        if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link' href='user_login.php'>Login</a>";
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
            <div class="col-md-12">
                <div class="row">
                    <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }else{
                        include('payment.php');
                    }
                    ?>
                </div>
                
                <!-- col end -->
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