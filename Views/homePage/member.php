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
    <div style="background-color: rgb(228, 228, 228);display: flex; margin-bottom: 20px;">
        <div class="form_member">
            <span>Đăng Nhập</span>
            <form action="../../controler/admin/signin.php" method="post">
                <input style="padding-left:20px;margin-left:20px;" type="text" name="username" placeholder="Tên đăng nhập...">
                <br>
                <input style="padding-left:20px;margin-left:20px;" type="password" name="password" placeholder="Mật Khẩu...">
                <div>
                    <input type="submit" name="signin" value="Đăng Nhập">
                </div>
            </form>
        </div>
        <div class="form_member">
            <span>Đăng Ký</span>
            <form action="../../controler/admin/signup.php" method="post" >
                <input style="padding-left:20px;margin-left:20px;" type="text" name="username" placeholder="Tên đăng nhập..."><br>
                <input style="padding-left:20px;margin-left:20px;" type="email" name="email" placeholder="Email..."><br>
                <input style="padding-left:20px;margin-left:20px;" type="password" name="password" placeholder="Mật Khẩu..."><br>
                <input style="padding-left:20px;margin-left:20px;" type="password" name="retype" placeholder="Nhập Lại Mật Khẩu">
                <div>
                    <input type="submit" name="signup" value="Đăng Ký">
                </div>
            </form>
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