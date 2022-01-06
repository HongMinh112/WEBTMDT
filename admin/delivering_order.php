<?php
include '../config.php';
if (isset($_GET['orderID'])) {
    $oderID=$_GET['orderID'];
    $query = "UPDATE oder SET status = 'Delivering' WHERE ID = '".$_GET['orderID']."'";
    $mysqli_result = mysqli_query($conn, $query);
    $oder="SELECT * FROM productoder WHERE oderID='$oderID'";
    $result=mysqli_fetch_all((mysqli_query($conn,$oder)),MYSQLI_ASSOC);
    foreach($result as $key => $value){
        $ID=$value['productID'];
        $product="SELECT * FROM product WHERE ID='$ID'";
        $resultProduct=mysqli_fetch_assoc(mysqli_query($conn,$product));
        $quantity=$resultProduct['quantity']-$value['quantity'];
        
        $upate="UPDATE product SET quantity='$quantity' WHERE ID='$ID'";
        $updateProduct=mysqli_query($conn,$upate);
    }
    if ($mysqli_result) {
        echo '<script type="text/javascript">alert("Thành công!"); history.back();</script>';
    } else {
        echo '<script type="text/javascript">alert("Thất bại!"); history.back();</script>';
    }
}