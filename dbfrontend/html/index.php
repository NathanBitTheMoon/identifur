<?php
    include './html/login.html';

    if (isset($_GET["error"])) {
        include './html/login.error.html';
    }
?>