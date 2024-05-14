<?php
// connect filr
include('../../includes/connect.php');
include('../../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Admin Registration</title>
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="my-3 text-center">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="./img/Group 38.png" alt="Aimage" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-48">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="cuser_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cuser_password" name="cuser_password" placeholder="Enter your password again" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="user_image" name="user_image" placeholder="Enter your image" required>
                    </div>
                    <div class="mb-3 d-flex">
                    <input type="submit" class="btn btn-info" name="create" value="Register"> 
                    <p class="small fw-bold pt-2 mx-2">Have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
    if(isset($_POST['create'])){
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $cuser_password = $_POST['cuser_password'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];

        //checling if usename is logged
        $sql = "SELECT * FROM admin_table WHERE username='$username' or user_email='$user_email'";
        $result = mysqli_query($con, $sql);
        $count_result = mysqli_num_rows($result);
        if($count_result>0){
            echo "<script>alert('username and email already exist')</script>";
        }elseif ($user_password != $cuser_password) {
            echo "<script>alert('password do not match')</script>";
        }else{
            // insert data
            move_uploaded_file($user_image_tmp,"./admin_img/$user_image");
            $insert_query = "INSERT INTO admin_table (username, user_email, user_password, user_image) VALUES ('$username', '$user_email', '$hash_password', '$user_image')";
            $sql_execute = mysqli_query($con, $insert_query);
            if($sql_execute){
                $_SESSION['username']=$username;
                echo "<script>alert('Data inserted successfully')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }else{
                die(mysqli_error($con));
            }
        }
    }
?>