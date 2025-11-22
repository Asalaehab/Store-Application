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
if(isset($_POST['userLogin'])){
    $username=$_POST['user_username'];
    $password=$_POST['user_password'];

    $select_query="select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($row_count>0){
            if(password_verify($password,$row_data['userpassword'])){
                echo "<script>alert('Login Successful')</script>";
            }else{
                echo "<script>alert('invalid credentials')</script>";
            }
    }else{
        echo "<script>alert('invalid credentials')</script>";
    }
}


?>