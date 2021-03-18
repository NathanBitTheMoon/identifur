<?php
    include 'php/cfg/sqlrootauth.php';
    include 'php/dbcon.php';

    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    
    if (isset($_GET["login"])) {
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        session_start();

        include 'php/auth_methods.php';
        $user = AuthMethods::authenticate_user($uid, $pwd);
        echo json_encode($user); 

        if ($user == null) {
            // Authentication failed
            header("Location: index.php?error=1");
        } else {
            $_SESSION["uid"] = $user["uname"];
            $_SESSION["auth"] = true;
            header("Location: index.php?success=1");
        }
    } else if (isset($_GET["update"])) {
        include 'php/auth_methods.php';
        
        // Check that the user is authenticated
        session_start();
        if (!isset($_SESSION["auth"])) {
            header("Location: index.php?error=1");
        } else {
            $username = $_SESSION["uid"];
            $old_password = $_POST["pwd"];
            $new_password = $_POST["newpwd"];
            $new_confirm = $_POST["reppwd"];

            // Check that the user entered the correct password
            $correct_password = AuthMethods::is_correct_password($username, $old_password);
            if($correct_password) {
                if ($new_password == $new_confirm) {
                    AuthMethods::change_password($username, $new_password);
                    session_destroy();
                    //header("Location: index.php");
                } else {
                    header("Location: update_password.php?reason=policy&&error=2");
                }
            } else {
                header("Location: update_password.php?reason=policy&&error=1");
            }
        }
    }
?>