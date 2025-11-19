<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){

    // Get input values
    $product_title = $_POST['product_title'];
    $description = $_POST['product_description'];
    $keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['brand'];
    $product_price = $_POST['product_price'];
    $product_status = "true";

    // Get images from $_FILES (NOT $_POST)
    $product_Image1 = $_FILES['product_image1']['name'];
    $product_Image2 = $_FILES['product_image2']['name'];
    $product_Image3 = $_FILES['product_image3']['name'];

    $temp_Image1 = $_FILES['product_image1']['tmp_name'];
    $temp_Image2 = $_FILES['product_image2']['tmp_name'];
    $temp_Image3 = $_FILES['product_image3']['tmp_name'];

    // Validate empty fields
    if(
        empty($product_title) || empty($description) || empty($keyword) ||
        empty($product_category) || empty($product_brand) || empty($product_price) ||
        empty($product_Image1) || empty($product_Image2) || empty($product_Image3)
    ){
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    }
    else{
    // Upload images
    move_uploaded_file($temp_Image1, "./product_images/$product_Image1");
    move_uploaded_file($temp_Image2, "./product_images/$product_Image2");
    move_uploaded_file($temp_Image3, "./product_images/$product_Image3");

    // Insert product query
    $insert_query = "INSERT INTO `product` 
    (product_title, productDescription, ProductKeyWord, category_Id, brand_Id,
    productImage1, productImage2, productImage3, product_price, date, status)
    VALUES 
    ('$product_title', '$description', '$keyword', '$product_category', '$product_brand',
    '$product_Image1', '$product_Image2', '$product_Image3', '$product_price', NOW(), '$product_status')";

    $result_query = mysqli_query($con, $insert_query);

    if($result_query){
        echo "<script>alert('Product added successfully')</script>";
    } else {
        echo "<script>alert('Error: Product not added')</script>";
    }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashborad</title>
    <!-- bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- fontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css File -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description">
                </div>


                <!-- keyword -->
                <div class="form-outline mb-4 w-50 m-auto  ">
                    <label for="product_keyword" class="form-label">Product KeyWord</label>
                    <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword">
                </div>


                <!-- category -->
                <div class="form-outline mb-4 w-50 m-auto  ">
                    <label for="product_category" class="form-label">Product Category</label>
                    <select name="product_category" id="product_category" class="form-select">
                        <option value="">Select a Category</option>
                        <?php
                        $select_query="select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row_data=mysqli_fetch_assoc($result_query)){
                            $cat_title=$row_data['CategoryTitle'];
                            $cat_id=$row_data['Category_Id'];
                            echo "<option value='$cat_id'>$cat_title</option>";
                        }
                        ?>
                    </select>
                </div>


                <!-- brands -->
                <div class="form-outline w-50 m-auto">
                        <label for="brand" class="form-label">Brand</label>
                        <select name="brand" id="brand" class="form-select">
                            <option value="">select brand name</option>

                            <?php
                            $select_query="select * from `brand`";
                            $result_query=mysqli_query($con,$select_query);
                            while($row_data=mysqli_fetch_assoc($result_query))
                            {
                                $brand_title=$row_data['BrandTitle'];
                                $brand_id=$row_data['BrandId'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                            ?>

                        </select>
                </div>

                <!-- image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product Image</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control">

                </div>

                 <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product Image</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control">

                </div>

                 <!-- image 3-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product Image</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control">
                </div>

                <!-- price -->
                <div class="form-outline mb-4 w-50 m-auto"> 
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price">

                </div>


                <!-- submit -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-success mb-3 px-3" value="Save">
                </div>
        </form>
    </div>
</body>
</html>