<?php
include '../../config.php';
$catogery="SELECT * FROM catogery";
$query=mysqli_query($conn,$catogery);
$row=mysqli_fetch_all(($query),MYSQLI_ASSOC);
if($_GET['ID']){
    $ID=$_GET['ID'];
    $product=mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM product WHERE status=1 AND ID='$ID'"));
   $catogeryID=$product['catogeryID'];
   $catogery=mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM catogery WHERE ID='$catogeryID'"));
    //var_dump($catogery);die();
}
?>

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
    <div style="background-color: rgb(228, 228, 228);z-index: 100;">
    <div>
        <img src="../../Content/Img/posteronepiece.png" alt="" width="100%" height="450px">
    </div>
        <div class="category" style="margin-top: 0;">
            <?php foreach($row as $key => $value)   { ?>
                <div class="category_a">
                    <a href="../../Views/homePage/catogery.php?ID=<?php echo $value['ID'] ?>"><img src="../../Content/Img/<?php echo $value['image'] ?>" alt="" width="80px" height="100%">
                        <br>
                        <span ><?php echo $value['name'] ?></span>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="product" style="display: flex;">
            <div style="margin:20px 20px">
                <img src="../../Content/Img/<?php echo $product['image'] ?>" alt="" width="300px" height="400px">
            </div>
            <div style="margin:20px 20px;font-size:23px">
                <span style="margin: 13px 0;font-size:25px;font-weight:bold;"><?php echo $product['name'] ?></span>
                <br>
                <br>
                <span style="margin: 13px 0;">Danh Muc: <span><?php echo $catogery['name'] ?></span></span>
                <br>
                <br>
                <span>Giá sản phẩm: <del style="color: red;"><?php echo number_format($product['price'])  ?> VNĐ</del></span>
                <br>
                <br>
                <span>Giá khuyến mãi: <span><?php echo number_format($product['price']-($product['price']*$product['sale'])/100) ?> VNĐ</span></span>
                <br>
                <br>
                <div>
                    <span>Số Lượng: </span>
                    <?php echo (($product['quantity']<=0)?'Hết hàng': $product['quantity'])?>
                </div>
                <br>
                <span>
                    Mô tả :
                    
                    <div style="color: blue;">
                        <?php echo  $product['description'] ?>
                    </div>
                </span>
                <br>
                <form action="../../controler/homePage/addcart.php" method="get">
                    <input style="width: 50px;" type="number" name="quantity" min="1" >
                    <input type="hidden" name="ID" value="<?php echo $product['ID'] ?>">
                    <button><i class="fas fa-cart-arrow-down"></i> Thêm giỏ hàng</button>
                </form>
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
    <script src="../../Content/JavaScrip/jquery-3.6.0.min.js"></script>
    <script src="../../Content/JavaScrip/style.js"></script>
    
</body>
</html>