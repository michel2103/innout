<?php

    function requireValidSession() {
        $user = $_SESSION['user'];
        if(!isset($user)) {
            header("Location: Login.php");
            exit();
        }
    }