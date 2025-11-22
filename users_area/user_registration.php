<?php
include('../Includes/connect.php');
include('../functions/common_function.php');
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


<?php
// check if i click on submit

if(isset($_POST['userRegister'])){
    global $con;
    // access attributes
    $username=$_POST['user_username'];
    $user_email=$_POST['user_Email'];
    $uer_image=$_FILES['user_image']['name'];
    $uer_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_confc_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_Contact=$_POST['user_contact'];
    $user_ip=get_Ip_Address();

    // select 
    $select_query="select * from user_table where username='$username' or
    useremail='$user_email'";
    $exe_query=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($exe_query);
    if($row_count>0){
        echo "<script>alert('user name or email already exist')</script>";
    }
    elseif($user_password != $user_confc_password){
        echo "<script> alert('password not match') </script>";
    }
    else{
    // to upload images
    move_uploaded_file($uer_image_tmp,"./user_images/$uer_image");
    // to insert inside database
    $insert_query="insert into `user_table`
    (username,useremail,userpassword,User_image,
    User_ip,User_address,User_mobile)
    values ('$username','$user_email','$user_password','$uer_image',
    '$user_ip','$user_address','$user_Contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }else{
        
    die("connection failed". mysqli_connect_error());
    }
}
}

?>