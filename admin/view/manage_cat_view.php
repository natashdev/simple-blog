<?php 
    $categories = $objadminblog->displayCat();

    if(isset($_GET['status']))
    {
        if($_GET['status']=='delete')
        {
            $deleteID = $_GET['id'];
            $objadminblog->deleteCat($deleteID);
        }
    }



?>

<h1>Manage Category Page</h1>

<?php

    if(isset($_GET['output']))
    {
        if($_GET['output']=='delete')
        {
            echo '<h5>Category Deleted Successfully</h5>';
        }

        elseif($_GET['output']=='update')
        {
            echo '<h5>Category Successfully Updated</h5>';
        }
    } 
    ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        while($category = mysqli_fetch_assoc($categories)){
        ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['cat_name']; ?></td>
            <td><?php echo $category['cat_des']; ?></td>
            <td>
                <a href="edit_cat.php?status=edit&&id=<?php echo $category['id']; ?>">Edit</a>
                <a href="?status=delete&&id=<?php echo $category['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>