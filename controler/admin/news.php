<?php
include '../../config.php';

$action=isset($_GET['action'])?$_GET['action']:'add';

if($action=="add"){
    if(isset($_POST['addnews'])){
        $tittle=$_POST['name'];
        $content=$_POST['content'];
        $status=$_POST['status'];
        if(isset($_FILES['image'])){
            $flie=$_FILES['image'];
            $file_name=$flie['name'];
            move_uploaded_file($flie['tmp_name'],'../../Content/Img/'.$file_name);
        }
        $news="INSERT INTO news(nameEvent,image,content,status) 
        VALUES ('$tittle','$file_name','$content','$status')"; 
        $addnews=mysqli_query($conn,$news);
        if($addnews){
            echo "
            <script type=\"text/javascript\">
            alert('Thêm thành công');
            location.href = '../../admin/news.php';
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
    if(isset($_POST['updatenews'])){
        $ID=$_POST['ID'];
        $tittle=$_POST['name'];
        $content=$_POST['content'];
        $status=$_POST['status'];
        $update=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM news WHERE ID=$ID"));
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
        $updateNews="UPDATE news SET nameEvent='$tittle',image='$image',content='$content',status='$status' WHERE ID=$ID";
        $queryNews=mysqli_query($conn,$updateNews);
        if($queryNews){
            echo "
                <script type=\"text/javascript\">
                alert('Cập nhật thành công');
                location.href = '../../admin/news.php';
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
    if (isset($_POST['block'])) {
        $query = "UPDATE product SET status = 0 where id = ".$_POST['id']." ";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "
            <script type=\"text/javascript\">
            alert('Khóa sản phẩm thành công!');
            location.href = '../../admin/news.php';
            </script>
            "
        ;
        exit;
        } else {
            echo "
            <script type=\"text/javascript\">
            alert('Khóa sản phẩm thất bại!');
            location.href = '../../admin/news.php';
            </script>
            "
        ;
        exit;
        }
        } else if (isset($_POST['active'])) {
            $query = "UPDATE product SET status = 1 where id = ".$_POST['id']." ";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo '<script type="text/javascript">alert("Kích hoạt sản phẩm thành công!");
                location.href = "../../admin/news.php";
                </script>';
            } else {
                echo '<script type="text/javascript">alert("Kích hoạt sản phẩm thất bại!");
                location.href = "../../admin/news.php";</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Có lỗi xảy ra!");</script>';
            die();
    }
}
?>