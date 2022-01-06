<?php
include '../../config.php';
session_start();
    $member=$_SESSION['member'];
    $query=mysqli_query($conn,"SELECT * FROM account WHERE username='$member'");
    $membername=mysqli_fetch_assoc($query);
if(isset($_POST)){
    if(($_POST['fullname'])=="" || ($_POST['address']=="") || ($_POST['phonenumber']=="")){
        echo "
                    <script type=\"text/javascript\">
                    alert('Vui lòng nhập thông tin giao hàng');
                    history.back();
                    </script>
                "
            ;
    }
    else{
        $fullname=$_POST['fullname'];
        $address=$_POST['address'];
        $phone=$_POST['phonenumber'];
        $accountID=$membername['ID'];
        $isset=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM informationaccount WHERE accountID='$accountID'"));

        if(!$isset['accountID']==$accountID){
            $update=mysqli_query($conn,"INSERT INTO informationaccount(accountID,fullname,address,phonenumber) 
            VALUES ('$accountID','$fullname','$address','$phone')");
            echo "
            <script type=\"text/javascript\">
            alert('Cập nhật thành công');
            history.back();
            </script>
        "
    ;
        }
        else{
            $update=mysqli_query($conn,"UPDATE informationaccount SET fullname='$fullname',address='$address',phonenumber='$phone' WHERE accountID=$accountID");
            
            echo "
            <script type=\"text/javascript\">
            alert('Cập nhật thành công');
            history.back();
            </script>
        "
    ;
        }
    }
}
?>