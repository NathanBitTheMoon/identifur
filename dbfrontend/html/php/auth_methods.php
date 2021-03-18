<?php
    class AuthMethods {
        static function check_prompt(string $user) {
            $sql = "SELECT promptPasswdChange FROM `users` WHERE `uname`='$user';";

            $result = $dbconn->query($sql);

            while ($row = $result->fetch_assoc()) {
                return $row["promptPasswordChange"];
            }

            die("User '$user' not found.");
        }

        static function change_password(string $user, string $new_password) {
            $password = hash('sha256', $new_password);
            $sql = "UPDATE `users` SET `passwd`=$password WHERE `uname`='$user'";

            $dbconn->query($sql);
        }
    }