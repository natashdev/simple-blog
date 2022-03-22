<?php
    if(isset($_GET['status']))
    {
        if($_GET['status']=='edit')
        {
            $editID = $_GET['id'];
            $catData = $objadminblog->display_cat_by_id($editID);
            
        }
    }

    if(isset($_POST['e_submit_cat']))
    {
        $objadminblog->update_cat($_POST);
    }
?><h1>Add Category Page</h1>
<form action="" method="post">
    <div class="form-group">
    <label for="cat_name">Category Name</label>
    <input name="e_cat_name" class="form-control py-4" id="e_cat_name" type="text" value="<?php if(isset($catData)){echo $catData['cat_name'];} ?>"/>
     </div>
     <div class="form-group">
    <label for="cat_des">Category Description</label>
    <input name="e_cat_des" class="form-control py-4" id="e_cat_des" type="text" value="<?php if(isset($catData)){echo $catData['cat_des'];} ?>" />
     </div>
     <input type="hidden" name="cat_id" value="<?php if(isset($catData)){echo $catData['id'];} ?>">
     <input type="submit" value="Update Category" name="e_submit_cat" class="form-controll btn btn-block btn-primary">
</form>
<div>
<a href="manage_cat.php" class="form-controll btn btn-block btn-success">Go To Manage Category</a>
</div>