<?php
include '../includes/connect.php';

if(isset($_POST["insert_cat"])){
  $category_title = $_POST['cat_title'];
  $select_query="select * from categories where category_title='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script> alert('This category is present in the database') </script>";
  }
  else{
    $insert_query="insert into categories (category_title) values('$category_title')";
    $result = mysqli_query($con,$insert_query);

  }

}


?>



<div class="container my-5">
<form action="" method="post">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"></span>
  <input type="text" class="form-control" name="cat_title" placeholder="insert categories" aria-label="categories" aria-describedby="basic-addon1">
</div>
<button type="submit" name="insert_cat" class="btn btn-primary border-radius-10">insert categories</button>
</form>
</div>