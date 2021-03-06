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
                <span>Gi?? s???n ph???m: <del style="color: red;"><?php echo number_format($product['price'])  ?> VN??</del></span>
                <br>
                <br>
                <span>Gi?? khuy???n m??i: <span><?php echo number_format($product['price']-($product['price']*$product['sale'])/100) ?> VN??</span></span>
                <br>
                <br>
                <div>
                    <span>S??? L?????ng: </span>
                    <?php echo (($product['quantity']<=0)?'H???t h??ng': $product['quantity'])?>
                </div>
                <br>
                <span>
                    M?? t??? :
                    
                    <div style="color: blue;">
                        <?php echo  $product['description'] ?>
                    </div>
                </span>
                <br>
                <form action="../../controler/homePage/addcart.php" method="get">
                    <input style="width: 50px;" type="number" name="quantity" min="1" >
                    <input type="hidden" name="ID" value="<?php echo $product['ID'] ?>">
                    <button><i class="fas fa-cart-arrow-down"></i> Th??m gi??? h??ng</button>
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
                <span>Th??ng Tin C???a H??ng</span>
                <div>
                    <p>?????a ch???:  ???p 10, X?? Kh??nh An, Huy???n U Minh, T???nh C?? Mau</p>
                    <p>??i???n tho???i: 0915231061</p>
                    <p>Email: minhbakaluffy114@gmail.com</p>
                    <p>Th???i Gian L??m Vi???c: T??? 8h s??ng ?????n 10h ????m</p>
                </div>
            </div>
            <div class="footer_block">
                <span>V??? Ch??ng T??i</span>
                <div>
                    <a href="#">- Gi???i Thi???u</a>
                    <br>
                    <a href="#">- Li??n H???</a>
                    <br>
                    <a href="#">- Ch??nh S??ch B???o M???t</a>
                    <br>
                    <a href="#">- Ch??nh S??ch V???n Chuy???n</a>
                </div>
            </div>
            <div class="footer_block">
                <span>Th??ng Tin H??? Tr???</span>
                <div>
                    <a href="#">- Li??n H???</a>
                </div>
            </div>
            <div class="footer_block">
                <span>K???t N???i V???i Ch??ng T??i</span>
                <div>
                    <a href="https://www.facebook.com/minh.lua.5682/"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            ?? Copyright ?? 2019 <b>A N I M E</b> Store .
        </div>
    </footer>
    <script src="../../Content/JavaScrip/jquery-3.6.0.min.js"></script>
    <script src="../../Content/JavaScrip/style.js"></script>
    
</body>
</html>