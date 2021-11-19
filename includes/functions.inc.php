<?php

# THIS FILE CONTAINS ALL THE FUNCTIONS USED FOR SIGNING UP

# ERROR HANDLING FOR SIGN UP / LOGIN

# if any of the fields are empty, we're gonna have a bad time
function emptyField($name, $pwd){
    $result;
    if (empty($name) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

# if the password doesn't have capital letters, we're gonna have a bad time
function pwdNoCaps($pwd){
    $result;
    if (!preg_match("/[A-Z]/", $pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

# if the password doesn't have numbers, we're gonna have a bad time
function pwdNoNumbers($pwd){
    $result;
    if (!preg_match("/[0-9]/", $pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

# if the password doesn't have symbols, we're gonna have a bad time
function pwdNoSymbols($pwd){
    $result;
    if (!preg_match("~[^\w\d]~", $pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

# if the password is less than 8 characters, we're gonna have a bad time
function pwdtooshort($pwd){
    $result;
    if (strlen($pwd)<8){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

# checks if username is taken, both for error handling and for logins
function usernametaken($conn, $name){
    $sql = "SELECT * FROM users WHERE userName = ?;";
    #preparing a statement for security reasons
    $statement = mysqli_stmt_init($conn); 
    #if issue arises in the preparation
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $name); # complete statement
    mysqli_stmt_execute($statement); # execute statement, look for a matching username
    $query_result = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($query_result)){
        return $row; # if user exists, return selected data for login uses
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($statement);
}

# THIS FUNCTION REGISTERS USER
function registerUser($conn, $name, $pwd){
    $sql = "INSERT INTO users (userName, userPwd) VALUES (?, ?);";
    $statement = mysqli_stmt_init($conn); 
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $encrPwd = password_hash($pwd, PASSWORD_DEFAULT); # encrypts/hashes a password for security
    mysqli_stmt_bind_param($statement, "ss", $name, $encrPwd); # completes the statement
    mysqli_stmt_execute($statement); # execute statement, insert the data into the table
    header("location: ../signup.php?error=none");
    exit();
}

# THIS FUNCTION LOGINS USER
function loginUser($conn, $name, $pwd){
    $usernametaken = usernametaken($conn, $name);
    #error handling in case username does not exist
    if ($usernametaken == False){
        header("location: ../index.php?error=invaliduser");
        exit();
    }
    #decrypting password, confirming w user input
    $encrPwd = $usernametaken["userPwd"];
    $compare = password_verify($pwd,$encrPwd);
    if ($compare == False){
        header("location: ../index.php?error=invalidpwd");
        exit();
    } else if ($compare == True){
        #if everything works, start a session.
        session_start();
        $_SESSION["usersID"] = $usernametaken["usersID"];
        $_SESSION["login_time_stamp"] = time();
        header("location: ../home.php");
        exit();
    }
}