<?php
include '../../config.php';

if(isset($_POST['username'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $retype=$_POST['retype'];
    $sqlmember="SELECT * FROM account WHERE username='$username'";
    $query=mysqli_query($conn,$sqlmember);
    if(!$username||!$email||!$password||!$retype){
        echo "
                <script type=\"text/javascript\">
                alert('Bạn đang nhập thiếu thông tin');
                history.back();
                </script>
            ";
            exit;
    }
    else{
        if(mysqli_num_rows($query)>0){
            echo "
                    <script type=\"text/javascript\">
                    alert('Bạn đãng ký với tên này rồi');
                    history.back();
                    </script>
                ";
                exit;
        }
        else{
            $password=$_POST['password'];
            $retype=$_POST['retype'];
            if($password!=$retype){
                echo "
                    <script type=\"text/javascript\">
                    alert('Nhập lại mật khẩu không trùng khớp');
                    history.back();
                    </script>
                ";
                exit;
            }else{
                $password=md5($password);
                $account="INSERT account(username,email,password,permission) VALUES ('$username','$email','$password','member')";
                $conn->query($account);
                    echo "
                        <script type=\"text/javascript\">
                        alert('Đăng ký tài khoản thành công');
                        location.href='../../Views/homePage/member.php';
                        </script>
                    "
                    ;
            }
        }
    }
    
}
?>