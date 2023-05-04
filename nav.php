<?php
    if (isset($_GET['nav']) && $_GET['nav'] == 'logout') {
        session_destroy();
        header('Location: login.php');
        exit;
    }
?>

<a href="welcome.php?nav=logout">Logout</a>