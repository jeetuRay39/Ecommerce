<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete_account</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-danger text-center" >Delete Account</h1>
    <form action="" method="post" class="mt-5">
        <div class="from-outline  mb-4">
            <input type="submit" class="from-control w-50 m-auto " name="delete" value="delete account" >
        </div>
        <div class="from-outline  mb-4">
            <input type="submit" class="from-control w-50 m-auto " name="dont_delete" value=" dont delete account" >
        </div>
    </form>
    <?php
    $username=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="delete from `user_table` where username='$username'";
        $result_delete=mysqli_query($con,$delete_query);
        if($result_delete){
            session_destroy();
            echo "<script>alert('account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";

        }

    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";

    }


    ?>
    
</body>
</html>