



<?php
session_start();
session_unset();
session_destroy();

// Prevent back button from accessing cached pages
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

// Redirect to login page
header("Location: red.php");
exit();
?>

<html>
    <head>
    <script>
    window.history.pushState(null, "", window.location.href); 
    window.onpopstate = function () {
        window.location.replace("red.php");
    };
</script>

    </head>
</html>