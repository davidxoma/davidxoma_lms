<?php
    include("../functions/class/AllUserClass.php");
    $login = new AUTH;
    $check_user_login = $login->Check_Auth($_POST["email"], $_POST["password"]);
   
?>