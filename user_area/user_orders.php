<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_orders</title>
</head>
<body>
<?php 
$username=$_SESSION['username'];
$get_user="select * from `user_table` where username='$username'";
$result_user=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result_user);
$user_id=$row_fetch['user_id'];

?>


    <h3>My Orders</h3>
    <table class="table table-bordered text-center  mt-5">
        <thead class="bg-info" >
        <tr>
            <th>SN.</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Status</th>
            <th>operation</th>
        </tr>
        </thead>
        <tbody class="bg-secondary text-light " >

        <?php
        $get_order_details="select * from `user_orders` where user_id='$user_id'";
        $result_orders=mysqli_query($con,$get_order_details);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_status=$row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='incomplete';

            }else{
                $order_status='complete';
            }
            $order_date=$row_orders['order_date'];
            
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";

            ?>


            <?php
            if($order_status=='complete'){
                echo"<td>paid<td>";
            }
            else{
                echo "<td><a href='confirm_payement.php?order_id=$order_id' class='text-light text-decoration-none' >Confirm</a></td>
                </tr>";

            }
            $number++;
            
            

        }


            ?>
            
            
            

        
        
        </tbody>
        
    </table>
</body>
</html>