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


$account=mysqli_fetch_all((mysqli_query($conn,"SELECT oder.*,informationaccount.fullname AS 'fullname' FROM oder JOIN informationaccount 
ON oder.accountID=informationaccount.accountID")),MYSQLI_ASSOC);

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
            <div class="catogery_manenger" >
                <span style="display: inline-block;margin-top: 10px;font-weight: bold;font-size: 20px;">Quản lí đơn hàng</span>
                <table style="width: 700px;" class="list">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ma Don Hang</th>
                                <th>Ten Khach Hang</th>
                                <th>Ngay Dat</th>
                                <th>Tong Tien</th>
                                <th>Trang Thai</th>
                                <th>Hinh Thuc Thanh Toan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;
                            foreach ($account as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $stt++ ?></td>
                                    <td><?php echo $value['ID'] ?></td>
                                    <td><?php echo $value['fullname'] ?></td>
                                    <td><?php echo $value['createdDate'] ?></td>
                                    <td><?php echo number_format($value['total']) ?> VND</td>
                                    <td><?php if ($value['status'] == 'Processing') { ?>
                                            <span>Đang xác nhận</span>
                                        <?php } else if ($value['status'] == 'Processed') { ?>
                                            <span>Đã xác nhận</span>
                                        <?php }
                                        if ($value['status'] == 'Delivering') { ?>
                                            <span>Đang Giao Hàng</span>
                                        <?php } else if ($value['status'] == 'Completed') { ?>
                                            <span>Đã Giao Hàng</span>
                                        <?php } else if($value['status']=='Cancel'){?>
                                            <span>Đã hủy</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($value['payments']=='receiveandpay') {?>
                                            <span>Thanh toan tai nha</span>
                                        <?php } else{ ?>
                                            <span>Thanh Toan Online</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button class="typesubmit"><a style="color: black;" href="../admin/oder_detail.php?ID=<?php echo $value['ID'] ?>">Xem Chi Tiet</a></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
</body>
</html>