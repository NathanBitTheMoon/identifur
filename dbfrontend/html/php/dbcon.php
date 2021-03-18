<?php
    $dbconn = new mysqli($SQLROOT["host"], $SQLROOT["username"], $SQLROOT["password"], $SQLROOT["database"]);

    if ($dbconn->connect_error) {
        die("Connection failed: " . $dbconn->connect_error);
    } else {
        
    }