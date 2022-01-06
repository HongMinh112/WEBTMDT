
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Icoin/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../Content/Css/style.css">
    <title>Home</title>
</head>
<body>
    <?php include '../../Views/homePage/header.php'; ?>
    <?php
    include '../../config.php';
    if(isset($_SESSION['member'])){
        $member=$_SESSION['member'];
        $detailmember=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM account WHERE username='$member'"));
        $IDaccount=$detailmember['ID'];
        $account=mysqli_fetch_all((mysqli_query($conn,"SELECT * FROM oder WHERE accountID='$IDaccount'")),MYSQLI_ASSOC);
        //var_dump($IDaccount);die();
    }
    else{
        echo "
            <script type=\"text/javascript\">
                alert('Bạn chưa đăng nhập nên không xem được đơn hàng');
                location.href = '../../Views/homePage/member.php';
            </script>
            "
            ;
            exit;
    }
        

    ?>
        <div style="background-color: rgb(228, 228, 228);">
            <div style="margin-left:500px;font-weight:bold;font-size:25px;margin-top: 30px;display:inline-block;">
                <span>Thông Tin Đơn Hàng</span>
            </div>
            <div style="margin-left: 10px;">
            <form action="#" method="post">
                <select name="odertype" id="">
                    <option value="Processing">Đang xác nhận</option>
                    <option value="Processed">Đã xác nhận</option>
                    <option value="Delivering">Đang giao hàng</option>
                    <option value="Completed">Đã giao hàng</option>
                    <option value="Cancel">Đã hủy</option>
                </select>
                <input type="submit" name="search" value="Tim Kiem">
            </form>
            <?php
            if(isset($_POST['search'])){
                    $find=$_POST['odertype'];
                    $result=mysqli_fetch_all((mysqli_query($conn,"SELECT * FROM oder WHERE status='$find'")),MYSQLI_ASSOC);
                
                if($result){?>
                    </div>
                        <div style="display:flex;">
                            <table style="width: 700px;" class="list">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ma Don Hang</th>
                                        <th>Ngay Dat</th>
                                        <th>Tong Tien</th>
                                        <th>Trang Thai</th>
                                        <th>Hinh Thuc Thanh Toan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1;
                                    foreach ($result as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $stt++ ?></td>
                                            <td><?php echo $value['ID'] ?></td>
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
                                                <button class="typesubmit"><a style="color: black;text-decoration: none;" href="../../Views/homePage/oder_detail.php?ID=<?php echo $value['ID'] ?>">Xem Chi Tiet</a></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                <?php } else{?>
                    Đơn hàng loại này trống
                <?php } ?>
            <?php } else{?>
                <div style="display:flex;">
                            <table style="width: 700px;" class="list">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ma Don Hang</th>
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
                                                <button class="typesubmit"><a style="color: black;text-decoration: none;" href="../../Views/homePage/oder_detail.php?ID=<?php echo $value['ID'] ?>">Xem Chi Tiet</a></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
            <?php } ?>
            
        </div>
    
    <footer class="footer">
        <div style="margin-left: 550px;">
            <div class="header_bottom-logo">
                <div>
                    <span style="font-weight: bold; margin-top: 18px;margin-left: 11px;">A N I M E</span>
                    <br>
                    <span style="margin-left: 40px;">Store</span>
                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="footer_block">
                <span>Thông Tin Cửa Hàng</span>
                <div>
                    <p>Địa chỉ:  Ấp 10, Xã Khánh An, Huyện U Minh, Tỉnh Cà Mau</p>
                    <p>Điện thoại: 0915231061</p>
                    <p>Email: minhbakaluffy114@gmail.com</p>
                    <p>Thời Gian Làm Việc: Từ 8h sáng đến 10h đêm</p>
                </div>
            </div>
            <div class="footer_block">
                <span>Về Chúng Tôi</span>
                <div>
                    <a href="#">- Giới Thiệu</a>
                    <br>
                    <a href="#">- Liên Hệ</a>
                    <br>
                    <a href="#">- Chính Sách Bảo Mật</a>
                    <br>
                    <a href="#">- Chính Sách Vận Chuyển</a>
                </div>
            </div>
            <div class="footer_block">
                <span>Thông Tin Hỗ Trợ</span>
                <div>
                    <a href="#">- Liên Hệ</a>
                </div>
            </div>
            <div class="footer_block">
                <span>Kết Nối Với Chúng Tôi</span>
                <div>
                    <a href="https://www.facebook.com/minh.lua.5682/"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            © Copyright © 2019 <b>A N I M E</b> Store .
        </div>
    </footer>
</body>
</html>