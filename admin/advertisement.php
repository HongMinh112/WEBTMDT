<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo "
            <script type=\"text/javascript\">
            alert('Bạn chưa đăng nhập');
            location.href = '../Views/homePage/index.php';
            </script>
            "
        ;
        exit;

}
include '../config.php';
$image=mysqli_fetch_all((mysqli_query($conn,"SELECT * FROM advertisement")),MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Content/Css/styleadmin.css">
    <link rel="stylesheet" href="../Icoin/fontawesome-free/css/all.min.css">
    <title>ADMIN</title>
</head>
<body>
    <div style="display: flex;height: 100%;">
    <?php include '../../WEBTMDT/admin/catoegryAdmin.php'; ?>
        <div class="right">
            <?php include '../admin/login.php' ?>
            <div style="margin-top: 20px;margin-left: 20px;border: 1px solid black;width: 110px;border-radius: 10px;">
                <a style="text-decoration: none;color: black;" href="./addadvertisement.php">Thêm Hình Ảnh</a>
            </div>
            <div class="catogery_manenger" >
                <span style="display: inline-block;margin-top: 10px;font-weight: bold;font-size: 20px;">Quản lí hình ảnh quảng cáo</span>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Hình Ảnh</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                    $stt=1;
                    foreach($image as $key => $value){ ?>
                    <tr>
                        <td><?php echo $stt++ ?></td>
                        <td>
                            <img src="../Content/Img/<?php echo $value['image'] ?>" alt="" width="240px" height="100px">
                        </td>
                        <td>
                            <form action="../controler/admin/advertisement.php">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="ID" value="<?php echo $value['ID'] ?>">
                                <input type="submit" name="delete" value="Xóa">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
</body>
</html>