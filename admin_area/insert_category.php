<?php
include('../Includes/connect.php');

if(isset($_POST['insert_cat'])){

    $category_title=$_POST['cat_title'];

    // select data from database
    $select_query="select * from `categories` where CategoryTitle='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('This category is present inside the database')</script>";
        exit();
    }
    else{

        $inser_query="insert into `categories` (CategoryTitle) values ('$category_title')";
        $result=mysqli_query($con,$inser_query);
    
        if($result){
            echo "<script>alert('Category has been inserted successfully')</script>";
        }
    }
}
?>

<form action="" method="post" class="mb-2">
    <div class="input-group flex-nowrap w-90 mb-2">
        <span class="input-group-text   bg-pink" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="addon-wrapping">
    </div>


    <div class="input-group">
        <input type="submit" class="form-control bg-pink text-light" 
        name="insert_cat" placeholder="Insert Categories" 
        value="Insert Categories"
        >
    </div>

</form>