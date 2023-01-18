<!DOCTYPE html>
<?php include "./session.php";

$street = null;
$city = null;
$zip_code = null;
$u_id = $_SESSION["_usr_id"];

if (isset($_POST["address-street"])) {
    $street  =  $_POST["address-street"];
}
if (isset($_POST["address-city"])) {
    $city = $_POST["address-city"];
}
if (isset($_POST["address-postal"])) {
    $zip_code = $_POST["address-postal"];
}
$usr_new_address = $street . ", " . $city . ", " . $zip_code;

include "./db.php";
if ($_SESSION["_usr_address"] != $usr_new_address) {
    $sql = "UPDATE user SET address = '$usr_new_address' WHERE id = $u_id";;
    $conn->query($sql);
};

?>

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
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Address</h1>


                                            <form class="dash-address-manipulation" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
                                                        <input type="hidden" name="u_id" value="<?php echo $_SESSION["_usr_id"] ?>" />

                                                    </div>

                                                </div>
                                                <div class="gl-inline">

                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-street">STREET ADDRESS
                                                            *</label>

                                                        <input class="input-text input-text--primary-style" type="text" name="address-street" placeholder="#42, Marine Drive">
                                                    </div>
                                                </div>
                                                <div class="gl-inline">


                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-city">TOWN/CITY *</label>

                                                        <input class="input-text input-text--primary-style" type="text" name="address-city" placeholder="Colombo 01">
                                                    </div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-street">ZIP CODE
                                                            *</label>

                                                        <input class="input-text input-text--primary-style" type="text" name="address-postal" placeholder="00100">
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