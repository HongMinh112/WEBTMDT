<?php
session_start();
if(!isset($_SESSION['member'])){
    header("loaction:../../../../../WEBTMDT/Views/homePage/index.php");
}
else{
        if(isset($_SESSION['permission'])=="admin"){
            header("location:../../../../../WEBTMDT/admin/news.php");
        }
        else{
            header("loaction:../../../../../WEBTMDT/Views/homePage/index.php");
        }
}

?>
<header class="header">
        <div class="header_top">
            <div class="header_left">
                <div style="margin-top: 10px;"><a href="../../Views/homePage/index.php"><i class="fas fa-home"></i> Trang Chủ</a></div>
                <div style="margin-top: 10px;"><a href="../../Views/homePage/introduce.php"><i class="fas fa-trophy"></i> Giới Thiệu</a></div>
                <div style="margin-top: 10px;"><a href="../../Views/homePage/contact.php"><i class="fas fa-comments"></i> Góp Ý</a></div>
                <div style="margin-top: 10px;"><a href="../../Views/homePage/informationOder.php"><i class="fas fa-shopping-cart"></i> Đơn Hàng Của Bạn</a></div>
                <div style="margin-top: 10px;"><a href="../../Views/homePage/informationMember.php"><i class="fas fa-user"></i> Thông tin giao hàng</a></div>
            </div>
                <?php if (isset($_SESSION['member']) && $_SESSION['member']) { ?>
                    <div class="header_right">
                        <div style="margin-top: 10px;"><?= $_SESSION['member'] ?></div>
                        <div style="margin-top: 10px;"><a href="../../Views/homePage/logout.php">Đăng Xuat</a></div>
                    </div>
                    <div style="position: absolute;top:88px;right:30px;color:black;"><a style="color:black;" href="../../Views/homePage/changePassword.php"><i class="fas fa-user-circle"></i> Đổi mật khẩu</a></div>
                    
                <?php } else { ?>
                    <div class="header_right">
                        <div style="margin-top: 10px;"><a href="../../Views/homePage/member.php">Đăng Ký</a></div>
                        <div style="margin-top: 10px;"><a href="../../Views/homePage/member.php">Đăng Nhập</a></div>
                    </div>
                <?php } ?>
            
        </div>
        <div class="header_bottom">
            <div class="header_bottom-logo">
                <div>
                    <span style="font-weight: bold; margin-top: 18px;margin-left: 11px;">A N I M E</span>
                    <br>
                    <span style="margin-left: 40px;">Store</span>
                </div>
            </div>
            <div class="header_bottom-search">
                <form action="../../Views/homePage/search.php" method="get">
                    <input type="text" name="keyword" placeholder="Tìm Kiếm Sản Phẩm...."  
                    style="width: 600px;height: 30px;margin-right: 10px;border-radius: 20px;">
                    <input  type="submit" name="search" value="Tim kiem" style="width: 100px;height: 30px;border-radius: 20px;">
                </form>
            </div>
            <div class="header_bottom-cart"><a href="../../Views/homePage/cart.php"><i class="fas fa-cart-arrow-down"></i></i> Giỏ Hàng</a></div>
            
        </div>
    </header>