<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        /* Custom styles to center the form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            margin: 0;
        }

        .registration-form {
            width: 100%; /* Adjust width as needed */
            /* max-width: 500px; Limit maximum width */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f9fa; /* Light background color */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-form">
            <h2 class="text-center mb-4">New User Registration</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Username field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                </div>
                <!-- Email field -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
                </div>
                <!-- User Image field -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" name="user_image" id="user_image" class="form-control" required>
                </div>
                <!-- Password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                </div>
                <!-- Confirm Password field -->
                <div class="form-outline mb-4">
                    <label for="user_cpassword" class="form-label">Confirm password</label>
                    <input type="password" name="user_cpassword" id="user_cpassword" class="form-control" placeholder="Enter your password again" autocomplete="off" required>
                </div>
                <!-- Address field -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required>
                </div>
                <!-- Contact field -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required>
                </div>
                <div class="mt-4">
                    <input type="submit" value="Register" class="btn btn-info py-2 px-3" name="user_register">
                    <p class="small fw-bold pt-2 mx-2">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!-- php code -->

<?php
    if(isset($_POST['user_register'])){
        $user_username= $_POST['user_username'];
        $user_email= $_POST['user_email'];
        $user_password= $_POST['user_password'];
        $hash_password= password_hash($user_password, PASSWORD_DEFAULT);
        $user_cpassword= $_POST['user_cpassword'];
        $user_address= $_POST['user_address'];
        $user_contact= $_POST['user_contact'];
        $user_image= $_FILES['user_image']['name'];
        $user_image_tmp= $_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        // select query
        $sql1 = "SELECT * FROM user_table WHERE username = '$user_username' or user_email='$user_email'";
        $result = mysqli_query($con, $sql1);
        $rows_count = mysqli_num_rows($result);//count d number of rows in the table
        if($rows_count>0){
            echo "<script>alert('username and email already exist')</script>";
        }elseif ($user_password != $user_cpassword) {
            echo "<script>alert('password do not match')</script>";
        }
        else{
            // insert_query
            move_uploaded_file($user_image_tmp,"./user_images/$user_image");
            $insert_query="INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

            $sql_execute = mysqli_query($con, $insert_query);
            // if($sql_execute){
            //     echo "<script>alert('Data inserted successfully')</script>";
            // }else{
            //     die(mysqli_error($con));
            // }
        }

        //selecting cart items
        $select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
        $result_cart= mysqli_query($con, $select_cart_items);
        $rows_count = mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('you have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }

?>
