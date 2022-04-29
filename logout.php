
<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
unset($_SESSION["user_email"]);
unset($_SESSION['user_image']);  
unset($_SESSION['user_token']);  
unset($_SESSION['user_status']);
unset($_SESSION['user_control']);

header("Location:login.php");
?>



