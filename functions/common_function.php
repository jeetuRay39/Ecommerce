<?php
// including connect files

// include_once('../includes/connect.php');

// getting products
function getproducts() {
                global $con;
                if(!isset($_GET['category']) && !isset($_GET['brand'])) {
                    


                $select_query="select * from `products` order by rand() LIMIT 0,3";
                $result_query=mysqli_query($con, $select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $procuct_title=$row['product_title'];
                    $procuct_description=$row['Product_description'];
                    $procuct_image1=$row['product_image1'];
                    $procuct_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];

                    echo "<div class='col-md-4'>
                    <div class='card mb-2'>
                        <img src='./admin_area/product_images/$procuct_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$procuct_title</h5>
                            <p class='card-text'>$procuct_description</p>
                            <p class='card-text'>$procuct_price</p>

                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
                }


            
        }

    }

    // getting all the products
    function get_all_products(){
        global $con;
        if(!isset($_GET['category']) && !isset($_GET['brand'])) {
            


        $select_query="select * from `products` order by rand()";
        $result_query=mysqli_query($con, $select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $procuct_title=$row['product_title'];
            $procuct_description=$row['Product_description'];
            $procuct_image1=$row['product_image1'];
            $procuct_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];

            echo "<div class='col-md-4'>
            <div class='card mb-2'>
                <img src='./admin_area/product_images/$procuct_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$procuct_title</h5>
                    <p class='card-text'>$procuct_description</p>
                    <p class='card-text'>$procuct_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        }


    
}
    }

    //getting unique category
    function get_unique_categories(){
        global $con;
        if(isset($_GET['category'])) {
            $category_id = $_GET['category'];
            


        $select_query="select * from `products` where category_id=$category_id";
        $result_query=mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        else{
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $procuct_title=$row['product_title'];
                $procuct_description=$row['Product_description'];
                $procuct_image1=$row['product_image1'];
                $procuct_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
    
                echo "<div class='col-md-4'>
                <div class='card mb-2'>
                    <img src='./admin_area/product_images/$procuct_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$procuct_title</h5>
                        <p class='card-text'>$procuct_description</p>
                        <p class='card-text'>$procuct_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>";
            }
    

        }


    
}

    }

function get_unique_brands(){
        global $con;
        if(isset($_GET['brand'])) {
            $brand_id = $_GET['brand'];
            


        $select_query="select * from `products` where brand_id=$brand_id";
        $result_query=mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
        }
        else{
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $procuct_title=$row['product_title'];
                $procuct_description=$row['Product_description'];
                $procuct_image1=$row['product_image1'];
                $procuct_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
    
                echo "<div class='col-md-4'>
                <div class='card mb-2'>
                    <img src='./admin_area/product_images/$procuct_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$procuct_title</h5>
                        <p class='card-text'>$procuct_description</p>
                        <p class='card-text'>$procuct_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>";
            }
    

        }


    
}

    }




 function getbrands(){
                    global $con;
                    $select_query="select * from brands";
                    $result_select=mysqli_query($con,$select_query);
                    
                    while($row=mysqli_fetch_assoc($result_select)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<li class='nav-item'><a class='nav-link text-light' href='index.php?brand=$brand_id' > $brand_title </a> </li>";
                    }


 }         
 
 function getcategories(){

                global $con;
                $select_query="select * from categories";
                $result_select=mysqli_query($con,$select_query);
                
                while($row=mysqli_fetch_assoc($result_select)){
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<li class='nav-item'><a class='nav-link text-light' href='index.php?category=$category_id' > $category_title </a> </li>";
                }
 }


function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="select * from `products` where product_keywords like '%$search_data_value%'";
        $result_search=mysqli_query($con,$search_query);
        while($row=mysqli_fetch_assoc($result_search)){
            $product_id=$row['product_id'];
            $procuct_title=$row['product_title'];
            $procuct_description=$row['Product_description'];
            $procuct_image1=$row['product_image1'];
            $procuct_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];

            echo "<div class='col-md-4'>
            <div class='card mb-2'>
                <img src='./admin_area/product_images/$procuct_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$procuct_title</h5>
                    <p class='card-text'>$procuct_description</p>
                    <p class='card-text'>$procuct_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        }

    }
}
//view details of the product
function view_details(){
    global $con;
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];

        if(!isset($_GET['category']) && !isset($_GET['brand'])) {

            


            $select_query="select * from `products` where product_id='$product_id'";
            $result_query=mysqli_query($con, $select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $procuct_title=$row['product_title'];
                $procuct_description=$row['Product_description'];
                $procuct_image1=$row['product_image1'];
                $product_image2=$row['product_image2'];
                $product_image3=$row['product_image3'];
                $procuct_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
    
                echo "<div class='col-md-4'>
                <div class='card mb-2'>
                    <img src='./admin_area/product_images/$procuct_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$procuct_title</h5>
                        <p class='card-text'>$procuct_description</p>
                        <p class='card-text'>$procuct_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>";
            echo"<div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info'>Related products</h4>
                </div>

                <div class='col-md-6'>
                    <img src='./images/$product_image2' class='card-img-top' alt='...'>

                </div>
                <div class='col-md-6'>
                    <img src='./images/$product_image3' class='card-img-top' alt='...'>
                </div>
            </div>

        </div>";
            }
    
    
        
    }

    }



}

// to get the ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  


// cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_product_id = $_GET['add_to_cart'];
        $ip=getIPAddress();
        $select_query="select * from `cart_details` where product_id='$get_product_id' and ip_address='$ip' ";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('this item is present in the cart')</script></h2>";
            echo "<script>window.open('index.php,'_self')</script>";
        }

        else{
            $insert_query= "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('item added to the cart')</script></h2>";
            echo "<script>window.open('index.php,'_self')</script>";

        }


    }



}

function cart_item(){



        
            global $con;
            
            $ip=getIPAddress();
            $select_query="select * from `cart_details` where ip_address='$ip' ";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);



      
        echo $count_cart_items;
 



}
function total_cart_price(){
    global $con;
    $total=0;
    $ip=getIPAddress();
    $select_query="select * from `cart_details` where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($result_query)){
        $get_product_id=$row['product_id'];
        $select_products="select * from products where product_id='$get_product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_get_price=mysqli_fetch_array($result_products)){
            $get_product_price=array($row_get_price['product_price']);
            $product_values=array_sum($get_product_price);
            $total+=  $product_values;

        }

        
    }
       echo $total;

}


function get_users_order_details(){
    global $con;
    $username = $_SESSION['username'];
    $get_details="select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="select * from `user_orders` where user_id='$user_id' and order_status='pending'";
                    $result_get_orders=mysqli_query($con,$get_orders);
                    $row_get_orders=mysqli_num_rows($result_get_orders);
                    if($row_get_orders>0){
                        echo "<h3 class='text-center'> You have <span class='text-danger'>$row_get_orders</span> orders pending</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>order details</a></p>>";
                        
                   }
                   else{
                    echo "<h3 class='text-center'> You have zero orders pending</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>explore products</a></p>";

                   }

                }
            }
        }
    }


}


?>
