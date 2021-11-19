<?php

// the purpose of this file is to connect each page to the database in our local server :D

// connects to comment section database
$conn = mysqli_connect('localhost', 'root', '', 'comment_section');

//error message in case something really bad happens lmao
if (!$conn) {
    die("Error: failed to connect to database. ".msqli_connect_error());
}