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

    </style>
  </head>
  <body>
<h4 class="text-center text-danger">Delete Account</h4>

<form action="" method="post" class="mt-5">
<div class="form-outline w-50 m-auto mb-4">
    <input type="submit" class="form-control" name="delete" value="Delete account">
</div>
<div class="form-outline w-50 m-auto mb-4">
    <input type="submit" class="form-control" name="dont_delete" value=" Don't Delete account">
</div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "DELETE FROM user_table WHERE username='$username_session'";
    $result=mysqli_query($con, $delete_query);
    if($result){
        session_destroy();
        echo"<script>alert('Account Deleted Successfully')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo"<script>window.open('./profile.php','_self')</script>";
}

?>