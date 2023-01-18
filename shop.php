<?php

include "dbconnection.php";

$cat_res = "";
$search_q = "";

if (isset($_REQUEST["s"])) {
    $start = $_REQUEST["s"];
} else {
    $start = 0;    
}

$records_per_page = 6;
$end = $start + $records_per_page;

if (isset($_REQUEST["cat"])) {
    $cat_res = $_REQUEST["cat"];
}

if (isset($_REQUEST["search-q"])) {
    $search_q = $_REQUEST["search-q"];
}

$sql = "SELECT title, Picture, Price FROM books;";



$stmt = $con->prepare($sql);
$stmt->execute();
$rows = $stmt->rowcount();
$total_rows = $rows;

$sql_cat = "SELECT * FROM categories where status=1;";
$stmt_cat = $con->prepare($sql_cat);
$stmt_cat->execute();
$cats = $stmt_cat->fetchall();

$nav_links = ($rows - ($rows % $records_per_page)) / $records_per_page;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstall Shop</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/shop.css" />
</head>

<body>
    <?php require_once("header.php"); ?>

    <div class="breadcrumb">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>shop</li>
        </ul>
    </div>

    <div class="container">
        <div class="book-slides">
            <div class="catagories">
                <h2>Catogories</h2>
                <ul>
                    <?php foreach ($cats as $cat) {
                        echo  "  <a href=\"?cat=" . $cat['id'] . "\">
                 <li>" . $cat['name'] . "</li>
             </a> ";
                    } ?>
                    <a href="?">
                        <li>All</li>
                        <li>History</li>
                        <li>English</li>
                        <li>Action and Adventure</li>
                        <li>Art and Theater</li>
                    </a>



                </ul>
            </div>



        </div>

        <div class="book-view">
            <?php
            if (isset($_REQUEST["p"])) {
                $temp = abs($_REQUEST["p"]);
                $ss = (((abs($temp) - 1)) * $records_per_page);
                $sql = "SELECT title, Picture, Price FROM books limit $ss, $records_per_page";
            } else {
                $sql = "SELECT title, Picture, Price FROM books limit $start, $records_per_page";
            }
            if ($cat_res) {
                $sql = "SELECT title, Picture, Price FROM books where Categories = $cat_res;";
            }
            if ($search_q) {
                $sql = "SELECT title, Picture, Price FROM books WHERE title LIKE '%$search_q%' ";
            }

            $stmt = $con->prepare($sql);
            $stmt->execute();
            $rows = $stmt->rowcount();

            $run_t = 0;

            $list = $stmt->fetchall();
            if ($rows < 1 && $cat_res) {
                echo "<div><h1>No books in this category.</h1></div>";
            } else if ($rows < 1 && $search_q) {
                echo "<div><h1>No books found.</h1></div>";
            } else {
                foreach ($list as $r) {
                    echo "<script> console.log(\"" . $run_t . "\") </script>";
                    $run_t += $run_t;
                    echo "                 
                    <div class=\"book-item\">
                        <div class=\"book-image\">
                            <img src=\"" . $r['Picture'] . "\" alt=\"\" >
                        </div>

                        <div class=\"book-info\">
                            <p class=\"book-name\">" . $r['title'] . "</p><br>
                        
                            <p class=\"book-price\">" . $r['Price'] . "</p><br>
                            <a href=\"product1.php?name=" . $r['title'] . "\">
                            <button type=\"submit\" name=\"view\" class=\"book-view-btn\">view</button>
                            </a>
                        </div>
                    </div>
                    ";
                }
            }
            ?>
        </div>
    </div>

    <div class="book-view-nav">
        <?php if ($start != 0) { ?>
            <a href="shop.php?s=<?php echo ($start - 6); ?>">BACK&nbsp&nbsp&nbsp</a>
        <?php
        }

        for ($i = 1; $i < $nav_links; $i++) {
            echo "<a href='shop.php?p=" . $i . "'>$i</a>&nbsp&nbsp&nbsp";
        }
        ?>

        <?php if ($end < $nav_links * 6) { ?>
            <a href="shop.php?s=<?php echo $end; ?>">NEXT</a>
        <?php
        }
        ?>

    </div>

    <?php require_once("footer.php"); ?>

</body>

</html>