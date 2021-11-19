<?php

// This file allows us to write comments to database & read previous comments.

// INSERTS/WRITES TO DATABASE
function set_comments($conn) {
    if (isset($_POST['comment_submit'])){
        $u_id = $_POST['u_id'];
        $date = $_POST['date'];
        $c_text = $_POST['c_text'];

        // SQL query with variables filled out.
        $sql = "INSERT INTO comments (u_id, date, c_text) 
                VALUES ('$u_id', '$date', '$c_text')";
        // submits the query to the database.
        $result = $conn->query($sql);
    }
}

// RETRIEVES/READS DATA FROM DATABASE
function get_comments($conn) {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);

    // for each item in the database, echo the result,
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment_box'><p>";
        echo $row['u_id']."   ";
        echo $row['date']."<br>";
        echo nl2br($row['c_text']);
        echo "</p></div>";
    }
}