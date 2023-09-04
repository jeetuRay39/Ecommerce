<?php 
include_once('../includes/connect.php');
include_once('../functions/common_function.php'); 
session_start();


?>

<!doctype html>
<html lang="en">

<head>
    <title>Ecommerce Website using php and mysql</title>
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
    <link rel="stylesheet" href="../style.css">
    <style>
    .profile_img {
        width: 90%;
        margin: auto;
        display: block4;
        height: 100%;
    }
    </style>



</head>

<body>
    <header>
        <!-- place navbar here -->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-sm navbar-light " id="nav1">
                <div class="container">
                    <img src="../images/jrlogo.jpg" alt="" class="logo">
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="../index.php" aria-current="page">Home <span
                                        class="visually-hidden">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">My account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping">

                                    </i><sup><?php cart_item(); ?></sup>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?php total_cart_price(); ?></a>
                            </li>
                        </ul>
                        <form class="d-flex my-2 my-lg-0" action="../search_product.php" method="get">
                            <input class="form-control me-sm-2" type="text" placeholder="Search" name="search_data">
                            <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                            <input type="submit" class="btn btn-primary" value="search"
                                name="search_data_product"></input>

                        </form>
                    </div>
                </div>
            </nav>
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
        <!-- Third child of navbar -->
        <div class="bg-light">
            <h3 class="text-center">Jeetu Ray Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community </p>
        </div>




    </header>
    <main>
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item">
                        <a class="nav-link bg-info mb-3" href="#">
                            <h2>Your profile</h2>
                        </a>
                    </li>
                    <?php

                    $username=$_SESSION['username'];
                    $user_image="select * from `user_table` where username='$username'";
                    $result_image=mysqli_query($con,$user_image);
                    $row_imgae=mysqli_fetch_assoc($result_image);
                    $user_image=$row_imgae['user_image'];
                    echo "<li class='nav-item'>
                    <img src='./user_images/$user_image' alt='' class='profile_img mb-3'>
                </li>"                    
                    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link bg-info " href="profile.php">
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-info" href="profile.php?edit_account">
                            Edit accounts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-info" href="profile.php?my_orders">
                            My orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-info" href="profile.php?delete_account">
                            Delete account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-info" href="logout.php">
                            logout
                        </a>
                    </li>


                </ul>


            </div>
            <div class="col-md-10">
                <?php
                get_users_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                }
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
                ?>
                

            </div>




    </main>
    <footer>
        <?php
        include('../includes/footer.php');
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