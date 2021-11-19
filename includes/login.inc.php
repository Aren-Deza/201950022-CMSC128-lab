<?php

if (isset($_POST["submit"])){

    $name = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyField($name, $pwd) !== False) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $name, $pwd);

}
else {
    header("location: ../index.php");
    exit();
}