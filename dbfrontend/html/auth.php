<?php
    include 'php/cfg/sqlrootauth.php';
    include 'php/dbcon.php';

    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwd = hash('sha256', $pwd);

    $sql = "SELECT * FROM `users` WHERE `uname`='$uid' AND `passwd`='$pwd';";
    $result = $dbconn->query($sql);

    $row_count = 0;
    session_start();
    while ($row = $result->fetch_assoc()) {
        $row_count += 1;

        $_SESSION["uid"] = $uid;
        $_SESSION["auth"] = true;
        
    }

    if ($row_count > 0) {
        echo "<br>Authentication Successful.";
        header("Location: index.php?success=1");
    } else {
        header("Location: index.php?error=1");
    }
?>