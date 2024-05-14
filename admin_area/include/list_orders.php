<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered my-5">
    <thead class="table-info text-center">
        <tr>
            <th>SL no</th>
            <th>Due Amount</th>
            <th>Invoice number</th>
            <th>total products</th>
            <th>order_date</th>
            <th>status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-secondary">
        <?php
            $order_query="SELECT * FROM user_order";
            $order_query_result=mysqli_query($con, $order_query);
            $count_order_query_result=mysqli_num_rows($order_query_result);
            if($count_order_query_result>0){

            
            $number=0;
            while($row=mysqli_fetch_assoc($order_query_result)){
                $order_id=$row['order_id'];
                $amount_due=$row['amount_due'];
                $invoice_number=$row['invoice_number'];
                $total_products=$row['total_products'];
                $order_date=$row['order_date'];
                $order_status=$row['order_status'];
                $number++;
            
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo number_format($amount_due); ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $total_products ?></td>
            <td><?php echo $order_date ?></td>
            <td><?php echo $order_status ?></td>
            <td><a href="href=index.php?delete_order=<?php echo $order_id ?>" class='text-dark' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='uil uil-trash'></i></a></td>
        </tr>
        <?php
            }
        }else{
            echo "<h3 class='bg-danger text-center my-4'>there is no order to display</h3>";
        }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <a href="index.php?list_orders"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></a>
        <a href="index.php?delete_order=<?php echo $order_id ?>"><button type="button" class="btn btn-primary">Yes</button></a>
      </div>
    </div>
  </div>
</div>