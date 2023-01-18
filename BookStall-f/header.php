<header class="header">
<?php include "./cookie.php"; ?>
    <div class="header-1">

        <a href="./index.php" class="logo"> <img src="image/logo.png" alt="" width="300" height="80"> </a>

        <form action="./shop.php" class="search-form">
            <input type="search" name="search-q" placeholder="search here..." id="search-box" value="<?php if (isset($_REQUEST["search-q"])) {
                                                                                                            echo $_REQUEST["search-q"];
                                                                                                        }; ?>">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="shopping-cart.php" class="fas fa-shopping-cart"></a>
            <a href="signin.php"><div id="login-btn" class="fas fa-user"></div></a>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="shop.php">shop</a>
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
<!-- login form  -->

<div class="login-form-container">

<!--     <div id="close-login-btn" class="fas fa-times"></div>
 -->
    <!-- <form action="">
        <h3>sign in</h3>
        <span>username</span>
        <input type="email" name="" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>
 -->
</div>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>