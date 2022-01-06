<?php
session_start();
include '../../config.php';

if(isset($_SESSION['username'])){
    header("location:news.php");
}

if($_POST['signin']){
    $username=addslashes($_POST['username']);
    $pasword=addslashes($_POST['password']);

    if(!$username || !$pasword){
        echo"
            <script type=\"text/javascript\">
            alert('Vui lòng nhập tên tài khoản và mật khẩu');
            history.back();
            </script>
        ";
        exit;
    }
    $pasword=md5($pasword);

    $account=mysqli_query($conn,"SELECT * FROM account WHERE username='$username'");
    if(mysqli_num_rows($account)==0){
        echo "
            <script type=\"text/javascript\">
            alert('Tên đăng nhập không tồn tại');
            history.back();
            </script>
            "
        ;
        exit;
    }
    
    $accountitem=mysqli_fetch_array($account);
    if($pasword!=$accountitem['password']){
        echo "
            <script type=\"text/javascript\">
            alert('Bạn đã nhập sai một khẩu');
            history.back();
            </script>
            "
        ;
        exit;
    }
    
    $_SESSION['account']=$accountitem;
    if($accountitem['permission']=="admin"){
        $_SESSION['admin']=$username;
        echo "
            <script type=\"text/javascript\">
            alert('Đăng nhập thành công');
            location.href = '../../admin/news.php';
            </script>
            "
            ;
            exit;
    }
    else{
        $_SESSION['member']=$username;
        $useraccount=$accountitem['usercount'];
        $usercount="UPDATE account SET usercount=$useraccount+1 WHERE username='$username'";
        
        $querycount=mysqli_query($conn,$usercount);
        echo "
            <script type=\"text/javascript\">
            alert('Đăng nhập thành công');
            location.href = '../../Views/homePage/index.php';
            </script>
            "
            ;
            exit;
          
    }
        
    
}
?>