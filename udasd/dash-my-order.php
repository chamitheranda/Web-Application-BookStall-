<?php
include "./session.php";
include "./db.php";

$sql = 'SELECT payments.transactions, payments.id, payments.amount, payments.date FROM payments INNER JOIN transactions ON payments.transactions = transactions.id where transactions.user=' . $_SESSION["_usr_id"];
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html class="js sizes customelements history postmessage websockets picture webworkers pointerevents webgl srcset cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox" lang="en" style="overflow-y: auto">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="images/favicon.png" rel="shortcut icon">
    <title>
        Bookstall User Dashboard </title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">
</head>

<body class="config">

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="/">Home</a>
                                    </li>
                                    <li class="is-marked">

                                        <a href="dashboard.php">My Account</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">

                                    <!--====== Dashboard Features ======-->
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">

                                            <span class="dash__text u-s-m-b-16">Hello, <?php echo $_SESSION["_usr_name"] ?></span>
                                            <ul class="dash__f-list">
                                                <li>

                                                    <a href="dashboard.php">Manage My Account</a>
                                                </li>

                                                <li class="dash-active">
                                                    <a href="./logout.php">Log out</a>

                                                    <a href="dash-my-order.php">My Orders</a>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <!-- Add shite here -->
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>


                                            <form class="m-order u-s-m-b-30">
                                                <div class="m-order__select-wrapper">

                                                    <label class="u-s-m-r-8" for="my-order-sort">Total number of orders:
                                                        5</label>
                                                </div>
                                            </form>
                                            <div class="m-order__list">

                                                <?php

                                                if ($result->num_rows > 0) {

                                                    echo   '<div class="m-order__get">';
                                                    echo     '<div class="manage-o__header u-s-m-b-30">';
                                                    echo        '<div class="dash-l-r">';
                                                    echo          ' <div>';



                                                    while ($row = $result->fetch_assoc()) {
                                                        echo ' <div class="manage-o__text-2 u-c-secondary">Order ' . $row["id"] . '</div>';
                                                        echo '<div class="manage-o__text u-c-silver">Placed on ' . $row["date"] . '</div>';
                                                        echo '</div><div></div></div></div>';

                                                        $sql1 = 'SELECT books.title, transactions.qty, books.price FROM books INNER JOIN transactions ON books.id = transactions.book where transactions.id=' . $row["id"];
                                                        $result1 = $conn->query($sql1);
                                                        if ($result1->num_rows > 0) {
                                                            while ($row1 = $result1->fetch_assoc()) {
                                                                echo '<div class="manage-o__description"><div class="description__container"><div class="description-title">';
                                                                echo $row1["title"] . '</div></div><div class="description__info-wrap"><div></div><div><span class="manage-o__text-2 u-c-silver">Quantity: ' . $row1["qty"];
                                                                echo '<span class="manage-o__text-2 u-c-secondary">1</span></span></div><div><span class="manage-o__text-2 u-c-silver">Price: <span class="manage-o__text-2 u-c-secondary">$' . $row1["price"];
                                                                echo '</span></span></div></div></div>';
                                                            }
                                                        }
                                                        /*  */
                                                    }
                                                }


                                                ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->


    <!--====== Main Footer ======-->

    </div>


</body>

</html>