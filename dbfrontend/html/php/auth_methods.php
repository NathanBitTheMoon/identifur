<?php
    class AuthMethods {
        static function check_prompt(string $user) {
            include 'dbcon.php';
            $sql = "SELECT promptPasswdChange FROM `users` WHERE `uname`='$user';";

            $result = $dbconn->query($sql);

            while ($row = $result->fetch_assoc()) {
                return $row["promptPasswdChange"];
            }

            die("User '$user' not found.");
        }

        static function change_password(string $user, string $new_password) {
            error_reporting(E_ALL);
            ini_set('display_errors', TRUE);
            ini_set('display_startup_errors', TRUE);
            include 'dbcon.php';
            $password = hash('sha256', $new_password);
            $sql = "UPDATE `users` SET `passwd`=$password `promptPasswdChange`=0 WHERE `uname`='$user'";

            $result = $dbconn->query($sql);
        }

        static function is_correct_password(string $user, string $password) {
            include 'dbcon.php';
            $password = hash('sha256', $password);
            $sql = "SELECT * FROM `users` WHERE `uname`='$user' AND `passwd`='$password';";

            $result = $dbconn->query($sql);
            while ($row = $result->fetch_assoc()) {
                return true;
            }

            return false;
        }

        static function authenticate_user(string $user, string $password) {
            include 'dbcon.php';
            $password = hash('sha256', $password);
            $sql = "SELECT * FROM `users` WHERE `uname`='$user' AND `passwd`='$password';";

            $result = $dbconn->query($sql);
            while ($row = $result->fetch_assoc()) {
                return $row;
            }

            return null;
        }
    }