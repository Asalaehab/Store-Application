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
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            New User Registeration
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
                        <!-- Email -->
                        <label for="user_Email" class="form-label">Email</label>
                        <input type="email" id="user_Email" class="form-control"
                        placeholder="Enter ur Email" 
                        name="user_Email"/>
                    </div>


                    <div class="form-outline ">
                        <!-- User Image -->
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control"
                        name="user_image"/>
                    </div>

                

                    <div class="form-outline ">
                        <!-- User Image -->
                        <label for="user_password" class="form-label">password</label>
                        <input type="password" id="user_password" class="form-control"
                        name="user_password"/>
                    </div>

                    <div class="form-outline ">
                        <!-- confirm password -->
                        <label for="conf_user_password" class="form-label">Confirm password</label>
                        <input type="password" id="conf_user_password" class="form-control"
                        name="conf_user_password"/>
                    </div>

                    <div class="form-outline ">
                        <!-- confirm password -->
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control"
                        name="user_address"/>
                    </div>


                    <div class="form-outline ">
                        <!-- confirm password -->
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control"
                        name="user_contact"/>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Register"
                        class="bg-info py-2  px-3 border-0 m-5 "
                        name="userRegister"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->




<!-- PHP REGISTRATION LOGIC -->

<?php
if(isset($_POST['userRegister'])){

    global $con;
    // session_start();
    $username         = $_POST['user_username'];
    $user_email       = $_POST['user_Email'];
    $user_password    = $_POST['user_password'];
    $conf_password    = $_POST['conf_user_password'];
    $user_address     = $_POST['user_address'];
    $user_contact     = $_POST['user_contact'];
    $user_ip          = get_Ip_Address();

    // IMAGE
    $user_image       = $_FILES['user_image']['name'];
    $user_image_tmp   = $_FILES['user_image']['tmp_name'];

    // 1️⃣ Check if username or email already exists
    $check_query = "SELECT * FROM user_table WHERE username='$username' OR useremail='$user_email'";
    $run_check   = mysqli_query($con, $check_query);

    if(mysqli_num_rows($run_check) > 0){
        echo "<script>alert('Username or Email already exists')</script>";
        exit();
    }

    // 2️⃣ Check password match
    if($user_password !== $conf_password){
        echo "<script>alert('Passwords do not match')</script>";
        exit();
    }

    
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);


    if(!empty($user_image)){
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    } else {
        $user_image = "";
    }


    $insert = "INSERT INTO user_table 
    (username, useremail, userpassword, User_image, User_ip, User_address, User_mobile)
    VALUES ('$username', '$user_email', '$hash_password', '$user_image', 
            '$user_ip', '$user_address', '$user_contact')";

    $run_insert = mysqli_query($con, $insert);

    if($run_insert){
        echo "<script>alert('Registration Successful')</script>";
    }

    $check_cart = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $run_cart   = mysqli_query($con, $check_cart);
    $cart_count = mysqli_num_rows($run_cart);

    if($cart_count > 0){
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>

