<?php
session_start();
include '../config.php';
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
if(isset($_GET['ID'])){
    $ID=$_GET['ID'];
    $edit=mysqli_query($conn,"SELECT * FROM catogery WHERE ID=$ID");
    $result=mysqli_fetch_assoc($edit);
}
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
            <?php include '../admin/login.php'; ?>
            <div class="catogery_manenger" >
                <span style="display: inline-block;font-weight: bold;font-size: 20px;">Cập nhật danh mục</span>
                <form action="../controler/admin/catogery.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ID" value="<?php echo $result['ID'] ?>">
                    <div style="margin-bottom: 10px;margin-top: 20px;">
                        <label for="">Tên danh mục :</label>
                        <input type="text" name="namecatogery" placeholder="Tên danh mục" value="<?php echo $result['name'] ?>">
                    </div>
                    <div style="margin-left: 55px;margin-bottom: 10px;">
                        <label for="">Hình Ảnh: </label>
                        <input id="check" type="file" name="image" value="<?php echo $result['image'] ?>">
                        <img src="../Content/Img/<?php echo $result['image'] ?>" alt="" width="100px" height="100px">
                    </div>
                    <div style="margin-top: 10px;margin-bottom: 10px;">
                        <input type="hidden" name="updatecatogery" value="update" style="border-radius: 5px;">
                        <button>Sua</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
</body>
</html>