<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post ID</th>
            <th>Post Name</th>
            <th>author</th>
            <th>email</th>
            <th>Status</th>
            <th>Date</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
        $query = "Select * FROM comments";
        $select_comments = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$comment_post_id</td>";
            $qu = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $comment_cat = mysqli_query($connection, $qu);
            $cc = mysqli_fetch_assoc($comment_cat);
            $c = $cc['post_title'];
            echo "<td><a href='../post.php?p_id=$comment_post_id'>$c</a></td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";
            echo "<td>$comment_date</td>";
            echo "<td>$comment_content</td>";
            echo "<td><a href='comments.php?app=$comment_id'>Approve</a></td>";
            echo "<td><a href='comments.php?unapp=$comment_id'>Unapprove</a></td>";
            echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
            echo "</tr>";
        }
        
        if ( isset($_GET['delete']) ) {
            $comment_id = $_GET['delete'];
            $query = "DElETE FROM comments WHERE comment_id = $comment_id";
            $delQuery = mysqli_query($connection, $query);
            header('Location: comments.php');
        }
        if ( isset($_GET['app']) ) {
            $comment_id = $_GET['app'];
            $query = "UPDATE comments SET comment_status ='Approved' WHERE comment_id = $comment_id";
            mysqli_query($connection, $query);
            header('Location: comments.php');
        }
        if ( isset($_GET['unapp']) ) {
            $comment_id = $_GET['unapp'];
            $query = "UPDATE comments SET comment_status ='Unapproved' WHERE comment_id = $comment_id";
            mysqli_query($connection, $query);
            header('Location: comments.php');
        }

    ?>
    </tbody>
</table>