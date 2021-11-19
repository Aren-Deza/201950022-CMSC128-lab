<?php

# THIS FILE IS RESPONSIBLE FOR DATABASE HANDLING WITH THE LOGIN SYSTEM

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginDB";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

# if something goes horribly wrong, we get this error message here
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}