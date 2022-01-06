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
    <?php include '../../Views/homePage/header.php'; 

    include '../../config.php';
    if(isset($_SESSION['member'])){
        $member=$_SESSION['member'];
        
    }
    else{
        echo "
            <script type=\"text/javascript\">
                alert('Bạn chưa đăng nhập ');
                location.href = '../../Views/homePage/member.php';
            </script>
            "
            ;
            exit;
    }
    $query=mysqli_query($conn,"SELECT * FROM account WHERE username='$member'");
    $membername=mysqli_fetch_assoc($query);
    $accountID=$membername['ID'];
    $isset=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM informationaccount WHERE accountID='$accountID'"));
    ?>
    <div style="display: flex; margin-bottom: 20px;margin-left:400px;">
        <form action="../../controler/homePage/informationMember.php" method="post">
                <input type="hidden" name="action" value="update">
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
                    <button name="update" style="margin-left:60px;">Cập Nhật</button>
            </div>   
        </form>
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