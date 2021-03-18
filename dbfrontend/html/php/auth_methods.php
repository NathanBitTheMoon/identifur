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
            include 'dbcon.php';
            $password = hash('sha256', $new_password);
            $sql = "UPDATE `users` SET `passwd`=$password WHERE `uname`='$user'";

            $dbconn->query($sql);
        }
    }