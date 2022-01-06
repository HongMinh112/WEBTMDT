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
$catogery=mysqli_query($conn,"SELECT * FROM catogery");
$resul=mysqli_fetch_all(($catogery),MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Content/Css/styleadmin.css">
    <link rel="stylesheet" href="../Icoin/fontawesome-free/css/all.min.css">
    <script src="../ckeditor/ckeditor.js"></script>
    <title>ADMIN</title>
</head>
<body>
    <div style="display: flex;">
    <?php include '../../WEBTMDT/admin/catoegryAdmin.php'; ?>
        <div class="right">
            <?php include './login.php'; ?>
            <div class="catogery_manenger" >
                <span style="display: inline-block;font-weight: bold;font-size: 20px;">Thêm sản phẩm</span>
                <form action="../controler/admin/product.php" method="post" enctype="multipart/form-data" style="height:100%;text-align: justify;margin-left:130px;width:700px;">
                    <div style="margin-bottom: 10px;margin-top: 20px; display:flex;">
                        <label style="margin-bottom:20px;display:block;" for="">Tên sản phẩm :</label>
                        <textarea name="name" id="" cols="30" rows="3" placeholder="Tên sản phẩm" ></textarea>
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                    <label for="">Tên danh mục: </label>
                        <select name="catogeryID" id="">
                            <option value="">Tên danh mục</option>
                            <?php foreach($resul as $key => $value){ ?>
                                <option value="<?php echo $value['ID']?>"><?php echo $value['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="">Hình Ảnh: </label>
                        <input id="check" type="file" id="image1" name="image"  placeholder="Hình Ảnh ">
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                        <label for="">Giá sản phẩm :</label>
                        <input type="text" name="price" placeholder="Giá sản phẩm">
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                        <label for="">Giảm giá :</label>
                        <input type="number" name="sale" placeholder="Giảm giá">
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px; display:flex;">
                        <label style="margin-bottom:20px;display:block;" for="">Mô tả :</label>
                        <textarea name="description" id="" cols="30" rows="3" placeholder="Tên sản phẩm" ></textarea>
                    </div>
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                        <label for="">Số lượng :</label>
                        <input type="number" name="quantity" placeholder="Số lượng">
                    </div>
                    <div style="margin-left: 55px;margin-bottom: 10px;">
                    <label for="">Trang Thai</label>
                        <br>
                        <label style="width:30px;" for="">
                            <input style="width:30px;" type="radio" name="status" value="0" >Ẩn
                        </label>
                       <label for="">
                           <input style="width:30px;" type="radio" name="status" value="1">Hiện
                       </label>
                    </div>
                    <div style="margin-top: 10px;margin-bottom: 10px;margin-left:80px;">
                        <input type="hidden" name="addproduct" value="add" style="border-radius: 5px;">
                        <button>Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>