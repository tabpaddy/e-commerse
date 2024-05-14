<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered my-5">
    <thead class="table-info text-center">
        <?php
            $payment_query="SELECT * FROM user_payment";
            $payment_query_result=mysqli_query($con, $payment_query);
            $count_payment_query_result=mysqli_num_rows($payment_query_result);
            if($count_payment_query_result>0){
                echo "<tr>
                <th>SL no</th>
                <th>Amount</th>
                <th>Invoice number</th>
                <th>Payments mode</th>
                <th>order date</th>
                <th>Delete</th>
                </tr>
            </thead>
            ";
            $number=0;
            while($row_data=mysqli_fetch_assoc($payment_query_result)){
                $payment_id=$row_data['payment_id'];
                $invoice_number=$row_data['invoice_number'];
                $amount=$row_data['amount'];
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;
                echo"
                <tbody class='table-secondary text-center'>
                <tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>". number_format($amount) ."</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='href=index.php?delete_payments=$payment_id' class='text-dark' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='uil uil-trash'></i></a></td>
            </tr>
        </tbody>";   
            }
            }else{
                echo "<h3 class='bg-danger text-center my-4'>No payment recieved</h3>";
            }
        ?>
        
        
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <a href="index.php?list_payments"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></a>
        <a href="index.php?delete_payments=<?php echo $payment_id ?>"><button type="button" class="btn btn-primary">Yes</button></a>
      </div>
    </div>
  </div>
</div>