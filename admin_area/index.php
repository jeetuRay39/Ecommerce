<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <title>admin dashboard</title>
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

    <!-- css file  -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_logo{
            width: 100%;
            height: 100px;
            object-fit: contain;
        }
        #admin_footer{
            position: absolute;
            bottom: 0;
        }
        .product_img{
            width: 10%;
            object-fit: contain;
        }

        </style>

</head>

<body>
  <header>
    <!-- place navbar here -->

        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-sm navbar-light bg-light" id="nav1">
                <div class="container-fluid">
                    <img src="../images/jrlogo.jpg" alt="" class="logo">
                    <nav class="navbar navbar-expand-sm navbar-light ">
                        <ul class="navbar-nav">
                            <li class="nav-item"> <a href="#" class="nav-link">Welcome Guest</a> </li>
                        </ul>
                    </nav>
                </div>
                

            </nav>
            <!-- second child -->
            <div class="bg-light">
                <h3 class="text-center p-2" id="footer"> Manage details </h3>
            </div> 
            <!-- third child -->
            <div class="row">
                <div class="col-md-12 bg-secondary p-1 d-flex">
                    <div>
                        <a href="#"> <img src="../images/jrlogo.jpg" alt="" class="admin_logo" > </a>
                        <p class="text-light text-center">Welcome admin</p>
                        
                    </div>
                    <div class="button text-center">
                        <button><a href="insert_product.php" class="nav-link text-light bg-info">insert products</a></button>
                        <button><a href="index.php?view_products" class="nav-link text-light bg-info">view products</a></button>
                        <button><a href="index.php?insert_category" class="nav-link text-light bg-info">insert categories</a></button>
                        <button><a href="" class="nav-link text-light bg-info">view categories</a></button>
                        <button><a href="index.php?insert_brands" class="nav-link text-light bg-info">insert brands</a></button>
                        <button><a href="" class="nav-link text-light bg-info">view brands</a></button>
                        <button><a href="" class="nav-link text-light bg-info">all orders</a></button>
                        <button><a href="" class="nav-link text-light bg-info">all payements</a></button>
                        <button><a href="" class="nav-link text-light bg-info">list users</a></button>
                        <button><a href="" class="nav-link text-light bg-info">logout</a></button>
                    </div>
                    
                </div>
            </div>

        </div>

    
  </header>

  <main>
    <?php
    if(isset($_GET['insert_category'])){
        include'insert_categories.php';
    }
    if(isset($_GET['insert_brands'])){
        include 'insert_brands.php';
    }
    if(isset($_GET['view_products'])){
        include 'view_products.php';
    }

    ?>

  </main>
  <footer>
    <!-- place footer here -->
    <div class="bg-info p-3 text-center" id="footer">
      <p>All rights reserved - Designed by Jeetu Ray 2023 </p>
     </div>
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