<?php
if(isset($_COOKIE["admin_id"])){
    setcookie("admin_id", "", time() - 3600, "/");
   // session_destroy();
    
}
echo "<script>window.location = '/';</script>";
