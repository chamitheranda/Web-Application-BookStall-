<?php
include "./dbconnection.php";
include "./sessions.php";

if (isset($_COOKIE["usr_id"])) {
    $id = $_COOKIE["usr_id"];
    $sql = "select id from user where status = 1 and id=$id;";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $list = $stmt->fetchall();
    if (!$list) {
        setcookie("usr_id", "", time() - 3600, "/");
        $_SESSION["useremail"] = "";
        $_SESSION["pass"] = "";
        echo "<script>window.location = './signin.php';<script>";
        die();
    }
}