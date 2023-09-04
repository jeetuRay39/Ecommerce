<?php
include_once('../includes/connect.php');
include_once('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}
$user_ip=getIPAddress();
$total_price=0;
$invoice_number=mt_rand();
$status='pending';


$select_product_price="select * from cart_details where ip_address='$user_ip'";
$result_product_price=mysqli_query($con,$select_product_price);
$count=mysqli_num_rows($result_product_price);
while($row_price=mysqli_fetch_array($result_product_price)){
    $product_id=$row_price['product_id'];
    $select_product="select * from `products` where product_id='$product_id'";
    $run_price=mysqli_query($con,$select_product);
    while($run_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($run_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;

    }
}

//getting the quantity from the cart
$select_quantity="select * from `cart_details`";
$result_quantity=mysqli_query($con,$select_quantity);
while($row_quantity=mysqli_fetch_array($result_quantity)){
    $get_quantity=$row_quantity['quantity'];

}
if($get_quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}
else{
    $quantity=$get_qunatity;
    $subtotal=$total_price * $get_quantity;

}

$insert_orders="insert into user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status)
values ('$user_id', '$subtotal', '$invoice_number', '$count',  NOW(), '$status' )";
$result_orders=mysqli_query($con,$insert_orders);
if($result_orders){
    echo"<script>alert('data inserted successfully') </script>";
    echo"<script>window.open('profile.php','_self') </script>";
}

//pending orders
$insert_pending_orders="insert into order_pending (user_id, invoice_number,product_id, quantity, order_status)
values ('$user_id',  '$invoice_number', '$product_id', '$quantity' , '$status' )";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);

//deleting items from cart
$empty_cart="delete from `cart_details` where ip_address='$user_ip'";
$delete_query=mysqli_query($con,$empty_cart);


?>