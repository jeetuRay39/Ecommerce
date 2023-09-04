<?php 
include 'includes/connect.php';
include('./functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Ecommerce Website cart details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- awesome font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link  -->
    <link rel="stylesheet" href="style.css">



</head>

<body>
    <header>
        <!-- place navbar here -->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-sm navbar-light " id="nav1">
                <div class="container">
                    <img src="./images/jrlogo.jpg" alt="" class="logo">
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php" aria-current="page">Home <span
                                        class="visually-hidden">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i
                                        class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
            <?php 






?>

        </div>
        <!-- second child of navbar -->
        <nav class="navbar navbar-expand-sm navbar-light ">
            <ul class="navbar-nav me-auto">
            <?php
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href=''>Welcome Guest</a>
                </li>";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>welcome ".$_SESSION['username']."</a> 
                </li>";

                }
                
                ?>
                <?php
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_login.php'>Login</a> 
                </li>";

                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/logout.php'>Logout</a> 
                </li>";

                }
                
                ?>
            </ul>
        </nav>
        <main>
            <div class="container">
                <div class="row">
                    <div class="table-responsive table-bodered text-center">
                    <form method="post" action="">
                    

                        <table class="table table-primary">
                            <thead>

                            </thead>
                            <tbody>
                                <?php
                                global $con;
                                $ip=getIPAddress();
                                $total = 0;
                                $cart_query ="select * from cart_details where ip_address='$ip'";
                                $result_cart=mysqli_query($con,$cart_query);
                                $row_cart=mysqli_num_rows($result_cart);
                                if($row_cart>0){
                                   echo
                                    "<tr>
                                    <th>product title</th>
                                    <th>product image</th>
                                    <th>product price</th>
                                    <th>product quantity</th>
                                    <th>remove</th>
                                    <th colspan='2'>operations</th>
                                    </tr>";

                                
                                
                                $select_query="select * from `cart_details` where ip_address='$ip'";
                                $result_query=mysqli_query($con,$select_query);
                                while($row=mysqli_fetch_array($result_query)){
                                    $get_product_id=$row['product_id'];
                                    $select_products="select * from products where product_id='$get_product_id'";
                                    $result_products=mysqli_query($con,$select_products);
                                    while($row_get_price=mysqli_fetch_array($result_products)){
                                        
                                        $get_product_price=array($row_get_price['product_price']);
                                        $product_values=array_sum($get_product_price);
                                        $total+=$product_values;

                                
                               

                            

                            
                            ?>
                                <tr class="">
                                    <td> <?php echo $row_get_price['product_title']; ?> </td>
                                    <td> <img class="cart_img"
                                            src="./images/<?php echo $row_get_price['product_image1'];?>"></td>
                                    <td><?php echo $row_get_price['product_price']; ?></td>
                                    <?php
                                    if(isset($_POST['updated_cart'])){
                                                                   
                                                                   
                                                               
                           
                                        $quantities=$_POST['qty'];
                                        $update_cart = "UPDATE `cart_details` SET quantity='$quantities' WHERE ip_address='$ip' AND product_id='$get_product_id'";
                                        $result_quantity=mysqli_query($con,$update_cart);
                                        $total=$total * $quantities;
                                        
                                        
                                        
                                        
                                    
                                    
                                    
                                    }
                                    
                                    
                                    
                                    
                                    ?> 
                                   


                                    
                                        <td><input type="number" name="qty" class="form-input w-50" /></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $get_product_id; ?>" /></td>
                                        
                                        
                                        
                                        
                                                               

                                    
                                    
                                    
                                                               



                                        <td>

                                            <!-- <button class="btn btn-primary ">Update</button> -->
                                            <input type="submit" value="update cart" class="btn btn-primary"
                                                name="updated_cart">
                                                <input type="submit" value="remove cart" class="btn btn-primary"
                                                name="remove_cart">
                                            

                                        </td>  
                                    
                                </tr>
                                <?php }}}
                                else{
                                    echo"<h2 class='text-center text-danger'>cart is empty<h2>";
                                }
                                
                                ?>


                            </tbody>
                        </table>
                        


                    </div>
                    <div class="d-flex">
                        <h4 class="text-center">Subtotal: <strong><?php echo $total?> /- </strong>
                            <h4>
                            <button class="btn btn-light"><a href="index.php" class="px-3 text-decoration-none"> continue shopping </a> </button>
                            <button class="btn btn-light"><a href="user_area/checkout.php" class="px-3 text-decoration-none"> checkout </a> </button>
                                
                            </h4>
                    </div>

                    


                </div>

            </div>
            </form>
              
            <?php
            function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id)
                    echo $remove_id;
                    $delete_query="delete from `cart_details` where product_id='$remove_id'";
                    $result_delete=mysqli_query($con,$delete_query);


                }

            }
            remove_cart_item();




            
            ?>


        </main>
        <footer>
            <?php
        include('./includes/footer.php');
        ?>


        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>