<?php

include 'dbconnection.php';

session_start();

$user_id = $_SESSION['user_id'];
/*
if(!isset($user_id)){
   header('location:signin.php');
}*/

if(isset($_REQUEST['send'])){

   $name = $_REQUEST['name'];
   $email = $_REQUEST['email'];
   $number = $_REQUEST['number'];
   $msg = $_REQUEST['message'];

   $select_message =  "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'" or die('query failed');
   $stmt = $con->prepare($select_message);
   $stmt->execute();
   $list = $stmt->fetchAll();

   if(($stmt->rowCount()) > 0){
      echo 'message sent already!';
   }else{
      $sql = "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')" or die('query failed');
      $stmt2 = $con->prepare($sql);
      $stmt2->execute();
      $list2 = $stmt->fetchAll();
      
   }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/contact.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<div class="breadcrumb">
        <ul >
            <li><a href="index.php">Home</a></li>
            <li>Contact</li>
        </ul>
    </div>





<section class="contact">

   <form action="" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
   </form>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>