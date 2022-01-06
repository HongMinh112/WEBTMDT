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
include '../config.php';
//lay ds san pham bằng ID
if(isset($_GET['ID'])){
    $ID=$_GET['ID'];
    $sql="SELECT * FROM product WHERE ID=$ID";
    $query=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
}
//lay ds category 
$sqlCato="SELECT * FROM catogery ";
$queryCato=mysqli_query($conn,$sqlCato);
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
    <div style="display: flex;height: 100%;">
    <?php include '../../WEBTMDT/admin/catoegryAdmin.php'; ?>
        <div class="right">
            <?php include './login.php'; ?>
            <div class="catogery_manenger" >
                <span style="display: inline-block;font-weight: bold;font-size: 20px;">Cập nhật danh mục</span>
                <form action="../controler/admin/product.php" method="post" style="text-align: justify;margin-left:150px;" enctype="multipart/form-data">
                    <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">
                    
                    <div style="margin-bottom: 10px;margin-top: 20px; display:flex;">
                        <label style="margin-bottom:20px;display:block;" for="">Tên sản phẩm :</label>
                        <textarea name="name" id="" cols="30" rows="3" placeholder="Tên sản phẩm" ><?php echo $row['name'] ?></textarea>
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                    <label for="">Tên danh mục: </label>
                        <select name="catogeryID" id="">
                            <option value="">Tên danh mục</option>
                            <?php foreach($queryCato  as $key => $value){ ?>
                                <option value="<?php echo $value['ID']?>" <?php echo ($value['ID']==$row['catogeryID']?'selected':'')?>><?php echo $value['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="">Hình Ảnh: </label>
                        <input id="check" type="file" name="image"  placeholder="Hình Ảnh ">
                        <img name="image" src="../Content/Img/<?php echo $row['image'] ?>" alt="" width="120px" height="120px">
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                        <label for="">Giá sản phẩm :</label>
                        <input type="text" name="price" placeholder="Tên sản phẩm" value="<?php echo $row['price']  ?>">
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                        <label for="">Giảm giá :</label>
                        <input type="text" name="sale" placeholder="Tên sản phẩm" value="<?php echo $row['sale'] ?>">
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px; display:flex;">
                        <label style="margin-bottom:20px;display:block;" for="">Mô tả :</label>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="Mô Tả:" ><?php echo $row['description'] ?></textarea>
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                        <label for="">Số lượng :</label>
                        <input type="number" name="quantity" placeholder="Số lượng" value="<?php echo $row['quantity'] ?>">
                    </div>
                    <div style="margin-left: 55px;margin-bottom: 10px;">
                    <label for="">Trang Thai</label>
                        <br>
                        <label style="width:30px;" for="">
                            <input style="width:30px;" type="radio" name="status" value="0" <?php echo ($row['status']==0?'checked':'') ?>>Ẩn
                        </label>
                       <label for="">
                           <input style="width:30px;" type="radio" name="status" value="1"<?php echo ($row['status']==1?'checked':'')?>>Hiện
                       </label>
                    </div>
                    <div style="margin-top: 10px;margin-bottom: 10px;margin-left:80px;">
                        <input type="submit" name="updateproduct" value="Sửa" style="border-radius: 5px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
</body>
</html>