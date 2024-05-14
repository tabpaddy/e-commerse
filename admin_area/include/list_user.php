<h3 class="text-center text-success">All User</h3>
<table class="table table-bordered my-5">
    <thead class="table-info text-center">
        <?php
            $user_query="SELECT * FROM user_table";
            $user_query_result=mysqli_query($con, $user_query);
            $count_user_query_result=mysqli_num_rows($user_query_result);
            if($count_user_query_result>0){
                echo "<tr>
                <th>SL no</th>
                <th>Username</th>
                <th>User Email</th>
                <th>User Address</th>
                <th>User Mobile</th>
                <th>User image</th>
                <th>Delete</th>
                </tr>
            </thead>
            ";
            $number=0;
            while($row_data=mysqli_fetch_assoc($user_query_result)){
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_address=$row_data['user_address'];
                $user_email=$row_data['user_email'];
                $user_mobile=$row_data['user_mobile'];
                $user_image=$row_data['user_image'];
                $number++;
                echo"
                <tbody class='table-secondary text-center'>
                <tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><img src='../user_area/user_images/$user_image' alt='$username' class='product_img'></td>
                <td><a href='href=index.php?delete_user=$user_id' class='text-dark' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='uil uil-trash'></i></a></td>
            </tr>
        </tbody>";   
            }
            }else{
                echo "<h3 class='bg-danger text-center my-4'>No User</h3>";
            }
        ?>
        
        
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this User?</h4>
      </div>
      <div class="modal-footer">
        <a href="index.php?list_user"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></a>
        <a href="index.php?delete_user=<?php echo $user_id ?>"><button type="button" class="btn btn-primary">Yes</button></a>
      </div>
    </div>
  </div>
</div>