<?php 
include_once('../includes/connect.php');

session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id='$order_id'";
    $result_data=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result_data);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $amount=$_POST['amount'];
    $invoice=$_POST['invoice_number'];
    $payment_mode=$_POST['payement_mode'];
    $insert_query="insert into `user_payments` (order_id, invoice_number, amount, payment_mode) 
    values('$order_id','$invoice','$amount','$payment_mode')";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query){
        echo"<script>alert('payment successfull')</script>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }



    $update_query="update `user_orders` set order_status='complete' where order_id='$order_id'";
    $result_update=mysqli_query($con,$update_query);


   
        
   


}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement page</title>
        <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-secondary" >
    <h1 class="text-center text-light">Confirm payement</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline text-center my-4 w-50 m-auto">
            <label for="" class="text-light">Invoice Number</label></br>
                <input type="text" class="from-control w-50 m-auto" name="invoice_number" value=<?php echo $invoice_number?> >
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <label for="" class="text-light">Amount</label></br>
                <input type="text" class="from-control w-50 m-auto" name="amount" value=<?php echo $amount_due ?> >
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <select name="Payement_mode" class="form-select w-50 m-auto" >
                    <option value="" >select payement mode</option>
                    <option value="esewa" >esewa</option>
                    <option value="khlati">khalti</option>
                    <option value="netbanking">netbanking</option>
                </select>
            
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0 " value="confirm" name="confirm_payment" >
            </div>
        </form>
        
    </div>
    
</body>
</html>