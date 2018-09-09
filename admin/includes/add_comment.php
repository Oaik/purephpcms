<?php 
    if(isset($_POST['create_comment'])) {
        $comment_post_id = $_POST['comment_post_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_status = $_POST['comment_status'];
        $comment_date = date('d-m-y');
        $comment_content = $_POST['comment_content'];
        
        $query = "INSERT INTO comments(comment_post_id, comment_email, comment_author, comment_status, comment_content, comment_date) VALUES($comment_post_id, '$comment_email', '$comment_author', '$comment_status', '$comment_content', now())";

        $adder_comment = mysqli_query($connection, $query);
        confirmQuery($adder_comment);
    }

?>

<form action="" method="post">

    <div class="form-group">
        <label for="comment_post_id">comment_post_id</label>
        <input type="text" name="comment_post_id" class="form-control">
    </div>

    <div class="form-group">
        <label for="comment_author">comment_author</label>
        <input type="text" name="comment_author" class="form-control">
    </div>    

    <div class="form-group">
        <label for="comment_email">comment_email</label>
        <input type="text" name="comment_email" class="form-control">
    </div>  

    <div class="form-group">
        <label for="comment_status">comment_status</label>
        <input type="text" name="comment_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="comment_content">comment_content</label>
        <input type="text" name="comment_content" class="form-control">
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" value="publish post" name="create_comment"></div>

</form>