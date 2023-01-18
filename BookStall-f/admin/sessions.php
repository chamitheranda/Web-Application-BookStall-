<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!(isset($_SESSION["_admin_name"]) && isset($_SESSION["_admin_id"]) && isset($_SESSION["_admin_mail"]))) {
    session_start();
    $_SESSION["_admin_name"] = "";
    $_SESSION["_admin_id"] = "";
    $_SESSION["_admin_mail"] = "";
}

echo "";
