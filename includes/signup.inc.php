<?php

# THIS FILE IS WHAT ALLOWS USER SIGNUP TO CONNECT TO DATABASE.

if (isset($_POST["submit"])){

    $name = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    ## THE PART WHERE I DO THE ERROR HANDLING
    # if one of the fields is empty
    if (emptyField($name, $pwd) !== False) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    # if the password lacks a capital letter
    if (pwdNoCaps($pwd) !== False) {
        header("location: ../signup.php?error=invalidpasswordnocaps");
        exit();
    }
    # if the password lacks a number
    if (pwdNoNumbers($pwd) !== False) {
        header("location: ../signup.php?error=invalidpasswordnonumbers");
        exit();
    }
    # if the password lacks a symbol
    if (pwdNoSymbols($pwd) !== False) {
        header("location: ../signup.php?error=invalidpasswordnosymbols");
        exit();
    }

    # if the password is less than 8 characters
    if (pwdtooshort($pwd) !== False) {
        header("location: ../signup.php?error=passwordtooshort");
        exit();
    }
    # if username is already taken
    if (usernametaken($conn, $name) !== False) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    # REGISTER THE USER (assuming no error have been found)
    registerUser($conn, $name, $pwd);


}
else {
    header("location: ../signup.php");  #prevents users from entering the website without submitting anything
    exit();
}