
<?php
include_once('../includes/connect.php');
include_once('../functions/common_function.php');
@session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <title>User Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluid m-3">
        <h2 class="text-center"> User Login</h2>
        <div class="row d-flex text-align-item-center justify-content-center"> 
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="enter your username"
                         autocomplete="off" required="required" name="user_username">
                    </div>


                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="enter your password"
                         autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="login" class="btn btn-primary b-0" name="user_login" >
                        <p class="small">Don't have an account? <a href="user_registration.php" class="text-decoration-none text-danger">Register</a> </p>
                    </div>

                </form>

            </div>
        </div>
    </div>


  </main>
  <footer>
    <!-- place footer here -->
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
<?php



if(isset($_POST['user_login'])){
  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];
  $user_ip=getIPAddress();

  $select_query="select * from `user_table` where username='$user_username'";
  $result_query=mysqli_query($con,$select_query);
  $rows=mysqli_num_rows($result_query);

  
  if($rows>0){
    while($row_data=mysqli_fetch_assoc($result_query)){
      if(password_verify($user_password,$row_data['user_password'])){
        echo "<script>alert('login successfull')</script>";
        @session_start();
          $_SESSION['username']=$user_username;
  
  
      }
      else{
        echo "<script>alert('invalid credentials')</script>";
  
      }
    }


  }
  else{
    echo "<script>alert('invalid credentials')</script>";
  }
    //cart item
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
    $result_query_cart=mysqli_query($con,$select_query_cart);
    $rows_cart=mysqli_num_rows($result_query_cart);
    if($rows_cart>0){
      while($row_data_cart=mysqli_fetch_assoc($result_query_cart)){
        
          if($rows_cart==1 && $row_data_cart==0 ){
            
            echo "<script>window.open('profile.php','_self')</script>";
            
  
          }
          else{
            
            echo "<script>window.open('payment.php','_self')</script>";
  
          
        }
      }
    }
  
        else{
          echo "<script>window.open('../index.php','_self')</script>";
    
        }
      }



?>