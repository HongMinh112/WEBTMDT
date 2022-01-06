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
if (isset($_GET['ID'])) {
    $IDoder = $_GET['ID'];
    $queryOder = mysqli_query($conn, "SELECT * FROM oder WHERE ID=$IDoder");
    $oder = mysqli_fetch_assoc($queryOder);

    $accountID = $oder['accountID'];
    $queryMember = mysqli_query($conn, "SELECT * FROM informationaccount WHERE accountID=$accountID");
    $account = mysqli_fetch_assoc($queryMember);

    $productOder = mysqli_query($conn, "SELECT * FROM productoder WHERE oderID=$IDoder");
    $product = mysqli_fetch_all(($productOder), MYSQLI_ASSOC);
}

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
            <div style="background-color: white; margin-top:50px;">
                <h1>Thông Tin Khách Hàng</h1>
                <div class="container">
                    <div>
                        <span style="color: red;">Tên Khách Hàng: <?php echo $account['fullname'] ?></span>
                    </div>
                    <div>
                        <span style="color: red;">Số điện thoại: <?php echo $account['phonenumber'] ?></span>
                    </div>
                    <div>
                        <span style="color: red;">Địa chỉ giao hàng: <?php echo $account['address'] ?></span>
                    </div>
                    <div>
                        <span style="color: red;">Tổng tiền: <?php echo number_format($oder['total'])  ?> VND</span>
                    </div>
                    <div>
                        <span style="color: red;">Ngày đặt hàng: <?php echo $oder['createdDate'] ?></span>
                    </div>
                </div>
            </div>
            <div style="background-color: white; margin-top:50px;">
                <h1>Thông Tin Đơn Hàng</h1>
                <table style="width: 900px;" class="list">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá Bán</th>
                            <th>Hình Ảnh</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 1;
                        foreach ($product as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $stt++ ?></td>
                                <td><?php echo $IDoder ?></td>
                                <td><?php echo $value['productID'] ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['quantity'] ?></td>
                                <td><?php echo $value['price'] ?></td>
                                <td><img src="../Content/Img/<?php echo $value['image'] ?>" alt="" width="100px" height="100px"></td>
                                <td><?php echo number_format($value['quantity'] * $value['price']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if ($oder['status'] == 'Processing') { ?>
                    <a style="text-decoration: none;" href="../admin/processed_oder.php?orderID=<?php echo $_GET['ID'] ?>">Xác nhận đơn hàng</a>
                <?php }
                if ($oder['status'] == 'Processed') { ?>
                    <a style="text-decoration: none;" href="../admin/delivering_order.php?orderID=<?php echo $_GET['ID'] ?>">Giao hàng</a>
                <?php } 
                if ($oder['status'] == 'Delivering') { ?>
                    <a style="text-decoration: none;" href="../admin/completed_oder.php?orderID=<?php echo $_GET['ID'] ?>">Đã giao hàng</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
</body>
</html>