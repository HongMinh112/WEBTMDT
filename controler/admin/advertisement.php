<?php
include '../../config.php';
$action=isset($_GET['action'])?$_GET['action']:'add';

if($action=="add"){
    if($_POST['addimage']){
        $file_name=$_POST['image'];
        if(isset($_FILES['image'])){
            $flie=$_FILES['image'];
            move_uploaded_file($flie['tmp_name'],'../../Content/Img/'.$file_name);
           
        }
        $imageadd=("INSERT INTO advertisement(image) VALUES ('$file_name')");
        $query=mysqli_query($conn,$imageadd);
        if($query){
            echo "
                    <script type=\"text/javascript\">
                    alert('Thêm thành công');
                    location.href = '../../admin/advertisement.php';
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
//delete
if($action=="delete"){
    if($_GET['ID']){
        $ID=$_GET['ID'];
        $delete=mysqli_query($conn,"DELETE FROM advertisement WHERE ID=$ID");
        if($delete){
            echo "
                <script type=\"text/javascript\">
                alert('Xóa thành công');
                location.href = '../../admin/advertisement.php';
                </script>
                "
            ;
            exit;
        }
        else{
            echo "Lỗi
            ";
        }
    }
}
?>