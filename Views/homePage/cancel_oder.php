<?php
include '../../config.php';
if (isset($_GET['orderID'])) {
    $query = "UPDATE oder SET status = 'Cancel' WHERE ID = '".$_GET['orderID']."'";
    $mysqli_result = mysqli_query($conn, $query);
    if ($mysqli_result) {
        echo '<script type="text/javascript">alert("Thành công!"); 
        location.href="../../Views/homePage/informationOder.php";</script>';
    } else {
        echo '<script type="text/javascript">alert("Thất bại!"); history.back();</script>';
    }
}