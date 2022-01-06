

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
    <div style="display: flex;height: 600px;">
        <?php include './catoegryAdmin.php' ?>
        <div class="right">
            <div style="background-color: chartreuse;height: 100px;">
                <div style="margin-left: 20px;"><a href="https://www.facebook.com/minh.lua.5682/" style="display: inline-block;;text-decoration: none;margin-top: 10px;"><i class="fab fa-facebook-messenger"></i> Liên Hệ</a></div>
            </div>
            <div class="signin">
                <span>Đăng Nhập</span>
                <form action="../controler/admin/signin.php" method="post" enctype= "multipart/form-data">
                    <input type="text" name="username" placeholder="Tên tài khoản">
                    <input type="password" name="password" placeholder="Mật Khẩu">
                    <input type="submit" name="signin" value="Đăng Nhập">
                </form>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
</body>
</html>