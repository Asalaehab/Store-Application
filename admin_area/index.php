<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width: 500px;
            /* height: 100px; */
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg nav-light">
            <div class="container-fluid">
                <img src="../Images/logo.jpeg" class="logo">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Welcome Guest</a>
                    </li>
                </ul>
            </div>
        </nav>


        <!-- second child -->
        <div class="text-center p-3">
            <h3 class="text-center">Manage Details</h3>

        </div>


        <!-- third child -->
        <div class="row">
            <div class="col-md-12  p-1 d-flex align-items-center">
                <div class="p-5">
                    <a href="#"><img src="../Images/product.jpg" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <a href="insert_product.php" class="btn btn-primary my-1">Insert Product</a>
                    <a href="#" class="btn btn-primary my-1">View Product</a>
                    <a href="#" class="btn btn-primary my-1">View Category</a>
                    <a href="index.php?insert_category" class="btn btn-primary my-1">Insert Category</a>
                    <a href="index.php?insert_brands" class="btn btn-primary my-1">Insert Brands</a>
                    <a href="#" class="btn btn-primary my-1">View Brands</a>
                    <a href="#" class="btn btn-primary my-1">All Users</a>
                    <a href="#" class="btn btn-primary my-1">All Payment</a>
                    <a href="#" class="btn btn-primary my-1">All Orders</a>
                    <a href="#" class="btn btn-primary my-1">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- fourth child -->
    <div class="container">
    <?php
        if(isset($_GET['insert_category'])){
            include('insert_category.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        ?>
    </div>


      <!-- Last Child --> 
        <div class="bg-pink text-white text-center p-2">
            <p>All Right-Designed for Asala Ehab</p>
        </div> 


    <!-- bootsrap Js Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>