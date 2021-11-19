<?php 
    # THIS FILE CONTAINS THE LOGIN PAGE
    include_once 'header.php';
?>

<section class="signup-form">
    <h2>LOG IN</h2>
    <div class="signup-form-form">
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="name" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="button" id="read" onclick="show()">Show Password</button>
            <script src="toggle.js"></script>
            <button class="coolbutton" type="submit" name="submit">Log In</button>
        </form>
    </div>
</section>

<?php
    # LOGIN ERROR MESSAGE DISPLAYING
    if(isset($_GET["error"])){
        if($_GET["error"]=="invaliduser"){
            echo "<p>Invalid username.</p>";
        }
        if($_GET["error"]=="invalidpwd"){
            echo "<p>Invalid password.</p>";
        }
    }
?>

<img src="images/homenya.png" alt="cat, just vibing" class="homeimage">

<?php
    include 'footer.php';
?>