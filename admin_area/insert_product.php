<?php
include '../includes/connect.php';
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='True';

    //accessing imgae_FILES

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accessing temp name for image to insert into database

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    
    //checking empty condition
    if($product_title=='' or $description=='' or $product_category=='' or $product_brands==''
     or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' )
     {
        echo "<script>alert('please fill all the fields') </script>";
        exit();

    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_query="insert into `products` (product_title,Product_description, product_keywords, category_id, brand_id,
        product_image1, product_image2, product_image3, product_price, date,  status) values ('$product_title','$description', '$product_keywords', 
        '$product_category', '$product_brands', '$product_image1','$product_image2','$product_image3', '$product_price', NOW(), '$product_status' )" ;

        $result_query = mysqli_query($con, $insert_query);
        if($result_query){
            echo "<script>alert('product inserted successfully') </script>";
            
        }
        else{
            echo "<script>alert('product not inserted ') </script>";
        }

    }




}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- awesome font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link  -->
    <link rel="stylesheet" href="../style.css">
    <title>admin-insert-product</title>
</head>
<body class="bg-light">
    <div class="container mt-3 ">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="prouct_title" class="form-label">product title</label>
                <input type="text" name="product_title" for="product_title" class="form-control" placeholder="enter the product title" autocomplete="off" required="required" >
    
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description " class="form-label">product description </label>
                <input type="text" name="product_description" for="product_description" class="form-control" placeholder="enter the product description " autocomplete="off" required="required" >
    
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords " class="form-label">prouct keywords </label>
                <input type="text" name="product_keywords" for="product_keywords " class="form-control" placeholder="enter the product keywords " autocomplete="off" required="required" >
    
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
            
                
                <select class="form-select" name="product_category" id="">
                    <option selected>Select one</option>
                    <?php
                    $select_query = "select * from categories";
                    $result_query= mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title= $row['category_title'];
                        $category_id= $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";


                    }

                    ?>
                </select>
            
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
            
                
            <select class="form-select" name="product_brands" id="">
                <option selected>Select one</option>
            <?php
                    $select_query = "select * from brands";
                    $result_query= mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title= $row['brand_title'];
                        $brand_id= $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";


                    }

                    ?>

            </select>
   
        </div>
        <!-- image1 -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1 " class="form-label">prouct image1 </label>
                <input type="file" name="product_image1" for="product_image1 " class="form-control" required="required" >
    
        </div>
                <!-- image2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2 " class="form-label">prouct image2 </label>
                <input type="file" name="product_image2" for="product_image2 " class="form-control" required="required" >
    
        </div>
                <!-- image3 -->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3 " class="form-label">prouct image3 </label>
                <input type="file" name="product_image3" for="product_image3 " class="form-control" required="required" >
    
        </div>
        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="prouct_price" class="form-label">product price</label>
                <input type="text" name="product_price" for="product_price" class="form-control" placeholder="enter the product price" autocomplete="off" required="required" >
    
            </div>
            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="insert Product" >
    
            </div>


            
        </form>


        
    </div>

    
</body>
</html>