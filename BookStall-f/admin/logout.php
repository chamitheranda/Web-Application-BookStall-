<?php
if(isset($_COOKIE["admin-id"])){
    setcookie("admin_id", "", time() - 3600, "/admin");
    session_destroy();
    
}
echo "<script>window.location = './signin.php';</script>";
