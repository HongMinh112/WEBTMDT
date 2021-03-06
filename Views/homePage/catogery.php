<?php
include '../../config.php';
$catogery="SELECT * FROM catogery";
$query=mysqli_query($conn,$catogery);
$row=mysqli_fetch_all(($query),MYSQLI_ASSOC);
if($_GET['ID']){
    $ID=$_GET['ID'];
    $product=mysqli_fetch_all((mysqli_query($conn,
    "SELECT * FROM product WHERE status=1 AND catogeryID=$ID ORDER BY ID DESC")),MYSQLI_ASSOC);
   
}
$productCato=mysqli_fetch_all((mysqli_query($conn,
"SELECT * FROM catogery WHERE ID=$ID")),MYSQLI_ASSOC);
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
        <div class="product">
            <div class="product_paradigm">
                <?php foreach($productCato as $key => $value){ ?>
                    <div class="product_paradigm-item">
                        <div class="product_paradigm-item--title">
                            <span style="display: inline-block; ;margin-top: 8px;"><?php echo $value['name'] ?></span>
                        </div>
                        <div>
                            <img src="../../Content/Img/<?php echo $value['image'] ?>" alt="" width="300px" height="685px">
                        </div>
                    </div>
                <?php } ?>
                
                <div class="product_paradigm-right">
                    <div class="slidecatogery">
                        <?php foreach($product as $key => $value){ ?>
                            <div class="product_list-item">
                                <a href="../../Views/homePage/product_detail.php?ID=<?php echo $value['ID'] ?>">
                                    <div style="display: flex;">
                                        <img src="../../Content/Img/<?php echo $value['image']?>" alt="" width="100%" height="100%">
                                        <span class="product_list-item--sale">
                                            <span style="font-size: 10px;">Giam</span><br>
                                            <span style="font-size: 10px;"><?php echo $value['sale'] ?> %</span>
                                        </span>
                                    </div>
                                    <div class="product_list-content">
                                        <span><p style="height:37px;overflow: hidden;"><?php echo $value['name'] ?>....</p></span>
                                        <br>
                                        <del style="color: red;"><?php echo number_format($value['price'])  ?> VN??</del>
                                        <span style="margin-left: 20px;"><?php echo number_format($value['price']-($value['price']*$value['sale'])/100) ?> VN??</span>
                                    </div>
                                    <div style="margin-top: 20px;font-size:20px;">
                                        <a style="margin-right: 30px;" href="#"><i class="fas fa-search"></i></a>
                                        <a href="../../controler/homePage/addcart.php?ID=<?php echo $value['ID'] ?>"><i class="fas fa-cart-arrow-down"></i></a>
                                    </div>
                                    <div style="width:70px;position: absolute;bottom:10px;left:5px;">
                                        <span>S??? L?????ng: </span>
                                        <?php echo (($value['quantity']<=0)?'H???t h??ng': $value['quantity'])?>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    
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