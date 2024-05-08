<?php
include("../includes/connect.php");
include('functions/common_function.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>User Login</title>
    <style>
        /* Custom styles to center the form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
            /* height: 90vh; */
            /* margin: 0; */
        }

        .login-form {
            width: 50%; /* Adjust width as needed */
            /* max-width: 500px; Limit maximum width */
            padding: 40px 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f9fa; /* Light background color */
            
        }
    </style>
</head>
<body>
<div class="container p-0">
        <div class="login-form m-auto mb-5">
            <h2 class="text-center mb-4">User Login</h2>
            <form action="" method="post">
                <!-- Username field -->
                <div class="form-outline mb-4 mt-5">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                </div>
                <!-- Password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                </div>
                <div class="mt-4">
                    <input type="submit" value="Login" class="btn btn-info py-2 px-3" name="user_login">
                    <p class="small fw-bold pt-2 mx-2">Don't have an account? <a href="user_registration.php" class="text-danger">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
    if(isset($_POST['user_login'])){
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];

        $select_query="SELECT * FROM user_table WHERE username='$user_username'";
        $result = mysqli_query($con, $select_query);//excute query
        $row_count= mysqli_num_rows($result);//count number of rows
        $row_data= mysqli_fetch_assoc($result);//fetch associative data

        //cart item
        $user_ip=getIPAddress();
        $select_query_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
        $select_cart=mysqli_query($con, $select_query_cart);
        $row_count_cart= mysqli_num_rows($select_cart);
        if($row_count>0){
            $_SESSION['username']=$user_username;
            if(password_verify($user_password, $row_data['user_password'])){
                // echo "<script>alert('Login successful')</script>";
                if($row_count==1 and $row_count_cart==0){
                    //the user is login and item in the cart
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('profile.php', '_self')</script>";
                }else{
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('payment.php', '_self')</script>";
                }
            }else{
                echo "<script>alert('password do not match')</script>"; 
            }
        }else{
            echo "<script>alert('invalid credentials')</script>";
        }
    }

?>