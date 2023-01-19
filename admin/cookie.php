<?php
include "./sessions.php";
/*
if (isset($_COOKIE["admin_id"])) {
    include "./dbconnection.php";
    $id = $_COOKIE["admin_id"];
    var_dump($id);
    $sql = "select mail, pass from admins where id=$id;";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $list = $stmt->fetchall();
    
    if (!$list) {
        setcookie("admin_id", "", time() - 3600, "/admin");
        $_SESSION["_admin_name"] = "";
        $_SESSION["_admin_id"] = "";
        $_SESSION["_admin_mail"] = "";
        echo "<script>window.location = './signin.php';</script>";
        die();
        
    } else {
        $_SESSION["_admin_mail"] = $list[0]["mail"];
        $_SESSION["_admin_name"] = $list[0]["pass"];
        $_SESSION["_admin_id"] = $list[0]["id"];
    }
} else {
        echo "<script>window.location = './signin.php';</script>";

}
*/

if(!isset($_COOKIE["admin_id"])) {
    echo "<script>window.location = './signin.php';</script>";


}