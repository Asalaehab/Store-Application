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
    <title>User - Registration</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- fontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css File -->
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
                <!-- Second Child -->
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav me-auto">
                <?php
            

        if(!isset($_SESSION['username'])){
                    echo "
                        <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>
                        ";
                    }else{
                    echo"
                        <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome  ".$_SESSION['username']."</a>
                        </li>";
                    }

                ?>

                <?php
                    if(!isset($_SESSION['username'])){
                       echo "
                        <li class='nav-item'>
                        <a class='nav-link' href='./users_area/userLogin.php'>Login</a>
                        </li>
                        ";
                    }else{
                    echo"
                        <li class='nav-item'>
                        <a class='nav-link' href='#'>Logout</a>
                        </li>";
                    
                    }

                ?>
            </ul>
        </nav>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            Login
        </h2>

        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline">
                        <!-- username -->
                        <label for="user_username" class="form-label">username</label>
                        <input type="text" id="user_username" class="form-control"
                        placeholder="Enter ur user name" required="required"
                        name="user_username"/>
                    </div>


                    <div class="form-outline ">
                        <!-- User password -->
                        <label for="user_password" class="form-label">password</label>
                        <input type="password" id="user_password" class="form-control"
                        name="user_password"/>
                    </div>
                

                

                    <div class="mt-4 pt-2">
                        <div class="text-center">
                        <input type="submit" value="Login"
                        class="bg-info py-2  px-3 border-0 m-5 "
                        name="userLogin"/>
                        </div>


                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account
                            <a href="user_registration.php" class="text-danger">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php

// check if i click on submit

if(isset($_POST['userLogin'])){
    global $con;
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    $user_ip = get_Ip_Address();

    // 1) GET USER INFO
    $user_sql = "select * from user_table where username='$username'";
    $user_result = mysqli_query($con, $user_sql);
    $user_count = mysqli_num_rows($user_result);
    $user_data = mysqli_fetch_assoc($user_result);

    // 2) GET CART ITEMS
    $cart_sql = "select * from card_details where ip_address='$user_ip'";
    $cart_result = mysqli_query($con, $cart_sql);
    $cart_count = mysqli_num_rows($cart_result);

    if($user_count > 0){
        if(password_verify($password, $user_data['userpassword'])){

            echo "<script>alert('Login Successful')</script>";

            if($cart_count == 0){
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                echo "<script>window.open('payment.php','_self')</script>";
            }
            
        } else {
            echo "<script>alert('Invalid password')</script>";
        }
    } else {
        echo "<script>alert('Invalid username')</script>";
    }
}


?>

