<h3>Edit the post</h3>

<?php 
if(isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    $query = "Select * FROM posts WHERE post_id = $post_id";
    $select_post = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_post)) {
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        $post_comment_count = $row['post_comment_count'];
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">title</label>
    <input type="text" value="<?php echo $post_title ?>" name="title" class="form-control">
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
    <input type="text" value="<?php echo $post_author ?>"  name="author" class="form-control">
</div>    

<div class="form-group">
    <label for="comment_count">comment_count</label>
    <input type="text"  value="<?php echo $post_comment_count ?>"  name="comment_count" class="form-control">
</div>  

<div class="form-group">
    <label for="post_status">post_status</label>
    <input type="text" value="<?php echo $post_status ?>"  name="post_status" class="form-control">
</div>

<div class="form-group">
    <label for="image">image</label>
    <input type="file" name="image"  value="<?php echo $post_image ?>"  class="form-control">
</div>

<div class="form-group">
    <label for="post_tags">post_tags</label>
    <input type="text" value="<?php echo $post_tags ?>"  name="post_tags" class="form-control">
</div>

<div class="form-group">
    <label for="post_content">post_content</label>
    <textarea name="post_content" class="form-control"><?php echo $post_content; ?></textarea>
</div>

<div class="form-group"><input type="submit" class="btn btn-primary" value="publish post" name="edit_post"></div>

</form>

<?php 
    if(isset($_POST['edit_post'])) {
        $post_category_id = $_POST['post_category_id'];
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_status = $_POST['post_status'];
       
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_date = date('d-m-y');
        $post_comment_count = $_POST['comment_count'];

        if (empty($post_image)) {
            $query = "Select * FROM posts WHERE post_id = $post_id";
            $select_image_post = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image_post))
                $post_image = $row['post_image'];
            
        } else
            move_uploaded_file($post_image_temp,"../images/$post_image");
   
        $query = "UPDATE posts SET post_category_id = $post_category_id, post_title = '$post_title', post_status = '$post_status', post_author = '$post_author', post_image = '$post_image', post_content = '$post_content', post_tags = '$post_tags', post_date = now(), post_comment_count = $post_comment_count WHERE post_id = $post_id";

        $editer_post = mysqli_query($connection, $query);
        confirmQuery($editer_post);
        header("Location: posts.php?source=edit_post&p_id=".$post_id);
    }