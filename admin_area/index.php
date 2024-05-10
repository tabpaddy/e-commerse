<?php
// connect filr
include('../includes/connect.php');
include('../functions/common_function.php');
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./style/style.css" class="logo">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../assest/logo1.png" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row w-100 m-0">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-4">
                    <a href=""><img src="./img/admin-img.jpg" class="admin_img"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                <button class="my-3 border-0"><a href="./include/insert_product.php" class="nav-link text-light bg-info my-1 px-2">
                    Insert Products
                </a></button>
                <button class=" border-0"><a href="index.php?view_product" class="nav-link text-light bg-info my-1 px-2">
                    View Products
                </a></button>
                <button class=" border-0"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 px-2">
                     Insert Categories
                </a></button>
                <button class=" border-0"><a href="" class="nav-link text-light bg-info my-1 px-2">
                     View Categories
                </a></button>
                <button class=" border-0"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 px-2">
                    Insert Brands
                </a></button>
                <button class=" border-0"><a href="" class="nav-link text-light bg-info my-1 px-2">
                    View Brands
                </a></button>
                <button class=" border-0"><a href="" class="nav-link text-light bg-info my-1 px-2">
                    All Orders
                </a></button>
                <button class=" border-0"><a href="" class="nav-link text-light bg-info my-1 px-2">
                    All Payments
                </a></button>
                <button class=" border-0"><a href="" class="nav-link text-light bg-info my-1 px-2">
                    List Users
                </a></button>
                <button class=" border-0"><a href="" class="nav-link text-light bg-info my-1 px-2">
                    Logout
                </a></button>
                </div>

            </div>
        </div>


        <!-- fourth child -->
        <div class="container my-2">
            <?php
            if(isset($_GET['insert_category'])){
            include("include/insert_categories.php");
        }
            if(isset($_GET['insert_brand'])){
            include("include/insert_brands.php");
        }
            if(isset($_GET['view_product'])){
            include("include/view_product.php");
        }
            if(isset($_GET['edit_products'])){
            include("include/edit_products.php");
        }

            ?>
        </div>
                    <!-- last child -->

    <footer class="bg-info p-2 text-center">
        <p>All rights reserved &copy; Designed by Praise-20<?php echo date("y") ?></p>
    </footer>
    </div>
    




























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>