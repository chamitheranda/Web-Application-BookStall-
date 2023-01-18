
<?php
function fetchData($adminID, $search, $dbname)
{
    $sql = "SELECT * FROM $dbname";
    if ($search == "*") {
        $sql = "SELECT * FROM $dbname";
    } elseif ($search != "*" && $dbname == "user") {
        $sql = "SELECT * FROM $dbname where id like '%$search%' OR name like '%$search%' OR  mail like '%$search%' ";
    } elseif ($search != "*" && $dbname == "categories") {
        $sql = "SELECT * FROM $dbname where name like '%$search%'";
    } elseif ($search != "*" && $dbname == "books") {
        $sql = "SELECT * FROM $dbname where title like '%$search%'";
    }
    if ($_SESSION["_admin_id"] == $adminID) {
        include "./db.php";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $amount = 0;
                if ($dbname == "user") {
                    //-----------------------------
                    $txt1 = "select transactions.user, payments.amount from payments inner join transactions on transactions.id=payments.transactions where transactions.user=" . $row["id"];;
                    $amountRes = $conn->query($txt1);
                    if ($amountRes->num_rows > 0) {
                        while ($row1 = $amountRes->fetch_assoc()) {
                            $amount += $row1["amount"];
                        };
                    }

                    $lokk = "";
                    if ($row["status"] == 0) {
                        $lokk = "Deactivated";
                    } elseif ($row["status"] == 1) {
                        $lokk = "Active";
                    }
                    echo '<div class="grid-item">' . $row["id"] . '</div>';
                    echo  '<div class="grid-item"> ' . $row["name"] .  '</div> ';
                    echo  '<div class="grid-item"> ' . $row["mail"] .  '</div> ';
                    echo  '<div class="grid-item"> ' . $row["address"] .  '</div> ';
                    echo  '<div class="grid-item"> ' . $row["phone"] .  '</div> ';
                    echo  '<div class="grid-item"><span class="status delivered" id="delevered-status-' . $row["id"] . '">' . $lokk . '</span></div>';
                    echo  '<div class="grid-item"  id="payment-' . $row["id"] . '">' . $amount . '</div>';
                    echo  '<div class="grid-item"><span class="status pending action-btn" style=" cursor: pointer; " id="view-transactions-btn" name="'.$row["id"] . '" >View all</span></div>';
                    echo  '<div class="grid-item"><span class="status return action-btn pointer editbtn" style=" cursor: pointer;" id="' . $row["id"] . '">Change</span></div>';
                    echo "<script>console.log(" . "'" . $lokk . "'" . ")</script>";
                } elseif ($dbname == "categories") {
                    $lokk = "";
                    if ($row["status"] == 0) {
                        $lokk = "Deactivated";
                    } elseif ($row["status"] == 1) {
                        $lokk = "Active";
                    }
                    echo  ' <div class="grid-item">' . $row["id"] . '</div>';
                    echo  ' <div class="grid-item">' . $row["name"] . '</div>';
                    echo  ' <div class="grid-item"><span class="status delivered " id="delevered-status-'.$row["id"].'">' . $lokk . '</span></div>';
                    echo  ' <div class="grid-item"><span class="status pending action-btn point-the-cats" style=" cursor: pointer; " id="'. $row["id"].'">View all</span></div>';
                    echo  ' <div class="grid-item"><span class="status return action-btn pointer" style=" cursor: pointer;" id="' . $row["id"] . '">Change</span></div>';
                } elseif ($dbname == "books") {
                    echo  '<div class="grid-item">' . $row["ISBN"] . '</div>';
                    echo  '<div class="grid-item">' . $row["title"] . '</div>';
                    echo  '<div class="grid-item">' . $row["Picture"] . '</div>';
                    echo  '<div class="grid-item">' . $row["Author"] . '</div>';
                    echo  '<div class="grid-item"><span class="status delivered">Active</span></div>';
                    echo  '<div class="grid-item"><span class="status delivered">View</span></div>';
                    echo  '<div class="grid-item" id="how-many-time-purchased" name="'.$row["id"].'">' . "-" . '</div>';
                    echo  '<div class="grid-item">' . $row["Categories"] . '</div>';
                    echo  '<div class="grid-item">' . $row["Price"] . '</div>';
                    echo  '<div class="grid-item">' . $row["Description"] . '</div>';
                    echo  ' <div class="grid-item">' . $row["year"] . '</div>';
                    echo '<input type="hidden" value="' . $row["id"] . '" name="bookId" id="edit-book-id">';
                    echo  '<div class="grid-item"><span class="status return action-btn pointer editbtn" style=" cursor: pointer;" id="' . $row["id"] . '">Change</span></div>';
                }
            }
        } else {
            echo '<h1 style="width: 100%;position: absolute;bottom: -5rem;">No results for this search query.</h1>';
        }
    }
}
?>