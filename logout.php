<?php
# THIS IS LITERALLY JUST THE LOGOUT PAGE
include 'header.php';
?>

<h2>SESSION ENDED</h2>
<?php
if ($_GET["cause"] == "timeout"){
    echo "<p>session expired after idling for 5 minutes.</p>";
} else {
    echo "<p>logged out successfully.</p>";
}

include 'footer.php';
?>