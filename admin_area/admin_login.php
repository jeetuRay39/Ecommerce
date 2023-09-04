<?php
if(isset($_post['']))

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
      <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- awesome font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5 ">Admin login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_reg.jpg" alt="admin registration " class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" >
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label></br>
                        <input type="text" id="username" name="username" placeholder="enter your username" required="required" class="form-control" >
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label></br>
                        <input type="password" id="password" name="password" placeholder="enter your password" required="required" class="form-control" >
                    </div>
                    
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login" >
                        <p class="small mt-2" >Already have an account? <a href="admin_registration.php" class="text-danger" >Signup</a> </p>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
</body>
</html>