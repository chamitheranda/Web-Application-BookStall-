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
        <form action="">
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
    <?php
    include "./sessions.php";
    if (isset($_REQUEST['signin-btn'])) {
        include "dbconnection.php";
        $email = $_REQUEST['email'];
        //echo $email ;
        $pswd = $_REQUEST['pswd'];
        //echo $pswd ;
        $sql15 = "SELECT count(userID) FROM user WHERE password ='$pswd' AND email ='$email' ";
        $stmt15 = $con->prepare($sql15);
        $result = $stmt15->execute();
        if ($result) {
            $_SESSION["useremail"] = $email;
            $_SESSION["pass"] = $pswd;
            echo '<script>window.location.replace("./index.php");</script>';
        } else {
            echo "<span id='logVal'> </span>";
        }
    }
    ?>
    <script>
        function signUpValidation() {
            document.getElementById('logVal').innerHTML = alert("password and email not match !!!");
        }
    </script>
</body>