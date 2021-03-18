<?php
    include './html/login.html';
    include './php/auth_methods.php';
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    if (isset($_GET["error"])) {
        include './html/login.error.html';
    } else if (isset($_GET["success"]) && isset($_SESSION["auth"])) {
        echo "Yes";

        if (AuthMethods::check_prompt($_SESSION["uid"])) {
            // Redirect the user to a password change page
            header("Location: update_password.php?reason=policy");
            echo "Yes";
        }
    }
?>