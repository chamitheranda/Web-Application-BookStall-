<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "bookstall";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$q = null;
$type = null;
$count = null;
$where = null;
$sum = null;
$insert = null;
$update = null;
$set = null;
$where_post = null;
$type_post = null;
$join = null;
$join_sel = null;
$select = null;
$type2 = null;
$post_id = null;
$delete = null;

if (isset($_REQUEST["q"])) {
    $q = $_REQUEST["q"];
}
if (isset($_REQUEST["type"])) {
    $type = $_REQUEST["type"];
}
if (isset($_REQUEST["count"])) {
    $count = $_REQUEST["count"];
}
if (isset($_REQUEST["where"])) {
    $where = $_REQUEST["where"];
}
if (isset($_REQUEST["sum"])) {
    $sum = $_REQUEST["sum"];
}
if (isset($_REQUEST["join"])) {
    $join = $_REQUEST["join"];
}
if (isset($_REQUEST["join_sel"])) {
    $join_sel = $_REQUEST["join_sel"];
}
if (isset($_POST["insert"])) {
    $insert = ($_POST["insert"]);
}
if (isset($_POST["update"])) {
    $update = ($_POST["update"]);
}

if (isset($_POST["set"])) {
    $set = ($_POST["set"]);
}
if (isset($_POST["where"])) {


    $where_post = ($_POST["where"]);
}
if (isset($_POST["type"])) {
    $type_post = $_POST["type"];
}
if (isset($_POST["type2"])) {
    $type2 = $_POST["type2"];
}
if (isset($_POST["select"])) {
    $select = $_POST["select"];
}
if (isset($_POST["id"])) {
    $post_id = $_POST["select"];
}
if (isset($_POST["delete"])) {
    $delete = $_POST["delete"];
}


$sql = "select * from $type";

if ($where) {
    $sql = "select * from $type where $where";
}
if ($count) {
    $sql  = "select count($count) as $type from $type";
}
if ($sum) {
    $sql  = "select sum($sum) as $type from $type";
}
if ($sum && $where) {
    $sql  = "select sum($sum) as $type from $type where $where";
}
if ($insert) {
    $sql  = "insert into $type_post $insert";
}
if ($set) {
    $sql  = "update $type_post set $set where $where_post";
}

if ($join) {
    //ON Orders.CustomerID=Customers.CustomerID
    /*
    SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders INNER JOIN Customers
    ON Orders.CustomerID=Customers.CustomerID where Customers.CustomerID=81;
    */
    $sql = "select * from $type inner join $type2 on $join";
}
if ($join_sel) {
    $sql = "select $join_sel from $type inner join $type2 on $join";
}
if ($join_sel && $where) {
    $sql = "select $join_sel from $type inner join $type2 on $join where $where";
}
if ($delete && $where) {
    //DELETE FROM `books` WHERE `books`.`id` = 19;
    $sql = "delete from $delete where $where";
}

$output = [];

$result;

try {
    $result = $conn->query($sql);
} catch (mysqli_sql_exception $e) {
    http_response_code(404);
    echo json_encode($sql);
    die();
}

if (mysqli_error($conn)) {
    http_response_code(404);

    echo json_encode(null);
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row_a = [];
        foreach (array_keys($row) as $key) {
            $row_a[$key] = $row[$key];
        }
        array_push($output, $row_a);
    }
    echo json_encode($output);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $join) {
    while ($row = $result->fetch_assoc()) {
        $row_a = [];
        foreach (array_keys($row) as $key) {
            $row_a[$key] = $row[$key];
        }
        array_push($output, $row_a);
    }
    echo json_encode($output);
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(404);

    echo json_encode(null);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode($sql);
    echo json_encode($output);
}
