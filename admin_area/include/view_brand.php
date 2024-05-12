<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Admin category Page</title>
    <style>
         .product_img{
    width: 100px;
    object-fit: contain;
}
    </style>
</head>
<body>
<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered my-5">
        <thead class="table-info">
            <tr>
                <th>SL no</th>
                <th>category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-secondary text-center ">
            <?php
                $get_brand="SELECT * FROM brands";
                $result=mysqli_query($con, $get_brand);
                $number=1;
                while($row_brand=mysqli_fetch_assoc($result)){
                    $brand_title=$row_brand['brand_title'];
                    $brand_id=$row_brand['brand_id'];
                
            ?>
            <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href="index.php?edit_brand=<?php echo $brand_id ?>" class='text-dark'><i class='uil uil-edit'></i></a></td>
            <td><a href="index.php?delete_brand=<?php echo $brand_id ?>" class='text-dark'><i class='uil uil-trash'></i></a></td>
            </tr>

            <?php
            $number++;
                }
            ?>
        </tbody>
</table>

</body>
</html>