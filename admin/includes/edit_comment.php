<h3>Edit the comment</h3>

<?php 
$comment_id = "";
if(isset($_GET['p_id'])) {
    $comment_id = $_GET['p_id'];
    $query = "Select * FROM comments WHERE comment_id = $comment_id";
    $select_comment = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_comment)) {
        //$comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        //$comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
    }
}

?>

<form action="" method="post">

<div class="form-group">
    <label for="comment_post_id">comment_post_id</label>
    <input type="text" value="<?php echo $comment_post_id ?>" name="comment_post_id" class="form-control">
</div>

<div class="form-group">
    <label for="comment_author">author</label>
    <input type="text" value="<?php echo $comment_author ?>"  name="comment_author" class="form-control">
</div> 

<div class="form-group">
    <label for="comment_email">comment_email</label>
    <input type="text" value="<?php echo $comment_email ?>"  name="comment_email" class="form-control">
</div>

<div class="form-group">
    <label for="comment_status">comment_status</label>
    <input type="text" value="<?php echo $comment_status ?>"  name="comment_status" class="form-control">
</div>

<div class="form-group">
    <label for="comment_content">comment_content</label>
    <textarea name="comment_content" class="form-control"><?php echo $comment_content; ?></textarea>
</div>

<div class="form-group"><input type="submit" class="btn btn-primary" value="edit comment" name="edit_comment"></div>

</form>

<?php 
    if(isset($_POST['edit_comment'])) {
        $comment_post_id = $_POST['comment_post_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_status = $_POST['comment_status'];
        $comment_date = date('d-m-y');
        $comment_content = $_POST['comment_content'];
   
        $query = "UPDATE comments SET comment_status = '$comment_status', comment_email = '$comment_email' , comment_author = '$comment_author', comment_content = '$comment_content', comment_date = now(), comment_post_id = $comment_post_id WHERE comment_id = $comment_id";

        $editer_comment = mysqli_query($connection, $query);
        confirmQuery($editer_comment);
        header("Location: comments.php?source=edit_comment&p_id=".$comment_id);
    }