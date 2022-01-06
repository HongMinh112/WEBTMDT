 
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
            </div>
                <div style="display:flex;">
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
                    <div style="background-color: white; margin-top:50px;margin-left:44px;">
                        <h1>Thông Tin Đơn Hàng</h1>
                        <table style="width: 900px;text-align: center;" class="list">
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
                                        <td><img src="../../Content/Img/<?php echo $value['image'] ?>" alt="" width="100px" height="100px"></td>
                                        <td><?php echo number_format($value['quantity'] * $value['price']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div>
                            <?php if($oder['status']=='Processing' || $oder['status']=='Processed') {?>
                                <button style="margin: 10px 0;">
                                    <a style="text-decoration: none;" href="../../Views/homePage/cancel_oder.php?orderID=<?php echo $oder['ID'] ?>">Hủy đơn hàng</a>
                                </button>
                                
                            <?php } else if($oder['status']=='Cancel'){?>
                                <span>Đơn hàng đã hủy</span>
                            <?php } else if($oder['status']=='Delivering'){?>
                                <span>Đơn hàng đang được gia đến bạn</span>
                            <?php } else {?>
                                <span>Đơn hàng đã giao thành công</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
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