<?php
session_start();
include '../../config.php';
$action=isset($_GET['action'])?$_GET['action']:'add';
//addproduct
if($action=="add"){
    if(isset($_POST['addproduct'])){
        $name=$_POST['name'];
        $catogeryID=$_POST['catogeryID'];
        $price=$_POST['price'];
        $sale=$_POST['sale'];
        $description=$_POST['description'];
        $quantity=$_POST['quantity'];
        $status=isset($_POST['status'])?$_POST['status']:'0';
        if(isset($_FILES['image'])){
            $flie=$_FILES['image'];
            $image=$flie['name'];
            move_uploaded_file($flie['tmp_name'],'../../Content/Img/'.$image);
        }
        if(!$name || !$catogeryID|| !$price || !$description || !$status || !$quantity){
            echo "
                            <script type=\"text/javascript\">
                            alert('Bạn chưa nhập đầy đủ thông tin!');
                            history.back();
                            </script>
                            "
                        ;
                        exit;
        }
        else{
            $sqladd="INSERT INTO product(name,image,catogeryID,price,sale,description,status,quantity) 
            VALUES ('$name','$image','$catogeryID','$price','$sale','$description','$status','$quantity')";
            $addproduct=mysqli_query($conn,$sqladd);
            if($addproduct){
                echo "
                            <script type=\"text/javascript\">
                            alert('Thêm sản phẩm thành công');
                            history.back();
                            </script>
                            "
                        ;
                        exit;
            exit;
            }
            else{
                echo "
                            <script type=\"text/javascript\">
                            alert('Xảy ra lỗi');
                            history.back();
                            </script>
                            "
                        ;
                        exit;
            }
        }
        
        
    }
    if(isset($_POST['updateproduct'])){
        $ID=$_POST['ID'];
        $name=$_POST['name'];
        $catogeryID=$_POST['catogeryID'];
        $price=$_POST['price'];
        $sale=$_POST['sale'];
        $description=$_POST['description'];
        $quantity=$_POST['quantity'];
        $status=$_POST['status'];
        $update=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE ID=$ID"));
        if(empty($_FILES['image']['name'])){
            //khong chon anh
            $image=$update['image'];
        }
        else{
            //chon anh
            $file=$_FILES['image'];
            $file_name=$file['name'];
            move_uploaded_file($file['tmp_name'],'../../Content/Img/'.$file_name);
            $image=$file_name;
        }
        $sqlupdate=mysqli_query($conn,"UPDATE product SET name='$name',image='$image',catogeryID='$catogeryID'
        ,price='$price',sale='$sale',description='$description',status='$status',quantity='$quantity' WHERE ID=$ID");
        if($sqlupdate){
            echo "
                <script type=\"text/javascript\">
                alert('Cập nhật thành công');
                location.href = '../../admin/product.php';
                </script>
                "
            ;
            exit;
        }
        else{
            echo "
                <script type=\"text/javascript\">
                alert('Xảy ra lỗi');
                history.back();
                </script>
                "
            ;
            exit;
        }
    }
}
?>