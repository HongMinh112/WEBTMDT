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
include '../../WEBTMDT/config.php';

$catogery=mysqli_query($conn,"SELECT * FROM catogery");
$result=mysqli_fetch_all(($catogery),MYSQLI_ASSOC);
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
            <?php include '../admin/login.php'; ?>
            <div style="margin-top: 20px;margin-left: 20px;border: 1px solid black;width: 110px;border-radius: 10px;">
                <a style="text-decoration: none;color: black;" href="../admin/addcatogery.php">Thêm Danh Mục</a>
            </div>
            <div class="catogery_manenger" >
                <span style="display: inline-block;margin-top: 10px;font-weight: bold;font-size: 20px;">Quản lí danh mục</span>
                <table style="text-align: center;">
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Hinh Anh</th>
                        <th>Trạng Thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    $stt=1;
                    foreach($result as $key => $value){ ?>
                    <tr>
                        <td><?php echo $stt++ ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td>
                            <img src="../Content/Img/<?php echo $value['image'] ?>" alt="" width="50px" height="50px">
                        </td>
                        <td><?php echo ($value['status']==0)?'Ẩn':'Hiện' ?></td>
                        <td>
                            <a href="../Admin/editcatogery.php?ID=<?php echo $value['ID'] ?>">Sửa</a>
                                <br>
                                    <?php
                                    if ($value['status']) { ?>
                                        <form action="../controler/admin/catogery.php" method="post">
                                            <input type="text" name="id" hidden value="<?= $value['ID'] ?>" style="display: none;">
                                            <input type="submit" value="Khóa" name="block">
                                        </form>
                                    <?php } else { ?>
                                        <form action="../controler/admin/catogery.php" method="post">
                                            <input type="text" name="id" hidden value="<?= $value['ID'] ?>" style="display: none;">
                                            <input type="submit" value="Mở" name="active">
                                        </form>
                                    <?php } ?>
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