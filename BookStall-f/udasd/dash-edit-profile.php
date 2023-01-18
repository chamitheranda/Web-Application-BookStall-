<?php include "./session.php";

$fname = null;
$reg_mail = null;
$reg_pass = null;
$reg_phone = null;
$u_id = $_SESSION["_usr_id"];



if (isset($_POST["reg-fname"])) {
    if ($_POST["reg-fname"]) {
        $fname =  $_POST["reg-fname"];
    } else {
        $fname = $_SESSION["_usr_name"];
    }
}
if (isset($_POST["reg-mail"])) {
    if ($_POST["reg-mail"]) {
        $reg_mail = $_POST["reg-mail"];
    } else {
        $reg_mail = $_SESSION["_usr_mail"];
    }
}
if (isset($_POST["reg-pass"])) {
    if ($_POST["reg-pass"]) {
        $reg_pass = $_POST["reg-pass"];
    }
}
if (isset($_POST["reg-phone"])) {
    if ($_POST["reg-phone"]) {
        $reg_phone = $_POST["reg-phone"];
    } else {
        $reg_phone = $_SESSION["_usr_phone"];
    }
}

include "./db.php";
if ($reg_mail) {
    $sql = "UPDATE user SET mail = '$reg_mail' WHERE id = $u_id";;
    $conn->query($sql);
};
if ($reg_phone) {
    $sql = "UPDATE user SET phone = '$reg_phone' WHERE id = $u_id";;
    $conn->query($sql);
}
if ($fname) {
    $sql = "UPDATE user SET name = '$fname' WHERE id = $u_id";
    $conn->query($sql);
}
if ($reg_pass) {
    $sql = "UPDATE user SET pass = '$reg_pass' WHERE id = $u_id";
    $conn->query($sql);
}

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
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>


                                            <div class="dash__link dash__link--secondary u-s-m-b-30">

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="dash-edit-p" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">
                                                                <input type="hidden" name="u_id" value="<?php echo $_SESSION["_usr_id"] ?>" />
                                                                <label class="gl-label" for="reg-fname">Full
                                                                    Name</label>

                                                                <input class="input-text input-text--primary-style" type="text" name="reg-fname" placeholder="E. F. Silva">
                                                            </div>

                                                        </div>

                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                                <input class="input-text input-text--primary-style" type="text" name="reg-mail" placeholder="1@mk.mk">

                                                            </div>
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">Password</h2>

                                                                <input class="input-text input-text--primary-style" type="password" name="reg-pass" placeholder="Enter the new password">

                                                            </div>
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                                                <input class="input-text input-text--primary-style" type="text" name="reg-phone" placeholder="0777123456">

                                                            </div>
                                                        </div>

                                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
    <!--====== End - Main App ======-->



    <!--====== Vendor Js ======-->
    <!--     <script src="js/vendor.js"></script>
 -->
    <!--====== jQuery Shopnav plugin ======-->

    <!--====== App ======-->

    <!--====== Noscript ======-->

</body>

</html>