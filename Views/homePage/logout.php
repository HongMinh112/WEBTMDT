<?php
session_start();
session_unset();
session_destroy();
$_SESSION['username']=null;
header("location:../../../../../WEBTMDT/Views/homePage/index.php")
?>