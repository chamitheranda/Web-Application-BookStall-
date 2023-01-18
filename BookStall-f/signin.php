<?php include "./cookie.php";


if (isset($_REQUEST['signin-btn'])) {

    include "dbconnection.php";
    $email = $_REQUEST['email'];
    $pswd = $_REQUEST['pswd'];
    $sql15 = "SELECT id FROM user WHERE pass ='$pswd' AND mail ='$email' ";
    
    $stmt = $con->prepare($sql15);
    $stmt->execute();
    $result = $stmt->fetchall();
    print_r($result);
    if ($result) {
        $_SESSION["useremail"] = $email;
        $_SESSION["pass"] = $pswd;
        setcookie("usr_id", $result[0]["id"], time() + (86400 * 30 ), "/");

        echo '<script>window.location.replace("./index.php");</script>';
        die();
    } else {
        
        echo "<script>alert('Invalid login details!')</script>";
    }
}

if (isset($_REQUEST["validate"])) {
    if (isset($_COOKIE["usr_id"])) {
       // var_dump($_COOKIE["usr_id"]);
        include "./dbconnection.php";
        $uid = $_COOKIE["usr_id"];
        include "./sessions.php";
        $sql15 = 'SELECT * FROM user where id="$uid"';
        $stmt15 = $con->prepare($sql15);
        $stmt15->execute();
        $result = $stmt15->fetchAll();
        if (
            $stmt15->rowcount()
            > 0
        ) {
            $_SESSION["useremail"] = $result["mail"];
            $_SESSION["pass"] = $result["pass"];
        }


        echo '<script>window.location.replace("./index.php");</script>';
        die();
    }
}
if (isset($_COOKIE["usr_id"])) {
   // var_dump($_COOKIE["usr_id"]);

    echo '<script>window.location.replace("./udasd/dashboard.php");</script>';
    die();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="signin.css">

</head>

<body>
    <div class="login-form-container">
        <form action="./signin.php" method="POST">
            <h3>sign in</h3>
            <span>username</span>
            <input type="email" name="email" class="box" placeholder="enter your email" id="">
            <span>password</span>
            <input type="password" name="pswd" class="box" placeholder="enter your password" id="">
            <div class="checkbox">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me"> remember me</label>
            </div>
            <input type="submit" value="sign in" class="btn" name="signin-btn">
            <p>forget password ? <a href="#">click here</a></p>
            <p>don't have an account ? <a href="signup.php">create one</a></p>
        </form>
    </div>

    <script src="js/signup.js"></script>
    </div>

    <script>
        function signUpValidation() {
            document.getElementById('logVal').innerHTML = alert("password and email not match !!!");
        }
    </script>
</body>