<?php
if(isset($_COOKIE["usr_id"])){
    setcookie("usr_id", "", time() - 3600, "/");
   // session_destroy();
    
}
echo "<script>window.location = '/';</script>";
