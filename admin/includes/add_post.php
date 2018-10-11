
<?php 
    if(isset($_POST['create_post'])) {
        $post_category_id = $_POST['post_category_id'];
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_status = $_POST['post_status'];
       
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_date = date('d-m-y');
        //$post_comment_count = 4;

        move_uploaded_file($post_image_temp, "../images/$post_image");
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_status, post_image, post_content, post_tags, post_date) VALUES($post_category_id, '$post_title', '$post_author', '$post_status', '$post_image', '$post_content', '$post_tags', now())";

        $adder_post = mysqli_query($connection, $query);
        confirmQuery($adder_post);
        header("Location: posts.php");
    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="form-group">
    <select name="post_category_id" class="form-control" id="post_category_id">
        <?php 
        
            $query = "SELECT * FROM categories";
            $select_cat = mysqli_query($connection, $query);
            confirmQuery($select_cat);

            while ($row = mysqli_fetch_assoc($select_cat)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                $selected = ($post_category_id == $cat_id ? selected : "");
                echo "<option value=$cat_id $selected >$cat_title</option>";
            }
        
        ?>
   
    </select>
</div>

    <div class="form-group">
        <label for="author">author</label>
        <input type="text" name="author" class="form-control">
    </div>    

    <div class="form-group">
        <select name="post_status" class="form-control" id="post_status">
            <option value="published" >published</option>
            <option value="draft">draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">post_tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">post_content</label>
        <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" value="publish post" name="create_post"></div>

</form>
