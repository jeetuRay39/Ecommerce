<?php
include '../includes/connect.php';
if(isset($_POST['insert_brand'])){

  
  $brand_title=$_POST['brand_title'];
  $select_query="select * from brands where brand_title= '$brand_title' ";
  $result_select=mysqli_query($con,$select_query);
  $number = mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This brand is present in the database')</script>";

  }
  else{
    $insert_query = "insert into brands (brand_title) values('$brand_title')";
    $result=mysqli_query($con,$insert_query);
    echo "data inserted successfully";
  

  }


}

?>





<div class="container my-5">
<form action="" method="post">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"></span>
  <input type="text" class="form-control" name="brand_title" placeholder="insert brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<button type="submit" name="insert_brand" class="btn btn-primary border-radius-10">insert brands</button>
</form>
</div>