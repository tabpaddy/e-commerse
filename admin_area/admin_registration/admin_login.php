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
        <h2 class="my-3 text-center">Admin Login</h2>
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
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter your password" required>
    </div>
                   
                    <div class="mb-3 d-flex">
                    <input type="submit" class="btn btn-info" name="create" value="Register"> 
                    <p class="small fw-bold pt-2 mx-2">D'ont have an account? <a href="admin_reg.php" class="text-danger">Signup</a></p>
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
        $user_password = $_POST['user_password'];

        $select_query= "SELECT * FROM admin_table WHERE username='$username'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        if($row_count>0){
            $_SESSION['username']=$username;
            if(password_verify($user_password, $row_data['user_password'])){
                $_SESSION['username']=$user_username;
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('../index.php', '_self')</script>";
            }else{
                echo "<script>alert('password do not match')</script>"; 
            }
        }else{
            echo "<script>alert('invalid credentials')</script>";
        }

    }
?>