<?php
    $dbconn = new mysqli("localhost", "idfurferoot", "tKkvcjN/*HEhFtKXcMDEsqkbfpshSSm6rFh5wDYYKJFf8Y*CaA", "identifur-frontend");

    if ($dbconn->connect_error) {
        die("Connection failed: " . $dbconn->connect_error);
    } else {
        
    }