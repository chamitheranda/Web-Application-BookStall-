<?php


$user_table_name = "user";
$usr_cookie = "usr_id";
$cookie_info = "";
//cookie stuff


session_start();
if (isset($_COOKIE[$usr_cookie])) {

    $cookie_info = $_COOKIE[$usr_cookie];
} elseif (!isset($_COOKIE[$usr_cookie])) {
    echo "<script>window.location = '../signin.php';</script>";
    die();
}

function setSession($cookie_info)
{
    include "./db.php";

    $sql = "SELECT * FROM user where id=$cookie_info";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION["_usr_name"] = $row["name"];
            $_SESSION["_usr_address"] = $row["address"];
            $_SESSION["_usr_mail"] = $row["mail"];
            $_SESSION["_usr_id"] = $row["id"];
            $_SESSION["_usr_phone"] = $row["phone"];
        }
    }
}
setSession($cookie_info);
//echo $_SESSION["_usr_address"];