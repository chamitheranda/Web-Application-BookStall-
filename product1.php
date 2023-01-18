<?php
include "dbconnection.php";
include "./sessions.php";

$bookName = $_REQUEST['name'];
  $sql1 = "SELECT * FROM featured WHERE name='" . $bookName . "' ";
  $stmt1 = $con->prepare($sql1);
  $stmt1->execute();
  $list = $stmt1->fetch();
  $img = $list['img'];
  $name = $list['name'];
  $price = $list['current_price'];
  $priceFormatted = (int)str_replace('$', '', $price);
  $discription = $list['discription'];

if(isset($_REQUEST["add-to-cart"])) {
  if(!$_REQUEST["qty"]) {
    echo "<script type='text/javascript'>alert('Please select quantity');</script>";
  } else {
    $bname = $_REQUEST['name'];
    $qty = $_REQUEST['qty'];

    $userEmail = $_SESSION["useremail"];

    $sql = "SELECT EXISTS (SELECT * FROM cart WHERE userEmail='$userEmail' AND bname='$bname') FROM cart";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    //var_dump($result[0][0]);
    
    if ($_SESSION['useremail']) {
      if ((int)$result[0][0]) {
        $sql22 = "UPDATE cart SET qty = '$qty'  WHERE bname ='$bname' AND userEmail='$userEmail'";
        $stmt22 = $con->prepare($sql22);
        $stmt22->execute();
      } else {
        $sql23 = "INSERT INTO cart (bname, bprice, qty,userEmail) VALUES ('$bname', '$priceFormatted', '$qty','$userEmail')";
        $stmt23 = $con->prepare($sql23);
        $stmt23->execute();
      }
    }
  }
}

if (isset($_REQUEST["submit"])) {
  $username =  $_REQUEST["username"];
  $email = $_REQUEST["email"];
  $option = $_REQUEST["select"];
  $review = $_REQUEST["rev"];
  $bookname = $_REQUEST['name'];
  $sql3 = "INSERT INTO review (name, email, rate,feedback,bname) VALUES ('$username', '$email', '$option','$review','$bookname')";
  $stmt3 = $con->prepare($sql3);
  $stmt3->execute();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>BookStall</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <link rel="stylesheet" type="text/css" href="css1/normalize.css">
  <link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
  <link rel="stylesheet" type="text/css" href="css1/vendor.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" type="text/css" href="review.css">
  <link rel="stylesheet" type="text/css" href="css/headerstyle.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/footestyle.css">
  <!-- script
		================================================== -->
  <script src="js/modernizr.js"></script>

</head>

<body>
  <header class="header">
    <div class="header-1">
      <a href="#featured" class="logo"> <img src="image/logo.png" alt="" width="300" height="80"> </a>
      <form action="" class="search-form-x">
        <input type="search" id="srch" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
      </form>

      <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="shopping-cart.php" class="fas fa-shopping-cart"></a>
        <a href="signin.php">
          <div id="login-btn" class="fas fa-user"></div>
        </a>
      </div>

    </div>

    <div class="header-2">
      <nav class="navbar">
        <a href="#home">home</a>
        <a href="product.php">product</a>
        <a href="about.php">about</a>
        <a href="contact.php">contact</a>

      </nav>
    </div>
  </header>

  <section class="bg-sand padding-large">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <a href="#" class="product-image"><img src="<?php echo $img; ?>" alt="image"></a>
        </div>

        <div class="col-md-6 pl-5">
          <div class="product-detail">
            <h1><?php echo $name ?></h1>
            <span class="price colored"><?php echo $price; ?></span>
            <p>
              <?php echo $discription; ?>
            </p>
          

        <form method="post" name="addToCart" >
            <input type="number" min="0" max="15" placeholder="select quantity" style="width: 150px;" name="qty" id="qty-enter">
            <br>
            <button type="submit" name="add-to-cart" class="button" id="add-cart-itm" onClick="validateAddToCart()" >Add to cart</button>
            </form>
            </div>
        </div>

      </div>
    </div>
  </section>

  <h2 id="fh2">WE APPRECIATE YOUR REVIEW!</h2>
  <h3 id="fh6">Your review will help us to improve our web hosting quality products, and customer services.</h3>


  <form id="feedback" action="" method="post" style="font-size: 30px;">
    <div class="pinfo">Your personal info</div>

    <div class="form-group">
      <div class="col-md-6 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input name="username" placeholder="Name ..." class="form-control" type="text" style="font-size: 20px;">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input name="email" type="email" class="form-control" placeholder="xyz@gmail.com" style="font-size: 20px;">
        </div>
      </div>
    </div>



    <div class="pinfo">Rate our overall services.</div>


    <div class="form-group" style="padding-bottom:5px">
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon" style="height: 40px;"><i class="fa fa-heart"></i></span>
          <select class="form-control" id="rate" name="select" style="font-size: 20px; height: 40px;">
            <option value="1star">1</option>
            <option value="2stars">2</option>
            <option value="3stars">3</option>
            <option value="4stars">4</option>
            <option value="5stars">5</option>
          </select>
        </div>
      </div>
    </div>
    <br>
    <div class="pinfo" style="padding-top: 5px;">Write your feedback.</div>
    <div class="form-group">
      <div class="col-md-12 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
          <textarea class="form-control" id="review" rows="3" name="rev" style="font-size: 20px;"></textarea>

        </div>
      </div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary" style="width:150px ; font-size:20px ; margin-left:40%">Submit</button>

  </form>

  <section class="footer" id="ftr">

    <div class="box-container">

      <div class="box">
        <h3>quick links</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i> admin login </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> buyer login </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> register </a>

      </div>

      <div class="box">
        <h3>extra links</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
      </div>

      <div class="box">
        <h3>contact info</h3>
        <a href="#"> <i class="fas fa-phone"></i> +94-11-456-7890 </a>
        <a href="#"> <i class="fas fa-envelope"></i> info@bookstall.com </a>

      </div>

    </div>

    <div class="share">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
      <a href="#" class="fab fa-linkedin"></a>
      <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="credit"> <span>bookstall.lk</span> | all rights reserved! </div>

  </section>


  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script1.js"></script>
  <script src="https://use.fontawesome.com/a6f0361695.js"></script>

  <script type="module">
    let bname = "";
    let qty = "";
    let email = "";
    let oldQty = "";
    let allQty = 0;
    
  </script>

<script type="text/javascript">
              function validateAddToCart() {
                        if(!$qty){
                          alert ('please select the quantity !');
                        }else{
                          alert ('items added to cart sucessfully !');


                          
                        }
                       
                      }

            </script>
</body>

</html>