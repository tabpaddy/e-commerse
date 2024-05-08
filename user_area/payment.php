<?php
// connect file
include('../includes/connect.php');
include('../functions/common_function.php');
//session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Payment page</title>
    <style>
        body{
            overflow-x: hidden;
        }
        img{
            width: 40%;
            height: 20%;
            object-fit: contain;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <!-- php code to access userid -->
    <?php
        $user_ip = getIPAddress();
        $get_user="SELECT * FROM user_table WHERE user_ip='$user_ip'";
        $result=mysqli_query($con, $get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];

?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-3">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../assest/banner/img1_mobile.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
            <a href="other.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>