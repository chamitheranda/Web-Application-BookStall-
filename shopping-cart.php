<?php
    include "dbconnection.php";

    $sql = "SELECT bname,bprice,qty FROM cart";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $list = $stmt->fetchAll();

    if(isset($_REQUEST['clear'])){
        $userEmail = $_SESSION['uname'];
        $sql1 = "DELETE FROM cart WHERE uEmail = $userEmail";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/shopping-cart.css">

</head>

<body>


<header class="header">

<div class="header-1">

    <a href="#" class="logo"> <img src="image/logo.png" alt="" width="300" height="80"> </a>

    <form action="" class="search-form">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>



</div>

<div class="header-2">
    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="product.php">product</a>
        <a href="about.php">about</a>
        <a href="contact.php">contact</a>

    </nav>
</div>


</header>
<!--
<nav class="bottom-navbar">
<a href="#home" class="fas fa-home"></a>
<a href="#featured" class="fas fa-list"></a>
<a href="#arrivals" class="fas fa-tags"></a>
<a href="#reviews" class="fas fa-comments"></a>
<a href="#blogs" class="fas fa-blog"></a>
</nav>
-->
<div class="breadcrumb">
        <ul >
            <li><a href="index.php">Home</a></li>
            <li><a href="product.php">product</a></li>
            <li>Shopping Cart</li>
            
        </ul>
    </div>

</div>
    <div class="cart-section">
    <div class="col-1">
        <table>
            <!-- -->
    
            <tr>
                <th>Book</th>
                <th>Quantity</th>
               
                <th>Total</th>
            </tr>

    <?php
        $total = 0;

        foreach($list as $r){
            $subttl = $r['bprice']*$r['qty'];
            echo "<tr>
            <td>".$r['bname']."</td>
            <td>".$r['qty']."</td>
         
            <td>".$subttl."</td>
            <td><input type=\"submit\" name=\"remove\" class=\"remove\" value=\"REMOVE\">
        </tr>";

        $total+=$subttl;

        }
            
    ?>
        </table>

        <div class="cart-btn">
            <div class="btn-1">
                <a href="shop.php"><input type="submit" name="continue" class="cart" value="CONTINUE SHOPPING"></a>
            </div>
            <div class="btn-1">
                <input type="submit" name="clear" class="cart" value="CLEAR CART">
            </div>
        </div>
    </div>
    <div class="col-1">
        <div class="coupan-form">
        <form action="">
            <h3>Discount Coupan</h3>
            <input type="text" name="discount" id="" class="discount">
            <input type="submit" value="Apply" class="apply">
        </form>
        </div>
        <div class="checkout-block">
            <h3>Cart Total</h3>
            <tr>
                <td>Total</td>
                <td><?php echo $total; ?></td>
            </tr><br>
            <a href="payment.php"><button value="Proceed to checkout" >Proceed to checkout</button></a>
        </div>
    </div>

    </div>
<?php
   
   require_once("footer.php");
?>
</body>

