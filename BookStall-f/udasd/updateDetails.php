<?php

$id = $_REQUEST["u_id"];

function update($col, $data, $id)
{
    include "./db.php";

    $sql = "update user set $col='$data' where id='$id'";
    $result = $conn->query($sql);
}

if (isset($_REQUEST["reg-fname"])) {
    if (trim($_REQUEST["reg-fname"])) {
        update("name", $_REQUEST["reg-fname"], $id);
    }
}

if (isset($_REQUEST["reg-mail"])) {
    if (trim($_REQUEST["reg-mail"])) {
        update("mail", $_REQUEST["reg-mail"], $id);
    }
}

if (isset($_REQUEST["reg-pass"])) {
    if (trim($_REQUEST["reg-pass"])) {
        update("pass", $_REQUEST["reg-pass"], $id);
    }
}

if (isset($_REQUEST["reg-phone"])) {
    if (trim($_REQUEST["reg-phone"])) {
        update("phone", $_REQUEST["reg-phone"], $id);
    }
}


if (isset($_REQUEST["address-street"]) && isset($_REQUEST["address-city"]) && isset($_REQUEST["address-postal"])) {
    if (trim($_REQUEST["address-street"]) && trim($_REQUEST["address-city"]) && trim($_REQUEST["address-postal"])) {
        $txt = trim($_REQUEST["address-street"]) . ", " . trim($_REQUEST["address-city"]) . ", " . trim($_REQUEST["address-postal"]);
        update("address", $txt, $id);
    }
}



header('Location: ' . $_SERVER['HTTP_REFERER'], true, 301);
exit();
