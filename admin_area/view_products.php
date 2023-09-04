<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
</head>
<body>
    <h3 class="text-center text-success ">All products</h3>

        <table class="table table-bodered mt-5 text-center">
            <thead class="bg-info ">
                <tr>
                    <th >Product_Id</th>
                    <th >Product_Titlte</th>
                    <th >Product_Image</th>
                    <th >Product_Price</th>
                    <th >Sold</th>
                    <th >Status</th>
                    <th >Edit</th>
                    <th >Delete</th>

                </tr>
            </thead>
            <tbody class="bg-secondary text-light " >
                <?php
                $get_products="select * from products";
                $result_products=mysqli_query($con,$get_products);
                while($row=mysqli_fetch_assoc($result_products)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $status=$row['status'];
                    ?>

                    <tr>
                    <td ><?php echo $product_id ?></td>
                    <td><?php echo $product_title?></td>
                    <td><img class='product_img' src='./product_images/<?php echo $product_image1?>'></td>
                    <td> <?php echo $product_price?></td>
                    <td><?php 
                    $get_count="select * from `order_pending` where product_id='$product_id'";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?>  
                    </td>
                    <td> <?php echo $status?></td>
                    <td><a href='' class='text-light' ><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                    

                </tr>
                
                

                <?php
                }
                ?>
                
           
            </tbody>
        </table>

    
</body>
</html>