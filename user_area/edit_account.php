<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `user_table` where username='$user_session_name' ";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id =$row_fetch['user_id'];
    $user_name =$row_fetch['username'];
    $user_email =$row_fetch['user_email'];
    $user_address =$row_fetch['user_address'];
    $user_mobile =$row_fetch['user_mobile'];


    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $user_name =$_POST['user_username'];
        $user_email =$_POST['user_email'];
        $user_address =$_POST['user_address'];
        $user_mobile =$_POST['user_mobile'];
        $user_image =$_FILES['user_image']['name'];
        $user_tmp_image =$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_tmp_image,"./user_images/$user_image");

        //update query
        $update_query ="update `user_table` set username='$user_name',user_email='$user_email', user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile'
         where user_id='$user_id'  ";
        $result_update_query=mysqli_query($con,$update_query);
        if($result_update_query){
            echo "<script>alert('data updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";

        }else{
            echo "<script>alert('data update unsuccessfully')</script>";
        }
        



    }



}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account</title>
    <style>
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h2 class="text-center text-success mb-4">Edit Account</h2>
    <form action="" method="post" enctype="multipart/form-data" class="text-center" >

    
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name  ?>"  name="user_username">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email  ?>" name="user_email">
    </div>
    <div class="form-outline mb-4 d-flex m-auto w-50">
        <input type="file" class="form-control m-auto" name="user_image">
        <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_image">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile  ?>" name="user_mobile">
    </div>

    
    <input type="submit" value="Update" name="user_update" class="bg-info py-2 px-3 border-0" >

    </form>

    
    
    
</body>
</html>