<?php

include_once('../Includes/connect.php');
include_once('../functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>


    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- fontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css File -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
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
                    <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="#">Total Price <?php total_price_cart() ?></a>
                    </li>
                    
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data"/>
                    <input type="submit" value="submit" class="btn btn-outline-success " name="search_data_product">
                </form>
                </div>
            </div>
        </nav>






        <h2 class="text-center ">
            Payment Options
        </h2>
        <?php
            // php code to access user id
            global $con;
            $userIp=get_Ip_Address();
            $get_user="select * from `user_table` where User_ip='$userIp'";
            $result_ipAdress=mysqli_query($con,$get_user);
            $run_query=mysqli_fetch_assoc($result_ipAdress);

            $user_id=$run_query['User_id'];
        ?>


        <div class="row">
            <div class="col-md-6">
                <a href="https://www.paypal.com" width="250px"><img src="../Images/PayPal.jpeg"></a>
            </div>
            <div class="col-md-6">
                <a href="../order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>