<?php
include "./sessions.php";

if (isset($_COOKIE["usr_id"])) {
    include "./dbconnection.php";
    $id = $_COOKIE["usr_id"];
    $sql = "select mail, pass from user where status = 1 and id=$id;";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $list = $stmt->fetchall();
    if (!$list) {
        setcookie("usr_id", "", time() - 3600, "/");
        $_SESSION["useremail"] = "";
        $_SESSION["pass"] = "";
        echo "<script>window.location = './signin.php';<script>";
        die();
    } else {
        $_SESSION["useremail"] = $list[0]["mail"];
        $_SESSION["pass"] = $list[0]["pass"];
    }
}
