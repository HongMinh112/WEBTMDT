
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
        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
        //var_dump($cart);die();
    ?>
    <div style="background-color: rgb(228, 228, 228);">
        <div style="margin-left:500px;font-weight:bold;font-size:25px;margin-top: 30px;display:inline-block;">
            <span>Thông Tin Giỏ Hàng</span>
        </div>
        <?php
        if(!isset($cart)) {
            echo "
            <script type=\"text/javascript\">
                alert('Không có sản phẩm trong giỏ hàng');
                location.href = '../../Views/homePage/product.php';
            </script>
            "
            ;
            exit;
        } else { ?>
            <div>
                <table style="text-align: center;margin-left:100px;margin-top:50px;margin-bottom:30px;display:inline-block;">
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Giá Bán</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th>Xóa</th>
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
                            <form action="../../controler/homePage/addcart.php">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="ID" value="<?php echo $value['ID'] ?>">
                                <input style="width: 50px;" type="number" name="quantity" value="<?php echo $value['quantity'] ?>">
                                <br>
                                <button style="border-radius: 10px;margin-top:10px;" type="submit">Cập nhật</button>
                            </form>
                        </td>
                        <td><?php echo number_format($value['price']*$value['quantity']) ?></td>
                        <td>
                            <button><a style="text-decoration: none;" href="../../controler/homePage/delete.php?ID=<?php echo $value['ID'] ?>">Xóa</a></button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <?php $total = 0;
            foreach ($cart as $key => $item) {
                $total += intval($item['price']) * $item['quantity'];
            }
        ?>
        <div style="margin-bottom: 10px;">
            <span>Tổng tiền: <?php echo number_format($total)  ?> VND</span>
        </div>
        <div ><a  href="../../Views/homePage/oder.php"><button style="margin-bottom: 10px;">Đặt Hàng</button></a></div>
        
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