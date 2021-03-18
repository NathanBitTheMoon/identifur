<?php
    $dbconn = new mysqli($SQLROOT["host"], $SQLROOT["username"], $SQLROOT["password"], $SQLROOT["database"]);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>