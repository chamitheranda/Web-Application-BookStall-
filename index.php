<?php
include("dbconnection.php");

$sql = "SELECT * FROM offer;";
$stmt = $con->prepare($sql);
$stmt->execute();
$list = $stmt->fetchAll();

$sql2 = "SELECT picture,title,Price FROM books;";
$stmt2 = $con->prepare($sql2);
$stmt2->execute();
$list2 = $stmt2->fetchAll();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStall.lk | Online Book Store</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php include "./header.php" ?>

    <div class="login-form-container"></div>

    <div id="close-login-btn"></div>
    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>upto 50% off</h3>
                <p>Don't miss out on our amazing offers. <br>Check out our exclusive offers - only for a limited time period!</p>
                <a href="#featured" class="btn">shop now</a>
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($list as $r) {

                        echo "<a href=\"#\"class=\"swiper-slide\"><img src=\"" . $r["img"] . "\" ></a>";
                    }

                    ?>


                </div>
                <img src="image/stand.png" class="stand" alt="">
            </div>



        </div>

    </section>



    <section class="featured" id="featured">

        <h1 class="heading"> <span>featured books</span> </h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">

                <?php
                foreach ($list2 as $r2) {
                    echo "<div class=\"swiper-slide box\">
                <div class=\"icons\">
                    <a href=\"#\" class=\"fas fa-search\"></a>
                    <a href=\"#\" class=\"fas fa-heart\"></a>
                    <a href=\"product1.php?name=" . $r2['title'] . "\" class=\"fas fa-eye\"></a>
                </div>
                <div class=\"image\">
                <img src=\"" . $r2["picture"] . "\"alt=\"\">
                </div>
                <div class=\"content\">
                    <h3>" . $r2['title'] . "</h3>
                    <div class=\"price\">" . $r2['Price'] . " </div>
                    <a href=\"product1.php?name=" . $r2['title'] . "\" class=\"btn\">View</a>
                </div>
            </div>";
                }
                ?>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <section class="arrivals" id="arrivals">

        <h1 class="heading"> <span>new arrivals</span> </h1>

        <div class="swiper arrivals-slider">
            <div class="swiper-wrapper">

                <a href="product1.php?name=Slayer" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-1.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="product1.php?name=Soul Stealer" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-2.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="product1.php?name=Sister" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-4.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="product1.php?name=Butterfly Lion" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-5.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

            </div>

        </div>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">

                <a href="product1.php?name=Epic" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-6.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="product1.php?name=Sample Text" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-7.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="product1.php?name=Black History Month" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-8.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="product1.php?name=Bay Street" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-9.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="product1.php?name=Retro" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-10.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a> -->

            </div>

        </div>

    </section>

    <!-- arrivals section ends -->

    <!-- deal section starts  -->

    <section class="deal">

        <div class="image">
            <img src="image/offer-bg.png" alt="">
        </div>

        <div class="content">
            <h3>seasonal offer</h3>
            <h1>upto 50% off</h1>
            <p>Don't miss out on our amazing offers.<br> Check out our exclusive offers - valid till 31st January. <br>Hurry up!</p>
            <a href="#featured" class="btn">shop now</a>
        </div>



    </section>


    <section class="reviews" id="reviews">
        <h1 class="heading"> <span>client"s reviews</span> </h1>
        <div class="swiper reviews-slider">
            <div class="swiper-wrapper">
                <?php
                include "dbconnection.php";
                $sql1 = "SELECT * FROM review  ";
                $stmt1 = $con->prepare($sql1);
                $stmt1->execute();
                $list = $stmt1->fetchAll();
                $con = null;
                foreach ($list as $r) {
                    $name1 = $r['name'];
                    $feedback = $r['feedback'];
                    $bname = $r['bname'];
                    echo '
                        <div class="swiper-slide box">
                            <img src="image/pic-1.png" alt=""> ';
                    echo " <h3><em>$name1</em></h3>";
                    echo "<h3>$feedback</h3>";
                    echo "<h3>$bname</h3>";
                    if ($r['rate'] == "1star") {
                        echo '
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                </div>';
                    } else if ($r['rate'] == "2stars") {
                        echo '
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>';
                    } else if ($r['rate'] == "3stars") {
                        echo '
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>';
                    } else if ($r['rate'] == "4stars") {
                        echo '
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>';
                    } else if ($r['rate'] == "5stars") {
                        echo '
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>';
                    }
                    echo '</div> ';
                }

                ?>
            </div>
        </div>
    </section>










    <section class="icons-container">
        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <div class="content">
                <h3>free shipping</h3>
                <p>order over $100</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>secure payment</h3>
                <p>100 secure payment</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>easy returns</h3>
                <p>10 days returns</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>call us anytime</p>
            </div>
        </div>

    </section>

    <?php
    require_once('footer.php');
    ?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>