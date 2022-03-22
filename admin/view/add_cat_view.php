<?php 
    if(isset($_POST['submit_cat'])){
        $return_msg = $objadminblog->addCategory($_POST);
    }

?>

<h1>Add Category Page</h1>

<?php 
    if(isset($return_msg))
    {
        echo "<h6>$return_msg</h6>";
    } 
?>

<form action="" method="post">
    <div class="form-group">
    <label for="cat_name">Category Name</label>
    <input name="cat_name" class="form-control py-4" id="cat_name" type="text"/>
     </div>
     <div class="form-group">
    <label for="cat_des">Category Description</label>
    <input name="cat_des" class="form-control py-4" id="cat_des" type="text"/>
     </div>
     <input type="submit" value="Add Category" name="submit_cat" class="form-controll btn btn-block btn-primary">
</form>

<div>
<a href="manage_cat.php" class="form-controll btn btn-block btn-success">Go To Manage Category</a>
</div>