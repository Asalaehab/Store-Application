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
                        <!-- User password -->
                        <label for="user_password" class="form-label">password</label>
                        <input type="file" id="user_password" class="form-control"
                        name="user_password"/>
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