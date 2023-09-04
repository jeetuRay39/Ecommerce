<?php
include_once('../includes/connect.php');
include_once('../functions/common_function.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement</title>
      <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</head>
<body>
    <?php
    $user_ip=getIPAddress();
    $select_query="select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$select_query);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];

    
    ?>
    <div class="container m-3">
        <h2 class="text-center text-info">payement options</h2>
        <div class="row d-flex justify-content-center align-items-center m-auto">
            <div class="col-md-6"><a href="https://esewa.com.np" target="_blank"> <img src="../images/esewa.jpeg" 
             alt=""> </a></div>
             <div class="col-md-6"><a href="order.php?user_id=<?php echo $user_id ?>" > <h1>pay offline </h1></a></div>
            

        </div>
        
    </div>
</body>
</html>