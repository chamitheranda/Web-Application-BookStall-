<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!(isset($_SESSION["useremail"]) && isset($_SESSION["pass"]))) {
    session_start();
    $_SESSION["useremail"] = "";
    $_SESSION["pass"] = "";
}

echo "";
