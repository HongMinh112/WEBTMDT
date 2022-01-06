<?php
include '../../config.php';
session_start();
if(isset($_SESSION['member'])){
    $user=$_SESSION['member'];
    $member=mysqli_query($conn,"SELECT * FROM account WHERE username='$user'");
    $IDmember=mysqli_fetch_assoc($member);
    $ID=$IDmember['ID'];
    $password=$IDmember['password'];
    if(isset($_POST)){
        
        $pass=md5($_POST['password']);
        $passNews=md5($_POST['passwordnews']);
        $passnewsChange=md5($_POST['passwordChange']);
        if(($password==$pass)){

            if($passNews!=$passnewsChange){
                echo "
                <script type=\"text/javascript\">
                alert('Nhập lại mật khẩu không trùng khớp');
                history.back();
                </script>
            ";
            exit;
            }
            else{
                $updatePass="UPDATE account SET password='$passNews' WHERE ID='$ID'";
                $update=mysqli_query($conn,$updatePass);
                if($update){
                    echo "
                    <script type=\"text/javascript\">
                    alert('Đổi mật khẩu thành công');
                    history.back();
                    </script>
                ";
                exit;
                }
                else{
                    echo "loix";
                }
            
            }
        }
        else{
            echo "
            <script type=\"text/javascript\">
            alert('Mật khẩu cũ không đúng');
            history.back();
            </script>
        ";
        } 

    }
    else{
        echo" khong co ";
    }
}

?>