<?php
    session_start();

    $_SESSION["login"] = false;
    $_SESSION["logout"] = true;
    header("Location: index.php")
?>