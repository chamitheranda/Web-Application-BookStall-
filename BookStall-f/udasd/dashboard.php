<!DOCTYPE html>

<?php include "./session.php"; ?>
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
                                                <li class="dash-active">

                                                    <a href="dashboard.php">Manage My Account</a>
                                                </li>



                                                <li>

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
                                            <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>


                                            <div class="row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                        <div class="dash__pad-3">
                                                            <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                                                            <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                                <a href="dash-edit-profile.php">Edit</a>
                                                            </div>

                                                            <span class="dash__text"><?php echo $_SESSION["_usr_name"] ?></span>

                                                            <span class="dash__text"><?php echo $_SESSION["_usr_mail"] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                        <div class="dash__pad-3">
                                                            <h2 class="dash__h2 u-s-m-b-8">Shipping Address</h2>


                                                            <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                                <a href="dash-address-edit.php">Edit</a>
                                                            </div>

                                                            <span class="dash__text"><?php echo $_SESSION["_usr_address"] ?></span>
                                                            <span class="dash__text"><?php echo $_SESSION["_usr_phone"] ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="u-h-100">
                                                        <div class="dash__pad-3">
                                                            <h2 class="dash__h2 u-s-m-b-8"></h2>

                                                            <span class="dash__text-2 u-s-m-b-8"></span>

                                                            <span class="dash__text"></span>

                                                            <span class="dash__text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <h2 class="dash__h2 u-s-p-xy-20"></h2>
                                        <div class="dash__table-wrap gl-scroll">
                                            <table class="dash__table">
                                                <thead>
                                                    <tr>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    <tr>
                                                       
                                                    </tr>
                                                </tbody>
                                            </table>
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
    <!--====== End - Main App ======-->



    <!--====== Vendor Js ======-->
    <!--     <script src="js/vendor.js"></script>
 -->
    <!--====== jQuery Shopnav plugin ======-->

    <!--====== App ======-->

    <!--====== Noscript ======-->

</body>

</html>