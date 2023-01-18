<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="css/signup.css">

</head>
<body>
<div class="login-form-container">

    
    <form action="" method="post">
        <h3>sign up</h3>
        <span>first name</span>
        <input type="text" name="fname" class="box" placeholder="enter your first name" id="">
        <span>last name</span>
        <input type="text" name="lname" class="box" placeholder="enter your second name" id="">
        <span>email</span>
        <input type="email" name="email" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="pswd" class="box" placeholder="enter your password" id="">
        <span>confirm password</span>
        <input type="password" name="cnfpswd" class="box" placeholder="enter your password" id="">

        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign up" class="btn" name="signup">
        <p>Already have an account ? <a href="signin.php">sign in</a></p>
    </form>
</div>

<?php
    if(isset($_POST['fname'])){
        $fname = $_POST['fname'];
    }
    if(isset($_POST['lname'])){
        $fname = $_POST['lname'];
    }
    if(isset($_POST['email'])){
        $fname = $_POST['email'];
    }
    if(isset($_POST['pswd'])){
        $fname = $_POST['pswd'];
    }
    if(isset($_POST['signup'])){
        $fname = $_POST['signup'];
    }
    
    if(isset($_POST['signup'])){
        if($pswd == $cnfpswd){
            echo $fname ;
            include 'dbconnection.php';
            $sql12 = "INSERT INTO user (fName, lName, password,email ) VALUES ('$fname', '$lname', '$pswd','$email')                                                                                ";
            $stmt12 = $con->prepare($sql12);
            $stmt12->execute();
            header('location:signin.php');
            exit();
        }
    }
?>
</body>