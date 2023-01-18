<html>
<?php include "./cookie.php";
include "./loadUsers.php";

$usersSearch = "*";
$catSearch = "*";
$bookSearch = "*";
$clickUsersMenu = 0;
$clickBookMenu = 0;
$clickCatMenu = 0;
$clickEditBook = 0;

//Add/edit book
$bookEditID = "";
$_bookTitle = "";
$imgURL = "";
$_ISBN = "";
$_author = "";
$_categories = "";
$_price = "";
$_year = "";
$_bkDes = "";



if (isset($_REQUEST["users-menu-ct"])) {
    $clickUsersMenu = true;
    $usersSearch =   $_REQUEST["users-menu-ct"];
}

if (isset($_REQUEST["books-menu-ct"])) {
    $clickBookMenu = true;
    $bookSearch =   $_REQUEST["books-menu-ct"];
}
if (isset($_REQUEST["categories-menu-ct"])) {
    $clickCatMenu = true;
    $catSearch =   $_REQUEST["categories-menu-ct"];
}
if (isset($_REQUEST["books-menu-edit"])) {
    $clickEditBook = true;
    $bookEditID =   $_REQUEST["books-menu-edit"];
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="./Responsive Admin_files/style.css">
    <link rel="stylesheet" type="text/css" href="./Responsive Admin_files/modal.css">
    <!--   <link rel="stylesheet" type="text/css" href="./Responsive Admin_files/utility.css">
    <link rel="stylesheet" type="text/css" href="./Responsive Admin_files/app.css">
 -->
    <style>
        .dash-table-cell {
            max-width: 5vw;
        }

        .dash__box.dash__box--bg-white.dash__box--radius.active {
            display: block;
        }

        .dash__box--bg-white {
            background-color: #ffffff;
            width: 40rem;

            overflow-y: auto;
            max-height: 65vh;
            position: fixed;
            z-index: 100;
            width: 70vw;
            top: 3rem;
            left: 10%;
            display: none;

        }

        .dash__box--border {
            border: 1px solid #eee;
        }

        .dash__box--bg-grey {
            background-color: #fbfbfb;
        }

        .dash__box--shadow {
            box-shadow: -2px 0px 14px 0 rgba(36, 37, 38, 0.08);
        }

        .dash__box--shadow-2 {
            box-shadow: -6px 2px 8px 0 rgba(36, 37, 38, 0.08);
        }

        .dash__box--radius {
            border-radius: 15px;
        }

        .dash__h1 {
            line-height: 1;
            color: #333333;
            font-size: 18px;
        }

        .dash__h2 {
            line-height: 1;
            font-size: 1.5rem;
            color: #333333;
            line-height: 1;
            font-size: 14px;
            color: #333333;
            position: absolute;
            top: 0.5rem;
            left: 0.5rem;
        }

        .dash__table-wrap {
            height: 300px;
            overflow: auto;
        }

        .dash__table-wrap {
            height: 300px;
            overflow: auto;
        }

        .dash__table {
            width: 80vw;
            border-collapse: collapse;
        }

        .dash__table thead {
            background-color: #fbfbfb;
        }

        .dash__table th,
        .dash__table td {
            padding: 0.5rem;
            text-align: center;
            font-weight: 600;
            color: #333333;
            max-width: 5vw;
        }

        .dash__table th {
            font-size: 14px;
        }

        .dash__table td {
            font-size: 13px;
        }

        .dash__table tbody tr {
            border-bottom: 1px solid #eee;
        }

        .dash__table tbody tr:last-child {
            border-bottom: 0;
        }
    </style>
</head>

<body>
    <script>
        const siteAddress = "<?php echo $_SERVER["PHP_SELF"] ?>"
    </script>
    <div id="backdrop" class=""></div>

    <div class="container">
        <div class="navigation">
            <ul>
                <li id="home-btn">
                    <a href="#">
                        <span class="icon"><i class="fa fa-book" aria-hidden="true"></i>
                        </span>
                        <span class="title">
                            <h2>Bookstall</h2>
                        </span>
                    </a>
                </li>
                <li id="dash-reload" class="">
                    <a href="#">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="users-menu linker" id="users-menu"><a href="#">
                        <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li class="books-menu linker" id="books-menu"><a href="#">
                        <span class="icon"><i class="fa fa-archive" aria-hidden="true"></i></span>
                        <span class="title">Books</span>
                    </a>
                </li>
                <li class="categories-menu linker" id="categories-menu"><a href="#">
                        <span class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li class="settings-menu linker" id="settings-menu"><a href="#">
                        <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                        <span class="title">Account Settings</span>
                    </a>
                </li>


                <li class="signout-menu" id="sub"><a href="./logout.php">
                        <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                        <span class="title">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main home">
            <div class="topbar">
                <div class="toggle" onclick="toggleHome()"></div>
                <div class="search">
                    <label>

                    </label>
                </div>
                <div class="user">
                    <img src="./Responsive Admin_files/user.png">
                </div>
            </div>
            <div class="init-content">
                <div class="cardBox">



                    <h1>Welcome <?php echo $_SESSION["_admin_name"] ?>!</h1>
                </div>
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Website statistics</h2>

                        </div>
                        <table>

                            <tbody>
                                <tr>
                                    <td>Total number of books</td>

                                    <td> </td>
                                    <td><span id="total-books" class="status delivered">Loading...</span></td>
                                </tr>
                                <tr>
                                    <td>Total number of users</td>
                                    <td> </td>

                                    <td><span id="total-users" class="status Pending">Loading...</span></td>
                                </tr>
                                <tr>
                                    <td>Total sales</td>

                                    <td> </td>
                                    <td><span id="total-sales" class="status return">Loading...</span></td>
                                </tr>
                                <tr>
                                    <td>Total number of categories</td>

                                    <td> </td>
                                    <td><span id="total-cats" class="status inprogress">Loading...</span></td>
                                </tr>
                                <tr>
                                    <td>Total number of administrators</td>

                                    <td> </td>
                                    <td><span id="total-admins" class="status delivered">Loading...</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="main  users-menu menu-content" id="users-menu-ct">
            <div class="topbar">
                <div class="toggle" onclick="toggleMenu()"></div>
                <div class="search">
                    <label>

                    </label>
                </div>
                <div class="user">
                    <img src="./Responsive Admin_files/user.png">
                </div>
            </div>
            <!---- End -->
            <div>

                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers" id="push-user"> </div>
                            <div class="cardName">Users</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers" id="tollSales">$800</div>
                            <div class="cardName">Total Sales</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                    </div>


                </div>
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Users</h2>
                            <div class="search-holder">

                                <div class="search">
                                    <label>
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                            <input type="text" placeholder="Enter user ID, name or email & press enter" name="users-menu-ct" value="<?php if ($usersSearch != "*") {
                                                                                                                                                        echo $usersSearch;
                                                                                                                                                    } ?>">
                                        </form>
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </label>
                                </div>

                            </div>
                            <a href="#" class=""></a>
                        </div>
                        <div style="overflow-x: auto;">

                            <div class="grid users-pg">
                                <div class="grid-item header">User ID</div>
                                <div class="grid-item header">Name</div>
                                <div class="grid-item header">Email</div>
                                <div class="grid-item header">Billing address</div>
                                <div class="grid-item header">Phone number</div>
                                <div class="grid-item header">Account Status</div>
                                <div class="grid-item header">Total Purchases</div>
                                <div class="grid-item header">Transactions</div>
                                <div class="grid-item header">Change account status</div>
                                <?php fetchData($_SESSION["_admin_id"], $usersSearch, "user") ?>

                            </div>


                        </div>
                    </div>
                    <script>
                        const usr = document.getElementById("push-user")


                        const updateUsrCount = new XMLHttpRequest();
                        updateUsrCount.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                usr.textContent = JSON.parse(this.responseText)[0]["user"];
                            }

                        }
                        updateUsrCount.open("GET", "./api/db_api.php?type=user&count=id", true);
                        updateUsrCount.send();
                    </script>
                </div>
            </div>
        </div>
        <div class="main menu-content books-menu" id="books-menu-ct" style="height: 100vh">
            <div class="topbar">
                <div class="toggle" onclick="toggleMenu()"></div>
                <div class="search">
                    <label>

                    </label>
                </div>
                <div class="user">
                    <img src="./Responsive Admin_files/user.png">
                </div>
            </div>
            <!---- End -->
            <div>

                <div class="cardBox">
                    <div class="card">
                        <div>

                            <div class="numbers" id="tollBooks">Loading...</div>
                            <div class="cardName">books</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers" id="tollSales2">Loading...</div>
                            <div class="cardName">Purchases</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                    </div>


                </div>
                <div class="details" style="margin-bottom: 1rem; width: 30rem">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Add a new book</h2>


                        </div>
                        <div class="search-holder" id="add-new-book">


                            <div style="display: flex;padding-top: 1rem;">
                                <label style="
    text-align: center;
">
                                    <span class="status return action-btn">Add Now</span>

                                </label>
                            </div>

                        </div>
                        <div style="overflow-x: auto;">


                            <h2></h2>

                        </div>
                    </div>

                </div>
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Books</h2>
                            <div class="search-holder">

                                <div class="search">
                                    <label>
                                        <form id="book-search-0" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                            <input type="text" class="book-search-0" placeholder="Enter name of the book & press enter" name="books-menu-ct" value="<?php if ($bookSearch != "*") {
                                                                                                                                                                        echo $bookSearch;
                                                                                                                                                                    } ?>">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </form>
                                    </label>
                                </div>

                            </div>
                            <a href="#" class=""></a>
                        </div>
                        <div style="overflow-x: auto; overflow-y: auto;">

                            <div class="grid books-pg">
                                <div class="grid-item header">ISBN</div>
                                <div class="grid-item header">Title</div>
                                <div class="grid-item header">Picture</div>
                                <div class="grid-item header">Author(s)</div>
                                <div class="grid-item header">Book Status</div>
                                <div class="grid-item header">Purchased users</div>
                                <div class="grid-item header">Purchased times</div>
                                <div class="grid-item header">Categories</div>
                                <div class="grid-item header">Price</div>
                                <div class="grid-item header">Description</div>
                                <div class="grid-item header">Year Published</div>
                                <div class="grid-item header">Edit</div>
                                <?php fetchData($_SESSION["_admin_id"], $bookSearch, "books") ?>


                            </div>


                        </div>
                    </div>
                    <script>
                        const form = document.getElementById("book-search-0")
                        const txtForm = document.querySelector(".book-search-0")
                    </script>
                </div>
            </div>
            <!--             <div id="backdrop" class=""></div>
 -->
            <script type="module">

            </script>
            <div class="modal card" id="add-modal">
                <div class="modal__content">
                    <input type="hidden" id="movie-id-holder" value="0" />
                    <label for="title">Book Title</label>
                    <input type="text" name="title" id="book-title" value="" />
                    <label for="image-url">Image URL</label>
                    <input type="text" name="image-url" id="book-image-url" />
                    <label for="image-url">ISBN</label>
                    <input type="text" name="isbn" id="book-isbn" />
                    <label for="image-url">Author</label>
                    <input type="text" name="author" id="book-author" />
                    <label for="image-url" id="cat-placeholder-editor">Categories</label>
                    <input type="text" name="categories" id="book-categories" placeholder="Seperate the categories with a comma" />
                    <label for="image-url">Price</label>
                    <input type="number" max="99999999" min="1" name="price" id="book-price" />
                    <label for="image-url">Year Published</label>
                    <input type="number" max="<?php echo date("Y"); ?>" min="1600" name="year" id="book-year" />
                    <label for="image-url">Description</label>
                    <input type="text" name="description" id="book-description" />
                </div>
                <script>

                </script>
                <div class="modal__actions">
                    <button class="btn btn--passive">Cancel</button>
                    <button class="btn btn--success" id="add-book-to-db-btn">Add</button>
                    <button class="btn btn--red" style="display: none;" id="delete-book-btn">Delete Book</button>
                </div>
            </div>

        </div>

        <div class="main menu-content categories-menu" id="categories-menu-ct" style="height: 100vh">
            <!--             .menu-content
 -->
            <div class="topbar">
                <div class="toggle" onclick="toggleMenu()"></div>
                <div class="search">
                    <label>

                    </label>
                </div>
                <div class="user">
                    <img src="./Responsive Admin_files/user.png">
                </div>
            </div>
            <!---- End -->
            <div>

                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers" id="push-books"> </div>
                            <div class="cardName">Books</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers" id="push-cats"> </div>
                            <div class="cardName">Total Categories</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </div>
                    </div>

                </div>
                <div class="details" style="margin-bottom: 1rem;">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2 id="new-cats-info">Add a new category</h2>


                        </div>
                        <div class="search-holder">


                            <div style="display: flex;padding-top: 1rem;">
                                <label>
                                    <input class="input-text input-text--primary-style" type="text" id="add-new-cats-input" placeholder="Romance"> <span class="status return action-btn" id="add-new-cats">Add
                                        category</span>

                                </label>
                            </div>

                        </div>
                        <div style="overflow-x: auto;">


                            <h2></h2>

                        </div>
                    </div>

                </div>
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Categories</h2>

                            <div class="search-holder">

                                <div class="search">
                                    <label>
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">

                                            <input type="text" placeholder="Enter label name and press enter to Search" name="categories-menu-ct" value="<?php if ($catSearch != "*") {
                                                                                                                                                                echo $catSearch;
                                                                                                                                                            } ?>">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </form>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div style="overflow-x: auto;">

                            <div class="grid categories-pg">
                                <div class="grid-item header">Category ID</div>
                                <div class="grid-item header">Category</div>
                                <div class="grid-item header">Category Status</div>

                                <div class="grid-item header">Books</div>
                                <div class="grid-item header">Change category status</div>
                                <?php fetchData($_SESSION["_admin_id"], $catSearch, "categories") ?>

                            </div>


                        </div>
                    </div>

                </div>


            </div>
            <script>
                const bks = document.getElementById("push-books")
                const updateBkCount = new XMLHttpRequest();
                updateBkCount.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        bks.textContent = JSON.parse(this.responseText)[0]["books"];
                    }

                }
                updateBkCount.open("GET", "./api/db_api.php?type=books&count=id", true);
                updateBkCount.send();
            </script>
            <script>
                const cats = document.getElementById("push-cats")
                const updateCatsCount = new XMLHttpRequest();
                updateCatsCount.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        cats.textContent = JSON.parse(this.responseText)[0]["categories"];
                    }

                }
                updateCatsCount.open("GET", "./api/db_api.php?type=categories&count=id", true);
                updateCatsCount.send();
            </script>
        </div>

        <div class="main menu-content settings-menu" id="settings-menu-ct" style="height: 100vh">
            <div class="topbar">
                <div class="toggle" onclick="toggleMenu()"></div>
                <div class="search">
                    <label>

                    </label>
                </div>
                <div class="user">
                    <img src="./Responsive Admin_files/user.png">
                </div>
            </div>
            <div class="cardBox">

            </div>
            <div class="login-form-container" style="
    padding: 2rem;
    display: flex;
    flex-direction: column;
">
                <span>Username</span>
                <input type="text" name="email" class="box" placeholder="enter new username" id="update-username" style="
    width: 20vw;
">
                <span>password</span>
                <input type="password" name="pswd" class="box" placeholder="enter new password" id="update-password" style="
    width: 20vw;
">

                <input type="button" value="Update now" class="btn" name="signin-btn" id="update-admin" style="
    position: absolute;
    top: 16rem;
    left: 6rem;
    height: 4rem;
">

            </div>

            <!-- <div class="main menu-content admins-menu" style="height: 100vh" id="admins-menu-ct">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu()"></div>
                    <div class="search">
                        <label>

                        </label>
                    </div>
                    <div class="user">
                        <img src="./Responsive Admin_files/user.png">
                    </div>
                </div>
                End 

            </div> -->
        </div>
        <div class="dash__box dash__box--bg-white dash__box--radius" style="margin-right: 2rem;    margin-right: 2rem;
    position: absolute;
    top: 8rem;max-height: 70vh;
    overflow-y: auto;" id="transaction-sheet">
            <h2 class="dash__h2 u-s-p-xy-20"> </h2>
            <div class="dash__table-wrap gl-scroll">
                <table class="dash__table">
                    <thead>
                        <tr>
                            <th class="dash-table-cell">Order #</th>
                            <th class="dash-table-cell">Placed On</th>
                            <th class="dash-table-cell">Total</th>
                        </tr>
                    </thead>
                    <tbody id="add-transactions-items-to">



                        <!-- <tr>
                            <td class="dash-table-cell">3054231326</td>
                            <td class="dash-table-cell">26/13/2016</td>

                            <td class="dash-table-cell">
                                <div class="dash__table-total">

                                    <span>$126.00</span>

                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dash__box dash__box--bg-white dash__box--radius" style="margin-right: 2rem;    margin-right: 2rem;
    position: absolute;
    top: 8rem;max-height: 70vh;
    overflow-y: auto;" id="books-sheet">
            <h2 class="dash__h2 u-s-p-xy-20"> </h2>
            <div class="dash__table-wrap gl-scroll">
                <table class="dash__table">
                    <thead>
                        <tr>
                            <th class="dash-table-cell">Book name</th>

                        </tr>
                    </thead>
                    <tbody id="add-books-items-to">



                        <!-- <tr>
                            <td class="dash-table-cell">3054231326</td>
                            <td class="dash-table-cell">26/13/2016</td>

                            <td class="dash-table-cell">
                                <div class="dash__table-total">

                                    <span>$126.00</span>

                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            for (const _ of document.querySelectorAll("#how-many-time-purchased")) {
                fetch(`./api/db_api.php?type=transactions&sum=qty&where=book=${_.getAttribute("name")}`)
                    .then((response) => response.json()).then((data) => _.textContent = data[0].transactions ? data[0].transactions : '0');
            }

            let elState = "";
            let divC;
            const allNav = document.querySelector(".navigation");
            allNav.addEventListener("click", (ev) => {
                let id = "";
                let evTarget = ev.target.closest("li")
                if (ev.target.closest("li").className.includes("linker")) {
                    if (elState) {
                        console.log(elState)
                        document.getElementById(elState).classList.remove("activated")

                    }
                    id = evTarget.id + "-ct"
                    divC = document.getElementById(id)
                    if (elState == id) {
                        id = ""
                    } else {
                        elState = id
                    }
                    divC.classList.toggle("activated")
                    console.log(divC)
                    toggleMenu();
                }
            })
            const dashReload = document.getElementById("dash-reload")
            dashReload.addEventListener("click", () => {
                window.location.replace("<?php echo $_SERVER['PHP_SELF'] ?>");

            })
            const homeBtn = document.getElementById("home-btn")
            homeBtn.addEventListener("click", () => {
                window.location.replace("/");

            })


            const toggleMenu = () => {
                console.log(screen.width)

                if (screen.width < 993) {
                    let elState2 = elState.replace("-ct", "")
                    console.log(elState2)

                    let toggle = document.querySelector(".toggle");
                    let navigation = document.querySelector(".navigation");
                    elState2 = document.querySelector(elState2)
                    toggle.classList.toggle("active");
                    navigation.classList.toggle("active");
                    if (elState2) {
                        elState2.classList.toggle("active");
                    } else {
                        document.querySelector(".main").classList.toggle("active");
                    }

                }
            }

            function toggleHome() {
                console.log(screen.width)
                if (screen.width < 993) {
                    let toggle = document.querySelector(".toggle");
                    let navigation = document.querySelector(".navigation");
                    let main = document.querySelector(".main");
                    toggle.classList.toggle("active");
                    navigation.classList.toggle("active");
                    main.classList.toggle("active");
                }
            }
        </script>
        <script>
            let allBooks = [];
            let allCats = [];
            let allAuths = []
            const setValsInEdit = {}
            setValsInEdit.setCats = function(cats1) {
                if (cats1) {
                    console.log(cats1)
                    this.bkCats.value = cats1
                    /*     const deleteBtn = document.getElementById("delete-book-btn")
                        deleteBtn.style.display = "block" */
                }

            }
            setValsInEdit.bkTitle = document.getElementById("book-title");
            setValsInEdit.bkImg = document.getElementById("book-image-url");
            setValsInEdit.bkIsbn = document.getElementById("book-isbn");
            setValsInEdit.bkAuthor = document.getElementById("book-author");
            setValsInEdit.bkCats = document.getElementById("book-categories");
            setValsInEdit.bkPrice = document.getElementById("book-price");
            setValsInEdit.bkYr = document.getElementById("book-year")
            setValsInEdit.bkDes = document.getElementById("book-description")
            setValsInEdit.setVals = function(bookishStuff1, allCats) {

                if (bookishStuff1) {
                    this.bookishStuff1 = bookishStuff1
                    this.bkTitle.value = bookishStuff1.title;
                    this.bkDes.value = bookishStuff1.Description;
                    this.bkImg.value = bookishStuff1.Picture;
                    this.bkIsbn.value = bookishStuff1.ISBN;
                    this.bkAuthor.value = bookishStuff1.Author;
                    this.bkPrice.value = bookishStuff1.Price;
                    this.bkYr.value = bookishStuff1.year;
                    /* for (const cat of this.bookishStuff1.Categories.split(",")) {
                        fetch(`/api/db_api.php?type=categories&where=id=${bkID}`)
                            .then((response) => response.json())
                            .then((data) => cats1 += data[0]["name"]).then(this.setCats(cats1))
                    } */
                    this.setCats(allCats)
                };




                let bkID = "";
                let bookishStuff = "";
                let cats1 = "";
                bkID = <?php if ($bookEditID) {
                            echo $bookEditID;
                        } else {
                            echo 0;
                        }  ?>;
                if (bkID) {
                    console.log("433")
                    fetch(`./api/db_api.php?type=books&where=id=${bkID}`)
                        .then((response) => response.json())
                        .then((data) => setValsInEdit.setVals(data[0])).then(console.log(setValsInEdit));



                }
            }

            fetch('./api/db_api.php?type=books')
                .then((response) => response.json())
                .then((data) => allBooks = data).then(fetch('./api/db_api.php?type=categories')
                    .then((response1) => response1.json())
                    .then((data1) => allCats = data1))



            const addNewCat = () => {
                usrInput = document.getElementById("add-new-cats-input").value
                if (!usrInput.trim()) {
                    document.getElementById("new-cats-info").textContent = "Please enter a valid value!"

                } else if (allCats.find(x => x.name.toLowerCase() == usrInput.toLowerCase())) {
                    document.getElementById("new-cats-info").textContent = "This Category already exists! Please add a new one."
                } else {
                    var formdata = new FormData();
                    formdata.append("insert", `(name, status, books) VALUES ('${usrInput}', 1, 0)`);
                    formdata.append("type", "categories");

                    var requestOptions = {
                        method: 'POST',
                        body: formdata,
                        redirect: 'follow'
                    };

                    fetch("./api/db_api.php", requestOptions)
                        .then(response => response.text())
                        .then(document.getElementById("new-cats-info").textContent = "New category was added.")
                        .then(setTimeout(3000)).then(window.location.replace("<?php echo $_SERVER['PHP_SELF'] ?>" + "?categories-menu-ct="))
                }
            }

            const addNewCatDiv = document.getElementById("add-new-cats");
            addNewCatDiv.addEventListener("click", addNewCat)
            /* Add movie */
            const transactionSheetActive = false;
            const movieModalActive = false;

            const addMovieModal = document.getElementById('add-modal');

            const startAddMovieButton = document.getElementById('add-new-book');

            const backdrop = document.getElementById('backdrop');

            const cancelAddMovieButton = addMovieModal.querySelector('.btn--passive');

            const transactionSheet = document.getElementById("transaction-sheet")

            const booksSheet = document.getElementById("books-sheet")

            const toggleBackdrop = () => {
                backdrop.classList.toggle('visible');
            };

            const toggleMovieModal = () => { // function() {}
                addMovieModal.classList.toggle('visible');

                toggleBackdrop();
                document.getElementById("delete-book-btn").style.display = "none"
                document.getElementById("book-title").value = ""
                document.getElementById("book-image-url").value = "";
                document.getElementById("book-isbn").value = "";
                document.getElementById("book-author").value = "";
                document.getElementById("book-categories").value = "";
                document.getElementById("book-price").value = "";
                document.getElementById("book-year").value = ""
                document.getElementById("book-description").value = ""
                document.getElementById("cat-placeholder-editor").innerHTML = 'Categories'

            };

            const cancelAddMovie = () => {
                toggleMovieModal();
            };

            const backdropClickHandler = () => {

                transactionSheet.classList.remove("active")
                booksSheet.classList.remove("active")

                addMovieModal.classList.remove('visible')
                toggleBackdrop()
            };

            const toggleTransactions = () => {
                transactionSheet.classList.toggle("active")
                toggleBackdrop();

            }

            const toggleBooks = () => {
                booksSheet.classList.toggle("active")
                toggleBackdrop();

            }

            startAddMovieButton.addEventListener('click', toggleMovieModal);
            backdrop.addEventListener('click', backdropClickHandler);
            cancelAddMovieButton.addEventListener('click', cancelAddMovie)
            const totalBooks = document.getElementById("total-books")
            const totalUsers = document.getElementById("total-users")
            const totalSales = document.getElementById("total-sales")
            const totalCats = document.getElementById("total-cats")
            const totalAdmins = document.getElementById("total-admins")
            const tollBooks1 = document.getElementById("tollBooks")
            const totalSalesMenu = document.getElementById("tollSales")

            const addMovieToDb = document.getElementById("add-book-to-db-btn")

            const updateSalesInfo = (amount) => {
                console.log(amount)
                totalSales.textContent = amount;
                totalSalesMenu.textContent = amount;
                document.getElementById("tollSales2").textContent = amount;
            }
            const updateBooksInfo = (amount) => {
                console.log(amount)
                totalBooks.textContent = amount;
                tollBooks1.textContent = amount;

            }
            fetch('./api/db_api.php?type=books&count=id')
                .then((response) => response.json())
                .then((data) => updateBooksInfo(data[0]["books"]));

            fetch('./api/db_api.php?type=user&count=id')
                .then((response) => response.json())
                .then((data) => totalUsers.textContent = data[0]["user"]);

            fetch('./api/db_api.php?type=payments&sum=amount')
                .then((response) => response.json())
                .then((data) => updateSalesInfo("$ " + data[0]["payments"]));

            fetch('./api/db_api.php?type=categories&count=id')
                .then((response) => response.json())
                .then((data) => totalCats.textContent = data[0]["categories"]);

            fetch('./api/db_api.php?type=admins&count=id')
                .then((response) => response.json())
                .then((data) => totalAdmins.textContent = data[0]["admins"]);



            if (<?php echo $clickUsersMenu ?>) {
                document.querySelector(".users-menu.linker").click()
                console.log(<?php echo $clickUsersMenu ?>)
            } else if (<?php echo $clickCatMenu ?>) {
                document.querySelector(".categories-menu.linker").click()
                console.log(<?php echo $clickCatMenu ?>)
            } else if (<?php echo $clickBookMenu ?>) {
                document.querySelector(".books-menu.linker").click()

            } else if (<?php echo $clickEditBook ?>) {


            }
            //.status.return.action-btn.pointer.editbtn
            document.querySelector(".grid.books-pg").addEventListener("click", (ev) => {
                if (ev.target.classList.value == 'status return action-btn pointer editbtn') {
                    if (allBooks != [] && allCats != [] && allAuths != []) {
                        console.log(allBooks)
                        console.log(allCats)
                        let supCats = ""
                        document.getElementById("movie-id-holder").value = ev.target.id
                        document.getElementById("add-new-book").click();
                        const deleteBtn = document.getElementById("delete-book-btn")
                        deleteBtn.style.display = "block"
                        console.log(ev.target)
                        const bookID = parseInt(ev.target.id);

                        const supBook = allBooks.find(element => element.id == bookID);
                        /* for (const cat of supBook.Categories.split(",")) {
                            if (cat) {
                                console.log(cat)
                               // supCats += allCats.find(cat1 => cat1.id == cat).name + ", "
                            } else {
                                continue
                            }
                        } */
                        setValsInEdit.setVals(supBook, supCats)

                    }
                }

            })

            document.querySelector(".grid.users-pg").addEventListener("click", (ev) => {
                if (ev.target.classList.value == 'status return action-btn pointer editbtn') {
                    var formData = new FormData();
                    let activeNum = 0;
                    let defStatusText = "Deactivated";
                    if (document.getElementById(`delevered-status-${ev.target.id}`).textContent != "Active") {
                        activeNum = 1;
                        defStatusText = "Active"
                    }
                    formData.append('set', `status='${activeNum}'`);
                    formData.append('where', `id = ${ev.target.id}`);
                    formData.append('type', 'user');
                    fetch('./api/db_api.php', {
                            method: 'POST', // or 'PUT'
                            body: formData,
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log('Success:', data);
                        })
                        .then(document.getElementById(`delevered-status-${ev.target.id}`).textContent = defStatusText)
                }

            })
            let transactionsArray = [];

            document.querySelector(".grid.users-pg").addEventListener("click", (ev) => {
                if (ev.target.id == "view-transactions-btn") {
                    var formdata = new FormData();
                    formdata.append("join_sel", "payments.transactions, payments.amount, payments.date");
                    formdata.append("where", `transactions.user=${ev.target.getAttribute("name")}`);
                    formdata.append("type", "transactions");
                    formdata.append("type2", "payments");
                    formdata.append("join", "transactions.id=payments.transactions");
                    console.log(transactionsArray)
                    var requestOptions = {
                        method: 'POST',
                        body: formdata,
                        redirect: 'follow'
                    };
                    const updateTable = async (get) => {

                        console.log(1127)
                        transactionsArray = get
                        if(transactionsArray != []) {
                            document.getElementById("add-transactions-items-to").innerHTML = ""

                            for (_ of transactionsArray) {
                                console.log(transactionsArray)
                                document.getElementById("add-transactions-items-to").innerHTML += `
                        <tr>
                            <td class="dash-table-cell">${_.transactions}</td>
                            <td class="dash-table-cell">${_.date}</td>

                            <td class="dash-table-cell">
                                <div class="dash__table-total">

                                    <span>\$${_.amount}</span>

                                </div>
                            </td>
                        </tr>
                        `
                            }
                            toggleTransactions()

                        }

                    }

                    fetch("./api/db_api.php", requestOptions)
                        .then(response => response.json())
                        .then(result => updateTable(result))

                }
            })

            /*
//

            
            */

            document.getElementById("book-categories").addEventListener("keypress", e => {

                if (e.which == 44) {
                    document.getElementById("book-categories");

                    for (_ in document.getElementById("book-categories").value.split(",")) {
                        console.log(document.getElementById("book-categories").value.split(","))
                        if (allCats.find(element => element.name == _)) {
                            document.getElementById("cat-placeholder-editor").innerHTML = 'Categories'
                        } else {
                            document.getElementById("cat-placeholder-editor").innerHTML = '<font color="red">There are some categories that are not included in the database. <a href="./index.php?categories-menu-ct"> Please add them first</a></font>'
                        }


                    }


                }

            })

            booksJoinArray = []
            document.querySelector(".grid.categories-pg").addEventListener("click", (ev) => {
                if (ev.target.textContent == 'Change') {
                    console.log(1190)
                    var formData = new FormData();
                    let activeNum = 0;
                    let defStatusText = "Deactivated";
                    console.log(ev.target.id)
                    if (document.querySelector(".grid.categories-pg").querySelector(`#delevered-status-${ev.target.id}`).textContent != "Active") {
                        activeNum = 1;
                        defStatusText = "Active"
                    }
                    formData.append('set', `status='${activeNum}'`);
                    formData.append('where', `id = ${ev.target.id}`);
                    formData.append('type', 'categories');
                    fetch('./api/db_api.php', {
                            method: 'POST', // or 'PUT'
                            body: formData,
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log('Success:', data);
                        })
                        .then(document.querySelector(".grid.categories-pg").querySelector(`#delevered-status-${ev.target.id}`).textContent = defStatusText)
                } else if (ev.target.textContent == "View all") {
                    var formdata = new FormData();
                    formdata.append("join_sel", "books.title");
                    formdata.append("where", `categories.id=${ev.target.id}`);
                    formdata.append("type", "categories");
                    formdata.append("type2", "books");
                    formdata.append("join", "categories.id=books.Categories");
                    var requestOptions = {
                        method: 'POST',
                        body: formdata,
                        redirect: 'follow'
                    };
                    const updateBooksTable = async (get) => {
                        {
                            booksJoinArray = get
                            if(booksJoinArray != []) {
                                document.getElementById("add-books-items-to").innerHTML = ""
                                toggleBooks()

                                for (_ of booksJoinArray) {
                                    document.getElementById("add-books-items-to").innerHTML += `
                        <tr>
                            <td class="dash-table-cell">${_.title}</td>
                            
                        </tr>
                        `
                                }
                            }
                        }
                    }



                    fetch("./api/db_api.php", requestOptions)
                        .then(response => response.json())
                        .then(result => updateBooksTable(result))
                }


            })
            const deleteBookBtn = document.getElementById("delete-book-btn")
            deleteBookBtn.addEventListener("click", () => {
                var formdata = new FormData();
                formdata.append("delete", "books");
                formdata.append("where", `id=${document.querySelector("#movie-id-holder").value}`);

                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };







                fetch("./api/db_api.php", requestOptions)
                    .then(response => response.json())
                    .then(setTimeout(3000)).then(window.location.replace("<?php echo $_SERVER['PHP_SELF'] ?>" + "?books-menu-ct="))
            })

            const addBooktoDb = (insert = 1) => {
                console.log(1242)
                const addBookForm = document.querySelector(".modal.card.visible")
                const bookTitle = addBookForm.querySelector("#book-title")
                const bookImg = addBookForm.querySelector("#book-image-url")
                const bookISB = addBookForm.querySelector("#book-isbn")
                const bookAuth = addBookForm.querySelector("#book-author")
                const bookCat = addBookForm.querySelector("#book-categories")
                const bookPrice = addBookForm.querySelector("#book-price")
                const bookYr = addBookForm.querySelector("#book-year")
                const bookDec = addBookForm.querySelector("#book-description")
                const bookIDCoded = addBookForm.querySelector("#movie-id-holder").value

                console.log(bookIDCoded)
                let insertTxt = `(title, ISBN, Picture, Author,Status, year, Categories, Price, Description) VALUES ('${bookTitle.value}', '${bookISB.value}', '${bookImg.value}', '${bookAuth.value}', '1', '${bookYr.value}', '${bookCat.value}','${bookPrice.value}',  '${bookDec.value}')`
                let updateTxt = `title = '${bookTitle.value}', ISBN = '${bookISB.value}', Picture = '${bookImg.value}', Author = '${bookAuth.value}', year = '${bookYr.value}', Categories = '${bookCat.value}', Price = '${bookPrice.value}', Description = '${bookDec.value}'`;
                //setup update
                var formdata = new FormData();
                if (bookIDCoded == 0) {
                    bookID = "null"
                    formdata.append("insert", insertTxt);
                } else if (bookIDCoded != 0) {
                    formdata.append("set", updateTxt);

                    formdata.append("where", `id=${bookIDCoded}`);

                }
                formdata.append("type", "books");
                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };
                fetch("./api/db_api.php", requestOptions)
                    .then(response => response.json()).then(setTimeout(3000)).then(window.location.replace("<?php echo $_SERVER['PHP_SELF'] ?>" + "?books-menu-ct="))

            }
            addMovieToDb.addEventListener("click", addBooktoDb)

            document.getElementById("update-admin").addEventListener("click", () => {
                let new_name = "name1";
                let new_pass = "1234";
                if (document.getElementById("update-username").value) {
                    new_name = document.getElementById("update-username").value
                }

                if (document.getElementById("update-password").value) {
                    new_pass = document.getElementById("update-password").value
                }
                var formdata = new FormData();
                formdata.append("set", `name = '${new_name}', pass= '${new_pass}'`);
                formdata.append("type", "admins");
                formdata.append("where", "id=1");

                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };

                fetch("./api/db_api.php", requestOptions)
                    .then(response => response.text())
                    .then(alert("Details updated!"))


            })


        </script>

</body>

</html>