
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
        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
        $member=$_SESSION['member'];
        $query=mysqli_query($conn,"SELECT * FROM account WHERE username='$member'");
        $membername=mysqli_fetch_assoc($query);
        $accountID=$membername['ID'];
        $isset=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM informationaccount WHERE accountID='$accountID'"));
    ?>
    <form action="../../controler/homePage/oder.php" method="post">
        <div style="background-color: rgb(228, 228, 228);">
            <div style="margin-left:500px;font-weight:bold;font-size:25px;margin-top: 30px;display:inline-block;">
                <span>Thông Tin Giỏ Hàng</span>
            </div>
            <?php
            if(!isset($member)) {
                echo "
                <script type=\"text/javascript\">
                    alert('Bạn chưa đăng nhập');
                    location.href = '../../Views/homePage/product.php';
                </script>
                "
                ;
                exit;
            } else { ?>
                <div style="display:flex;">
                    <table style="text-align: center;margin-left:10px;margin-top:50px;margin-bottom:30px;display:inline-block;width:700px;">
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá Bán</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                        </tr>
                        <?php 
                        $STT=1;
                        foreach($cart as $key => $value){?>
                        <tr>
                            <td><?php echo $STT++ ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><img src="../../Content/Img/<?php echo $value['image'] ?>" alt="" width="120px" height="100px"></td>
                            <td><?php echo number_format($value['price'])  ?></td>
                            <td>
                                <?php echo $value['quantity'] ?>
                            </td>
                            <td><?php echo number_format($value['price']*$value['quantity']) ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php if(isset($_SESSION['member'])){ ?>

                    <?php } ?>
                        <div style="width:300px;height:200px;margin-left:30px;border:1px solid black;border-radius:10px;margin-top:30px;">
                            <div><span>Thông Tin Khách Hàng</span></div>
                            <div style="margin: 10px 10px;">
                                <label for="">Họ Và Tên</label>
                                <input  type="text" name="fullname" placeholder="Ho ten" value="<?php echo (isset($isset['fullname'])?$isset['fullname']:" Họ tên.. ") ?>" style=width:250px;>
                            </div>
                            <div style="margin: 10px 10px;">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="address" placeholder="Địa Chỉ" value="<?php echo (isset($isset['address'])?$isset['address']:"Địa chỉ...") ?>" style=width:250px;>
                            </div>
                            <div style="margin: 10px 10px;">
                                <label for="">Số điện thoại</label>
                                <input type="number" name="phonenumber" placeholder="Số điện thoại" value="<?php echo (isset($isset['phonenumber'])?$isset['phonenumber']:"Số điện thoại...") ?>" style=width:250px;>
                            </div>
                        </div>   
                    <div style="margin-top: 30px;margin-left:30px">
                        <span>Loại thanh toán</span>
                        <select name="payments" id="">
                            <option  value="receiveandpay">Thanh toán tại nhà</option>
                            <option  value="onlinepayment">Thanh Toán online</option>
                        </select>
                    </div>
                     
                </div>
            <?php } ?>
            <?php $total = 0;
                foreach ($cart as $key => $item) {
                    $total += intval($item['price']) * $item['quantity'];
                }
            ?>
            <div style="margin-bottom: 10px;">
            <input type="hidden" name="total" value="<?php echo $total  ?>">
                <span >Tổng tiền: <?php echo number_format($total)  ?> VND</span>
            </div>
            <div ><button name="action" value="oder" style="margin-bottom: 10px;">Đặt Hàng</button></div>
            
        </div>
    </form>
    
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