<?php
include "./sessions.php";

if (isset($_REQUEST['signin-btn'])) {

    include "dbconnection.php";
    $email = $_REQUEST['email'];
    $pswd = $_REQUEST['pswd'];
    $sql15 = "SELECT id, name FROM admins WHERE pass ='$pswd' AND name ='$email' ";

    $stmt = $con->prepare($sql15);
    $stmt->execute();
    $result = $stmt->fetchall();
    var_dump($result);
    if ($result) {
        $_SESSION["_admin_name"] = $result[0]["name"];
        $_SESSION["_admin_id"] = $result[0]["id"];
        $_SESSION["_admin_mail"] = $email;
        setcookie("admin_id", $result[0]["id"], time() + (86400 * 30), "/");

        echo '<script>window.location.replace("./index.php");</script>';
        //die();
    } else {

        echo "<script>alert('Invalid login details!')</script>";
    }
}

if (isset($_COOKIE["admin_id"])) {
    // var_dump($_COOKIE["usr_id"]);
    if ($_COOKIE["admin_id"] == $_SESSION["_admin_id"]) {

        echo '<script>window.location.replace("./index.php");</script>';
    }
    die();
}



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Admin</title>

    <link rel="stylesheet" href="signin.css">

</head>

<body>
    <div class="login-form-container">
        <form action="./signin.php" method="POST">
            <h3>admin sign in</h3>
            <span>username</span>
            <input type="text" name="email" class="box" placeholder="enter your username" id="">
            <span>password</span>
            <input type="password" name="pswd" class="box" placeholder="enter your password" id="">

            <input type="submit" value="sign in" class="btn" name="signin-btn">

        </form>
    </div>

    </div>

    <script>

    </script>
</body>