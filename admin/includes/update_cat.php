<form method="post">
    <?php 
        $cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $select_cat_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_cat_id)) {
        $cat_title = $row["cat_title"];
        $cat_id = $row["cat_id"];
        ?>
       <div class="form-group">
        <label for="cat-title">Edit Category Name</label>
        <input type="text" class="form-control" name="cat_title" value="<?php if(isset($cat_title)){ echo $cat_title; }?>">
    </div> 
    <?php }?>

    <?php 
    if(isset($_POST['update'])) {
        $cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = $cat_id";
        $update_query = mysqli_query($connection, $query);
        if(!$update_query) {
            die("OPPPPS");
        }
        header("Location: categories.php");
    }

    ?>
    
    <div class="form-group">
        <input class="btn btn-primary" name="update" type="submit" value="Update Categorty">
    </div>
</form>

