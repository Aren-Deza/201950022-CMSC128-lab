<?php
    # THIS FILE CONTAINS THE SIGNUP/REGISTER PAGE 
    include_once 'header.php';
?>

<section class="signup-form">
    <h2>SIGN UP</h2>
    <div class="signup-form-form">
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="button" id="read" onclick="show()">Show Password</button>
            <script src="toggle.js"></script>
            <button class="coolbutton" type="submit" name="submit">Sign up</button>
        </form>
    </div>
</section>
<?php
        # SIGNUP ERROR MESSAGE DISPLAYING
        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyinput"){
                echo "<p>All fields must be filled out.</p>";
            } else if ($_GET["error"]=="invalidpasswordnocaps"){
                echo "<p>Password must contain an uppercase letter.</p>";
            } else if ($_GET["error"]=="invalidpasswordnonumbers"){
                echo "<p>Password must contain a number.</p>";
            } else if ($_GET["error"]=="invalidpasswordnosymbols"){
                echo "<p>Password must contain a symbol.</p>";
            } else if ($_GET["error"]=="passwordtooshort"){
                echo "<p>Password must be at least 8 characters.</p>";
            } else if ($_GET["error"]=="usernametaken"){
                echo "<p>This username is already taken.</p>";
            } else if ($_GET["error"]=="stmtfailed"){
                echo "<p>Something went horribly wrong. Please try again later.</p>";
            } else if ($_GET["error"]=="none"){
                echo "<p>Registered successfully.</p>";
            } 
        }
    ?>

<img src="images/homenya.png" alt="cat, just vibing" class="homeimage">

<?php
    include 'footer.php';
?>