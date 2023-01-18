<html>
<?php include "./udasd/session.php" ?>

<head>
    <title>Payment page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/paymentstyle.css">
    <link rel="stylesheet" type="text/css" href="css/headerstyle.css">
    <link rel="stylesheet" type="text/css" href="css/footestyle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/paymentvalidation.js"></script>
</head>

<body>
    <header class="header">

        <div class="header-1">

            <a href="./index.php" class="logo"> <img src="image/logo.png" alt="" width="300" height="80"> </a>

            <form action="./shop.php" class="search-form-x">
                <input type="search" id="srch" placeholder="search here..." name="search-q">
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="shopping-cart.php" class="fas fa-shopping-cart"></a>
                <div id="login-btn" class="fas fa-user"></div>
            </div>

        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="./index.php">home</a>
                <a href="./shop.php">shop</a>
                <a href="about.php">about</a>
                <a href="contact.php">contact</a>

            </nav>
        </div>


    </header>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="/action_page.php" name="form1">
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname" id="label1"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Mr.Rathnayaka">
                            <label for="email" id="label2"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="rathnayaka@gmail.com">
                            <label for="adr" id="label3"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="No:12 , Colombo Road , Galle .">
                            <label for="city" id="label4"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Galle">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname" id="label">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname" id="label5">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="Visa/Master" onkeydown="validatecard()">
                            <label for="ccnum" id="label6">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth" id="label7">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear" id="label8">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2025">
                                </div>
                                <div class="col-50">
                                    <label for="cvv" id="label9">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label id="label10">
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" value="Continue to checkout" class="btn" onclick="validate_all()">
                </form>
            </div>
        </div>
    </div>

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

    <script src="js/script.js"></script>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>

    <script>
        function validateName() {
            var name = document.getElementById("name").value;
            var nameError = document.getElementById("nameError");

            if (name == "") {
                nameError.textContent = "Name is required.";
                document.getElementById("nameError").style.color = "red";
            } else {
                nameError.textContent = "";
                document.getElementById("nameError").style.color = "green";
                return true;
            }
            return false;
        }


        function validateEmail() {
            var email = document.getElementById("email").value;
            var emailError = document.getElementById("emailError");
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if (email == "") {
                emailError.textContent = "Email is required.";
                document.getElementById("emailError").style.color = "red";
            } else if (!emailRegex.test(email)) {
                emailError.textContent = "Invalid email format.";
                document.getElementById("emailError").style.color = "red";
            } else {
                emailError.textContent = "";
                document.getElementById("emailError").style.color = "green";
                return true;
            }
            return false;
        }

        function validateCardNumber() {
            var cardnumber = document.getElementById("ccnum").value;
            var cardNumberError = document.getElementById("cardNumberError");
            var cardRegex = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;

            if (cardnumber == "") {
                cardNumberError.textContent = "card Number is required.";
                document.getElementById("cardNumberError").style.color = "red";
            } else if (!cardRegex.test(cardnumber)) {
                cardNumberError.textContent = "Invalid card number format.";
                document.getElementById("cardNumberError").style.color = "red";
            } else {
                cardNumberError.textContent = "";
                document.getElementById("cardNumberError").style.color = "green";
                return true;
            }
            return false;
        }

        function validateCvvNumber() {
            var cvvnumber = document.getElementById("cvv").value;
            var cvvNumberError = document.getElementById("cvvNumberError");
            var cvvregex = /^[0-9]{3, 4}$/;

            if (cvvnumber == "") {
                cvvNumberError.textContent = "cvv Number is required.";
                document.getElementById("cvvNumberError").style.color = "red";
            } else if (!cvvregex.test(cvvnumber)) {
                cvvNumberError.textContent = "Invalid cvv number format.";
                document.getElementById("cvvNumberError").style.color = "red";
            } else {
                cvvNumberError.textContent = "";
                document.getElementById("cvvNumberError").style.color = "green";
                return true;
            }
            return false;
        }

        function validateAddress() {
            var address = document.getElementById("adr").value;
            var addressError = document.getElementById("addressError");

            if (address == "") {
                addressError.textContent = "Address is required.";
                document.getElementById("addressError").style.color = "red";
            } else {
                nameError.textContent = "";
                document.getElementById("addressError").style.color = "green";
                return true;
            }
            return false;
        }


        function validate_all() {
            if (validateName()) {
                if (validateEmail()) {
                    if (validateAddress()) {
                        if (validateCardNumber()) {
                            if (validateCvvNumber()) {
                                alert('payment success');
                            }
                        }
                    }
                }
            }
            return false;
        }
    </script>
</body>

</html>