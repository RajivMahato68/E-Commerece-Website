<?php
if(isset($_GET['edit_category'])){
    $edit_category = $_GET['edit_category'];
    $get_categories = "SELECT * FROM `categories` WHERE categories_id = $edit_category";
    $result = mysqli_query($con, $get_categories);

    // Check for errors in the query
    if (!$result) {
        die("Error in query: " . mysqli_error($con));
    }

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $categories_title = $row['categories_title'];
    }
        // echo $categories_title;
    // } else {
    //     echo "Category not found.";
    // }
}
if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    
    $update_query="UPDATE `categories` SET categories_title='$cat_title' WHERE categories_id = $edit_category";
    $result_cat = mysqli_query($con, $update_query);

    if ($result_cat) {
        echo "<script>alert('Category Updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>


<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action=""method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control text-center" required="required" value='<?php echo $categories_title;?>'>
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>
