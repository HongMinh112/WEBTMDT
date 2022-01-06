

<?php
session_start();
include '../../config.php';

$action=isset($_GET['action'])?$_GET['action']:'add';
//add
if($action=="add"){
    if(isset($_POST['addcatogery'])){
    $name=$_POST['namecatogery'];
    //image
        if(isset($_FILES['image'])){
            $flie=$_FILES['image'];
            $file_name=$flie['name'];
            move_uploaded_file($flie['tmp_name'],'../../Content/Img/'.$file_name);
        }
        $add="INSERT INTO catogery(name,image) VALUES ('$name','$file_name')";
        $addcato=mysqli_query($conn,$add);
        if($addcato){
        echo "
                <script type=\"text/javascript\">
                alert('Thêm thành công');
                location.href = '../../admin/catogery.php';
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
    if(isset($_POST['updatecatogery'])){
        $ID=$_POST['ID'];
        $nameupate=$_POST['namecatogery'];
        $update=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM catogery WHERE ID=$ID"));
        
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
        $sqlupdate=mysqli_query($conn,"UPDATE catogery SET name='$nameupate',image='$image' WHERE ID=$ID");
        if($sqlupdate){
            echo "
                <script type=\"text/javascript\">
                alert('Cập nhật thành công');
                location.href = '../../admin/catogery.php';
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
        $delete="DELETE FROM catogery WHERE ID=$ID";
        $query=mysqli_query($conn,$delete);
        if($query){
            echo "
                <script type=\"text/javascript\">
                alert('Xóa thành công');
                location.href = '../../admin/catogery.php';
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
if (isset($_POST['block'])) {
    $query = "UPDATE catogery SET status = 0 where id = ".$_POST['id']." ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "
        <script type=\"text/javascript\">
        alert('Khóa sản phẩm thành công!');
        history.back();
        </script>
        "
    ;
    exit;
    } else {
        echo "
        <script type=\"text/javascript\">
        alert('Khóa sản phẩm thất bại!');
        history.back();
        </script>
        "
    ;
    exit;
    }
    } else if (isset($_POST['active'])) {
        $query = "UPDATE catogery SET status = 1 where id = ".$_POST['id']." ";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<script type="text/javascript">alert("Kích hoạt sản phẩm thành công!");
            history.back();
            </script>';
        } else {
            echo '<script type="text/javascript">alert("Kích hoạt sản phẩm thất bại!");
            history.back();</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Có lỗi xảy ra!");</script>';
        die();
}
?>