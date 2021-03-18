<?php
    include 'php/cfg/sqlrootauth.php';
    include 'php/dbcon.php';

    $uid = mysql_real_escape_string($_POST["uid"]);
    $pwd = $_POST["pwd"];
    $pwd = hash('sha256', $pwd);

    $sql = "SELECT * FROM `users` WHERE `uname`=$uid AND `passwd`=$pwd";
    $result = $dbconn->query($sql);

    if ($result->num_rows > 0) {
        // authentication successful
        echo '<br>Authentication Successful.';
    }
?>