<?php
include '../../config.php';
if (isset($_POST['block'])) {
    $query = "UPDATE product SET status = 0 where id = ".$_POST['id']." ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "
        <script type=\"text/javascript\">
        alert('Khóa sản phẩm thành công!');
        history.back();
        </script>
        "
    ;
    exit;
    } else {
        echo "
        <script type=\"text/javascript\">
        alert('Khóa sản phẩm thất bại!');
        history.back();
        </script>
        "
    ;
    exit;
    }
    } else if (isset($_POST['active'])) {
        $query = "UPDATE product SET status = 1 where id = ".$_POST['id']." ";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<script type="text/javascript">alert("Kích hoạt sản phẩm thành công!");
            history.back();
            </script>';
        } else {
            echo '<script type="text/javascript">alert("Kích hoạt sản phẩm thất bại!");
            history.back();</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Có lỗi xảy ra!");</script>';
        die();
}
?>