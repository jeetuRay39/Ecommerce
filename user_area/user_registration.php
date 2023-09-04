<?php
include_once('../includes/connect.php');
include_once('../functions/common_function.php');
// session_start();

?>
 
<!doctype html>
<html lang="en">

<head>
  <title>User Registration</title>
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
        <h2 class="text-center">New user Registration</h2>
        <div class="row d-flex text-aligh-item-center justify-content-center"> 
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="enter your username"
                         autocomplete="off" required="required" name="user_username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="enter your email"
                         autocomplete="off" required="required" name="user_email">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">user image</label>
                        <input type="file" id="user_image" class="form-control" 
                          required="required" name="user_image">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="enter your password"
                         autocomplete="off" required="required" name="user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">confirm password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="confirm your password"
                         autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">address</label>
                        <input type="text" id="user_username" class="form-control" placeholder="enter your address"
                         autocomplete="off" required="required" name="user_address">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="enter your contact"
                         autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Register" class="btn btn-primary b-0" name="user_register" >
                        <p class="small">Already have an account? <a href="user_login.php" class="text-decoration-none text-danger">Login</a> </p>
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

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");

    $select_query = "select * from user_table where username='$user_username' or user_email='$user_email'";
    $select_result = mysqli_query($con,$select_query);
    $row=mysqli_num_rows($select_result);
    if($row>0){
        echo "<script>alert('username and password already exists')</script>";

    }
    else if ($user_password!=$conf_user_password) {
        echo "<script>alert('passwords do not match')</script>"; 

    }
        

    else{
    // insert_query
    $insert_query="insert into `user_table` (username, user_email,user_password, user_image,user_ip,user_address,user_mobile)
    values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $reuslt_query=mysqli_query($con,$insert_query);
    if($reuslt_query){
        echo "<script>alert('registration successfully')</script>";
    }
    else{
        die(mysqli_error($con)); 
    }

    }
    // selecting cart item
    $select_cart_items= "select * from `cart_details` where ip_address='$user_ip'";
    $result_cart_items=mysqli_query($son,$select_cart_items);
    $rows=mysqli_num_rows($result_cart_items);
    if($rows>0){
      // $_SESSION['username']=$user_username;
      echo "<script>alert('you have items in cart')</script>";
      echo "<script>window.open('checkout.php','_self')</script>"; 

    }
    else{
      echo "<script>window.open('../index.php','_self')</script>";
    }




    

}
?>