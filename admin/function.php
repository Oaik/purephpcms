<?php

    function confirmQuery($result) {
        global $connection;
        if(!$result)
            die("Query Filed " . mysqli_error($connection) );
    }

    function insert_categories() {
        if(isset($_POST["submit"])) {
            global $connection;
            $cat_title = $_POST["cat_title"];
            if($cat_title == "" || empty($cat_title)) {
                echo "ERROR";
            } else {
                $query = "INSERT INTO categories(cat_title) VALUE('$cat_title') ";
                mysqli_query($connection, $query);
            }
        }
    }

    function findAllCat() {
        global $connection;
        $query = "SELECT * FROM categories";
        $select_all_sidebar = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_sidebar)) {
            $cat_title = $row["cat_title"];
            $cat_id = $row["cat_id"];
            echo "<tr>";
            echo "<td>$cat_id</td>";
            echo "<td>$cat_title</td>";
            echo "<td><a href='categories.php?delete=$cat_id'>Delete</a></td>";
            echo "<td><a href='categories.php?edit=$cat_id'>edit</a></td>";
            echo "</tr>";
        }
    }

    function delAllCat() {
        if(isset($_GET['delete'])) {
            $del_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = $del_cat_id";
            mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }