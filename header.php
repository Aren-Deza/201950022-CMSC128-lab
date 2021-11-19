<?php
    session_start();
    if(isset($_SESSION["usersID"])){
        # timeout after 5 minutes of inactivity (5*60=300)
        if(time()-$_SESSION["login_time_stamp"] >300){
            session_unset();
            session_destroy();
            header("location: ../logout.php?error=timeout");
        }
    }
?>

<!DOCTYPE html> <!--comment-->
<html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="aren deza's website.">
        <title>GlasArt</title>
        <link rel="stylesheet" href="styling.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;800&display=swap&family=Syncopate:wght@700&display=swap" rel="stylesheet"> 
    </head>

    <body>
        <header>
        <nav>
            <div class="wrapper">
            <h1>GLAS<span>ART</span></h1>
            <ul>
                <div class="sizeup">
                    <?php
                        # NAVIGATION CONTROL (based on sessions)
                        # if there is a session active:
                        if (isset($_SESSION["usersID"])){
                            echo "<li><a href='home.php'>Home</a></li>";
                            echo "<li><a href='gallery.php'>Gallery</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                        }
                        # if there is no session active:
                        else{
                            echo "<li><a href='index.php'>Log in</a></li>";
                            echo "<li><a href='signup.php'>Register</a></li>";
                        }
                    ?>
                </div>
            </ul>
            </div>
        </header>
        </nav>
    
    <div class="wrapper">