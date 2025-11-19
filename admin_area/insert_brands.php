<?php
include('../Includes/connect.php');

if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];

    // select data from database

    $select_query="select * from `brand` where BrandTitle='$brand_title'";
    //execute query
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('This brand is present inside the database')</script>";
        exit();
    }
    else{

        $inser_query="insert into `brand` (BrandTitle) values ('$brand_title')";
        $result=mysqli_query($con,$inser_query);
    
        if($result){
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }

}

?>



<form action="" method="post" class="mb-2">
    <div class="input-group flex-nowrap w-90 mb-2">
        <span class="input-group-text   bg-pink" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Username" aria-describedby="addon-wrapping">
    </div>


    <div class="input-group">
        <input type="submit" class="form-control bg-pink text-light" 
        name="insert_brand" placeholder="Insert Categories" 
        value="Insert brand"
        >
    </div>

</form>