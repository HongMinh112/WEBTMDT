<?php 
session_start();
include '../../config.php';
if(isset($_GET['ID'])){
    $ID=$_GET['ID'];
}
unset($_SESSION['cart'][$_GET['ID']]);
echo "
            <script type=\"text/javascript\">
                alert('Xóa sản phẩm thành công');
                location.href = '../../Views/homePage/cart.php';
            </script>
            "
            ;
?>