<?php

//helper session qui se chargera en include header
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }
