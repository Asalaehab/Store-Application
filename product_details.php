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
        <title>Ecommerace Website</title>
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <!-- fontAwsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Css File -->
        <link rel="stylesheet" href="style.css">
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
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><?php cart_item() ?></a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="#">Total Price 100/-</a>
                    </li>
                    
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data"/>
                    <input type="submit" value="submit" class="btn btn-outline-success " name="search_data_product">
                </form>
                </div>
            </div>
        </nav>
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
    


        <!-- four child -->
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <?php
                    if(isset($_GET['product_Id']))
                    {
                        $product_Id=$_GET['product_Id'];
                    }
                    $selectQuery="select * from `product`
                    where product_Id=$product_Id";

                    $result_query=mysqli_query($con,$selectQuery);

                    $row = mysqli_fetch_assoc($result_query);

                    $product_title = $row['product_title'];
                    $product_price = $row['product_price'];
                    $product_image1 = $row['productImage1'];
                    $product_image2 = $row['productImage2'];
                    $product_image3 = $row['productImage3'];
                    $product_description = $row['productDescription'];
                    $product_brand_id=$row['brand_Id'];
                    
                    ?>
                    <!--  -->
                    <div class="col-md-4">
                        <!-- card -->
                            <div class="card">
                                <img src='admin_area/product_images/<?php echo $product_image1; ?>' alt="" class="card-img-top img-fluid">
                                <div class="d-flex mt-3">
                                <img src='admin_area/product_images/<?php echo $product_image1; ?>'class="img-thumbnail me-2" style="width:70px; height:70px;">
                                <img src='admin_area/product_images/<?php echo $product_image2; ?>' class="img-thumbnail me-2" style="width:70px; height:70px;">
                                <img src='admin_area/product_images/<?php echo $product_image3; ?>' class="img-thumbnail" style="width:70px; height:70px;">
                            </div>
                        </div>
                    </div>
                <?php
            
            
    

                $brand_title = 'Unknown';
                if ($product_brand_id > 0) {
                    $brand_query = "SELECT BrandTitle FROM `brand` WHERE BrandId = $product_brand_id LIMIT 1";
                    $brand_result = mysqli_query($con, $brand_query);
                    if ($brand_result && mysqli_num_rows($brand_result) > 0) {
                        $brand_row = mysqli_fetch_assoc($brand_result);
                        $brand_title = $brand_row['BrandTitle'] ?? 'Unknown';
                    }
                }
                ?>

                <div class="col-md-8">
                    <h2 class="text-dark"><?php echo htmlspecialchars($product_title); ?></h2>

                    <p>
                        <strong class="text-danger fs-3"><?php echo htmlspecialchars($product_price); ?></strong>
                    </p>

                    <p><strong>Brand:</strong> <?php echo htmlspecialchars($brand_title); ?></p>

                    <button class="btn btn-danger btn-lg me-3">Add To Cart</button>
                    <button class="btn btn-dark btn-lg">Buy Now</button>

                    <hr>
                </div>

                    <?php
                        
                        get_unique_categories();
                        get_unique_brands();
                    
                    ?>
                </div>
            </div>
            
            <div class="col-md-2 bg-pink p-0 text-center">   
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-pink-light">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>


                    <?php
                        getbrands();
                    
                    ?>
                </ul>
                <!-- Side Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-pink-light">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                </ul>
                <?php
                getCategory();
                ?>
            
        

            </div>
    

        <!-- Last Child --> 
        <div class="bg-pink text-white text-center p-2">
            <p>All Right-Designed for Asala Ehab</p>
        </div> 
    </div>
    





        <!-- Js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>