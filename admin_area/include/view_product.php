<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Admin Page</title>
    <style>
         .product_img{
    width: 100px;
    object-fit: contain;
}
    </style>
</head>
<body>
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered my-5">
        <thead class="table-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-secondary text-center ">
            <?php
            $get_product = "SELECT * FROM products";
            $result = mysqli_query($con, $get_product);
            $count_result = mysqli_num_rows($result);
            while($row_count = mysqli_fetch_assoc($result)){
                $product_id = $row_count['product_id'];
                $product_title = $row_count['product_title'];
                $product_image1 = $row_count['product_image1'];
                $product_price = $row_count['product_price'];
                $status = $row_count['status'];
                ?>
               <tr>
                <td><?php echo"$product_id"?></td>
                <td><?php echo"$product_title"?></td>
                <td><?php echo"<img src='./product_images/$product_image1' alt='pimage' class='product_img'>"?></td>
                <td><?php echo number_format($product_price) ?>/-</td>
                <td>
                    <?php
                        $get_count="SELECT * FROM order_pending WHERE product_id=$product_id";
                        $result_count =mysqli_query($con, $get_count);
                        $rows_count=mysqli_num_rows($result_count);
                        echo $rows_count;
                    ?>
                </td>
                <td><?php echo"$status"?></td>
                <td><a href="index.php?edit_products=<?php echo $product_id ?>" class='text-dark'><i class='uil uil-edit'></i></a></td>
                <td><a href="index.php?delete_products=<?php echo $product_id ?>" class='text-dark'><i class='uil uil-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>