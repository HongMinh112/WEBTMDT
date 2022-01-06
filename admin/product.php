<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo "
            <script type=\"text/javascript\">
            alert('Bạn chưa đăng nhập');
            location.href = '../Views/homePage/index.php';
            </script>
            "
        ;
        exit;
}
include '../../WEBTMDT/config.php';
$product=mysqli_query($conn,"SELECT product.*,catogery.name AS 'name_catogery' FROM product JOIN catogery ON product.catogeryID=catogery.ID");
$query=mysqli_fetch_all(($product),MYSQLI_ASSOC);

$catogery=mysqli_fetch_all((mysqli_query($conn,"SELECT * FROM catogery")),MYSQLI_ASSOC);


?>
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
    <div style="display: flex;">
        <?php include '../../WEBTMDT/admin/catoegryAdmin.php'; ?>
        <div class="right">
            <?php include '../admin/login.php'; ?>
            <div style="margin-top: 20px;margin-left: 20px;border: 1px solid black;width: 110px;border-radius: 10px;">
                <a style="text-decoration: none;color: black;" href="../admin/addproduct.php">Thêm Sản Phẩm</a>
            </div>
            <div class="catogery_manenger product">
                <span style="display: inline-block;margin-top: 10px;font-weight: bold;font-size: 20px;">Quản lí danh mục</span>
                <div style="position: absolute;display:block;right:30px;margin-bottom:20px;">
                <form action="#" method="post">
                    <select name="select">
                        <option value="">Tim san pham</option>
                        <?php foreach($catogery as $key => $value){?>
                            <option name="ID" value="<?php echo $value['ID'] ?>" name=""><?php echo $value['name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="FINE" name="fine">
                </form>
                </div>
                <?php if(isset($_POST['fine'])) { 
                        $IDcaotogery=$_POST['select'];
                        $productFine=mysqli_query($conn,"SELECT product.*,catogery.name AS 'name_catogery' FROM product JOIN catogery ON product.catogeryID=catogery.ID WHERE catogery.ID='$IDcaotogery' ");
                    if($productFine) { ?>
                        <table style="text-align: center; width:920px;">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên danh mục</th>
                                <th>Hinh ảnh</th>
                                <th>Giá sản phẩm</th>
                                <th>sale</th>
                                <th>Gia khi sale</th>
                                <td>Mô tả</td>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            <?php
                            $stt=1;
                            foreach($productFine as $key => $value){?>
                            <tr>
                                <td><?php echo $stt++ ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['name_catogery'] ?></td>
                                <td><img src="../Content/Img/<?php echo $value['image'] ?>" alt="" width="120px" height="120px"></td>
                                <td><?php echo number_format($value['price']) ?></td>
                                <td><?php echo $value['sale'] ?>%</td>
                                <td><?php echo number_format($value['price']-($value['price']*$value['sale'])/100) ?></td>
                                <td><?php echo $value['description'] ?></td>
                                <td><?php echo $value['quantity'] ?></td>
                                <td><?php echo ($value['status']==0)?'Ẩn':'Hiện' ?></td>
                                <td>
                                    <a href="../Admin/editproduct.php?ID=<?php echo $value['ID'] ?>">Sửa</a>
                                        <br>
                                            <?php
                                            if ($value['status']) { ?>
                                                <form action="../controler/admin/status.php" method="post">
                                                    <input type="text" name="id" hidden value="<?= $value['ID'] ?>" style="display: none;">
                                                    <input type="submit" value="Khóa" name="block">
                                                </form>
                                            <?php } else { ?>
                                                <form action="../controler/admin/status.php" method="post">
                                                    <input type="text" name="id" hidden value="<?= $value['ID'] ?>" style="display: none;">
                                                    <input type="submit" value="Mở" name="active">
                                                </form>
                                            <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                        </table>
                        <?php } else{
                            echo" Chưa nhập loại sản phẩm này ";
                            }?>
                <?php } else{?>
                    <table style="text-align: center; width:920px;">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên danh mục</th>
                                <th>Hinh ảnh</th>
                                <th>Giá sản phẩm</th>
                                <th>sale</th>
                                <th>Gia khi sale</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            <?php
                            $stt=1;
                            foreach($product as $key => $value){?>
                            <tr>
                                <td><?php echo $stt++ ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['name_catogery'] ?></td>
                                <td><img src="../Content/Img/<?php echo $value['image'] ?>" alt="" width="120px" height="120px"></td>
                                <td><?php echo number_format($value['price']) ?></td>
                                <td><?php echo $value['sale'] ?>%</td>
                                <td><?php echo number_format($value['price']-($value['price']*$value['sale'])/100) ?></td>
                                <td><?php echo $value['description'] ?></td>
                                <td><?php echo $value['quantity'] ?></td>
                                <td><?php echo ($value['status']==0)?'Ẩn':'Hiện' ?></td>
                                <td>
                                    <a href="../Admin/editproduct.php?ID=<?php echo $value['ID'] ?>">Sửa</a>
                                        <br>
                                            <?php
                                            if ($value['status']) { ?>
                                                <form action="../controler/admin/status.php" method="post">
                                                    <input type="text" name="id" hidden value="<?= $value['ID'] ?>" style="display: none;">
                                                    <input type="submit" value="Khóa" name="block">
                                                </form>
                                            <?php } else { ?>
                                                <form action="../controler/admin/status.php" method="post">
                                                    <input type="text" name="id" hidden value="<?= $value['ID'] ?>" style="display: none;">
                                                    <input type="submit" value="Mở" name="active">
                                                </form>
                                            <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                        </table>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="angle-double-up">
        <p><i class="fas fa-angle-double-up"></i></p>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    <script src="../Content/JavaScrip/style.js"></script>
    <script src="../Content/JavaScrip/jquery-3.6.0.min.js"></script>
</body>
</html>