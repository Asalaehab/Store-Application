<?php
// including connect file
include('../Includes/connect.php');










//getting products
function getproducts()
{
    global $con;

    // If no category and no brand selected → show all products
    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        // $category_Id=$_GET['category'];
        $select_query = "SELECT * FROM `product` ORDER BY RAND()";
        $result_query = mysqli_query($con, $select_query);

        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_Id = $row_data['product_Id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['productDescription'];
            $product_Image = $row_data['productImage1'];
             $product_price=$row_data['product_price'];

            // $product_price = $row_data['product_price'];
            $brand=$row_data['brand_Id'];

            echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_Image' class='card-img-top' alt='$product_title'>
                        <br>
                        
                        <br>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$description</p>
                            <p class='card-text'>Price : $product_price/-</p>

                            <a href='index.php?Add_to_cart=$product_Id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_Id=$product_Id' class='btn btn-info'>view More</a>
                        </div>
                    </div>
                </div>
            ";
        }
    }
}

function get_unique_categories()
{
    global $con;
    if (isset($_GET['category']))
    {
        $category_Id = $_GET['category'];
        $select_query = "SELECT * FROM `product` where category_Id=$category_Id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows == 0){
                echo"<h2 class='text-center text-danger'>No Stock for this category</h2>";
        }else{

        

        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_Id = $row_data['product_Id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['productDescription'];
            $product_Image = $row_data['productImage1'];
            $product_price = $row_data['product_price'];

            echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_Image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$description</p>
                            <p class='card-text'>Price : $product_price/-</p>

                           <a href='index.php?Add_to_cart=$product_Id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_Id=$product_Id' class='btn btn-info'>view More</a>
                        </div>
                    </div>
                </div>
            ";
        }
     }
    }
}


function get_unique_brands()
{
    global $con;
    if (isset($_GET['brand'])) 
    {
        $category_Id = $_GET['brand'];
        $select_query = "SELECT * FROM `product` where brand_Id=$category_Id";
        $result_query = mysqli_query($con, $select_query);
        $numOfRows=mysqli_num_rows($result_query);
        if($numOfRows==0){
            echo "<h2 class='text-center text-danger'>not available </h2>";
        }


        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_Id = $row_data['product_Id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['productDescription'];
            $product_Image = $row_data['productImage1'];
            $product_price = $row_data['product_price'];

            echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_Image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$description</p>
                            <p class='card-text'>Price : $product_price/-</p>

                            <a href='index.php?Add_to_cart=$product_Id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_Id=$product_Id' class='btn btn-info'>view More</a>
                        </div>
                    </div>
                </div>
            ";
        }
    }
}
function getbrands()
{
    global $con;
    $select_query = "select * from `brand`";
    $result_query = mysqli_query($con, $select_query);
    // $row_data=mysqli_fetch_assoc($result_query);
    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_query)) {
        $brand_title = $row_data['BrandTitle'];
        $brand_id = $row_data['BrandId'];
        echo "<li class='nav-item bg-pink'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                        </li>";
    }
}


function getCategory()
{
    global $con;
    $select_query = "select * from `categories`";
    $result_query = mysqli_query($con, $select_query);
    while ($row_data = mysqli_fetch_assoc($result_query)) {
        $cat_title = $row_data['CategoryTitle'];
        $cat_id = $row_data['Category_Id'];
        echo "<li class='nav-item bg-pink'>
                    <a href='index.php?category=$cat_id' class='nav-link text-light'>$cat_title</a>
                    </li>";
    }
}


function get_search_product(){


    global $con;
    if(isset($_GET['search_data_product'])){
        $value=$_GET['search_data'];
        $search_query="select * from `products`
        where ProductKeyWord like '%$value%'";
        $result_query=mysqli_query($con,$search_query);

        if($result_query){
            while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_Id = $row_data['product_Id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['productDescription'];
            $product_Image = $row_data['productImage1'];
            $product_price = $row_data['product_price'];

            echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_Image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$description</p>
                            <p class='card-text'>Price : $product_price/-</p>

                            <a href='index.php?Add_to_cart=$product_Id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_Id=$product_Id' class='btn btn-info'>view More</a>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        else{
            echo"<h2 class='text-center text-danger'>No Product like that </h2>";
        }

    }

        

       
        
     
}

// geting all products
function get_all_products(){
    global $con;
     $select_query = "SELECT * FROM `product` ORDER BY RAND() LIMIT 4 ";
        $result_query = mysqli_query($con, $select_query);

        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_Id = $row_data['product_Id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['productDescription'];
            $product_Image = $row_data['productImage1'];
            $product_price = $row_data['product_price'];

            echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_Image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$description</p>
                            <p class='card-text'>Price : $product_price/-</p>
                            <a href='index.php?Add_to_cart=$product_Id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_Id=$product_Id' class='btn btn-info'>view More</a>
                        </div>
                    </div>
                </div>
            ";
        }

}

// get ip address

function get_Ip_Address(){
    $ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // Sometimes multiple IPs are passed, take the first one
        $ip = explode(',', $ip)[0];
    } else {
        // Remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


// cart function

function cart(){
    global $con;
    if(isset($_GET['Add_to_cart'])){
        $ip=get_Ip_Address();
        $prodctId=$_GET['Add_to_cart'];

        // query
        $selectQuery=
        "select * 
        from `card_details` 
        where 	product_id=$prodctId and  ip_address='$ip'"
        ;
        //execute
        $result=mysqli_query($con,$selectQuery);
        // reterive
        $num_of_rows=mysqli_num_rows($result);

        if($num_of_rows>0){
            echo "<script>alert('this item is already present inside cart')</script>";
            //i will redeirt to index.php
            echo "<script>window.open('index.php')</script>";
        }else{
            //i will insert item in cart
            $insertQuery="insert into `card_details` (product_id,ip_address,quantity)
            values ($prodctId,'$ip',0)";
            mysqli_query($con,$insertQuery);
            echo "<script>alert('this item is added to card')</script>";

            echo "<script>window.open('index.php','_self')</script>";
        }




    }
}

function cart_item(){
    global $con;
    // if(isset($_GET['Add_to_cart'])){
         $ip=get_Ip_Address();
        // $prodctId=$_GET['Add_to_cart'];
    
        // query
        $selectQuery=
        "select * 
        from `card_details` 
        where 	 ip_address='$ip'"
        ;
        //execute
        $result=mysqli_query($con,$selectQuery);
        // reterive
        $count_number_of_items=mysqli_num_rows($result);
    

     echo $count_number_of_items;




    
    }



// function total_price_cart(){
//     global $con;
//     $total=0;
//     $get_ip_add=get_Ip_Address();
//     $cart_query="select * from `card_details` where ip_address='$get_ip_add'";
//     // execute query
//     $result_query=mysqli_query($con,$cart_query);
//     while($row=mysqli_fetch_array($result_query))
//     {
//         $product_id=$row['product_id'];
//         $select_products="select * from `product` where product_Id = '$product_id'";
//         $result_product=mysqli_query($con,$select_products);
//         while($row_product_price=mysqli_fetch_array( $result_product)){
//             $product_price=array($row_product_price['product_price']);
//             $product_values=array_sum($product_price);
//             $total+=$product_values;
//         }

//     }
//     echo $total;

// }


function total_price_cart(){
    global $con;
    $total=0;
    $ip=get_Ip_Address();
    $ip_query="select * from `card_details` where ip_address='$ip'";
    $ip_result=mysqli_query($con,$ip_query);
    // 
    while($row_data=mysqli_fetch_array($ip_result)){
        $productId=$row_data['product_id'];
        $select_query="select * from `product` where product_Id='$productId'";
        $result_product=mysqli_query($con, $select_query);

        while($row=mysqli_fetch_array($result_product)){
            $total+=$row['product_price'];
        }
    }
    echo $total;


}


?>



