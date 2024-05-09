<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM user_table WHERE username='$user_session_name'";
    $result_query=mysqli_query($con, $select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id= $row_fetch['user_id'];
    $username= $row_fetch['username'];
    $user_email= $row_fetch['user_email'];
    $user_address= $row_fetch['user_address'];
    $user_mobile= $row_fetch['user_mobile'];

}

    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username= $_POST['username'];
    $user_email= $_POST['user_email'];
    $user_address= $_POST['user_address'];
    $user_mobile= $_POST['user_mobile'];
    $user_img= $_FILES['user_img']['name'];
    $user_img_tmp= $_FILES['user_img']['tmp_name'];
    move_uploaded_file($user_img_tmp,"./user_images/$user_img");

    //update query
    $update_data="UPDATE user_table set username='$username', user_email='$user_email', user_address='$user_address', user_mobile='$user_mobile', user_image='$user_img' WHERE user_id=$update_id";
    $result_query_update=mysqli_query($con, $update_data);
    if($result_query_update){
        echo "<script>alert('Profile updated successful')</script>";
        echo "<script>window.open(../logout.php, _self)</script>";

    }
    }


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
      

    </style>
  </head>
  <body>

        <h4 class="text-center text_success my-4">Edit Account</h4>
        <form action="" method="post" enctype="multipart/form-data" class="text-center">
            <div class="form_outline mb-4">
                <input type="text" class="form-control w-50 m-auto" name="username" value="<?php echo $username ?>">
            </div>
            <div class="form_outline mb-4">
                <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo $user_email ?>">
            </div>
            <div class="form_outline mb-4 d-flex w-50 m-auto">
                <input type="file" class="form-control" name="user_img">
                <img src="./user_images/<?php echo $user_img ?>" alt="" class='edit_img' name="user_img">
            </div>
            <div class="form_outline mb-4">
                <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $user_address ?>">
            </div>
            <div class="form_outline mb-4">
                <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo $user_mobile ?>">
            </div>
            <input type="submit" class="btn btn-info m-auto" name="user_update" value="update">
        </form>























              <!-- last child -->


    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>