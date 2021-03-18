<?php

include './html/update_password.html';

if ($_GET["reason"] == "policy") {
    include './html/update_password.policy.html';
}