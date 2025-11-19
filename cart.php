<!-- connect file -->
<?php
include('./Includes/connect.php');
include('./functions/common_function.php');
// include('./search_product.php');
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecommerace Website card-details</title>
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <!-- fontAwsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Css File -->
        <link rel="stylesheet" href="style.css">
        <style>
            
            .cart_img{
                width: 50px;
                height: 50px;
                object-fit: contain;
            }

        </style>
    </head>
    <body>
        <!-- start Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="./Images/logo.jpeg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="display_products.php">products</a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    
                
                    
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data"/>
                    <input type="submit" value="submit" class="btn btn-outline-success " name="search_data_product">
                </form>
                </div>
            </div>
        </nav>

        <?php
            cart();
        ?>
        <!-- end Navbar -->

        <!-- Second Child -->
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>


        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>
    
        <!-- fourth child -->
        <div class="container">
            <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan="2">Operations</th>
                    </thead>
                    <tbody>
                        <?php
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
                                    $product_title=$row['product_title'];
                                    $productPrice=$row['product_price'];
                                    $productImage1=$row['productImage1'];
                                    $total+=$row['product_price'];
                                    echo"
                                    <tr>
                                        <td>$product_title</td>
                                        <td><img class='cart_img' src='./Images/$productImage1'></td>
                                        <td><input type='text' name='' id=''></td>
                                        <td>$productPrice</td>
                                        <td><input type='checkbox'></td>
                                        <td>

                                            <input type='submit' value='Update Cart'>
                                            <button class='bg-info px-3 py-2 border-0 mx-3'>Remove</button>
                                        </td>
                                    </tr>
                                    ";

                                }
                            }
                            // echo $total;


                        ?>
                    
                    </tbody>
                </table>
            </form>
            </div>
            <div class="d-flex">
                <h4 class="px-3">SubTotal : 
                <strong class="text-info">50000</strong>
            </h4>
            <a href="index.php">
                    <button class="bg-info px-3 border-0">Continue Shopping</button>
            </a>
            </div>
        </div>


    
    



        <!-- include footer -->
        <?php
            include('./footer.php');
        ?>

        <!-- Js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>